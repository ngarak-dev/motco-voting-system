<?php

namespace App\Livewire\Admin;

use App\Models\Vote;
use Mary\Traits\Toast;
use App\Models\Student;
use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use App\Models\RegisteredVoter;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.admin')]
#[Title('Nyumbani')]

class Dashboard extends Component {

    use Toast;

    public $totalVotes;
    public $noVoters;
    public $noRegVoters;

    public $candidatesWithVotes;

    public $activeTab = 'mwanzo';

    public array $optionsChart;

    public function setTab($tab){
        $this->activeTab = $tab;
    }

    public function mount() {
        $this->getTotalVotes();

        $this->noVoters = Student::count();
        $this->getRegTotalVoters();

        if ($this->totalVotes > 0) {
            $this->candidatesWithVotes();
        }
        else {
            $this->candidatesWithVotes = [];
        }

        $this->optionsChart = [
            'type' => 'bar',
            'data' => [
                'labels' => $this->candidatesWithVotes->pluck('president_name')->toArray(),
                'datasets' => [
                    [
                        'label' => 'MATOKEO YA KURA KWA GRAFU',
                        'data' => array_values($this->candidatesWithVotes->pluck('votes_count')->toArray()),
                        'borderColor' => '#FFB1C1',
                    ]
                ],
            ],
            'options' => [
                'animation' => true,
                'color' => [
                    'blue',
                    'green',
                ]
            ]
        ];
    }

    public function getTotalVotes() {
        $this->totalVotes = Vote::count();
    }
    public function getRegTotalVoters() {
        $this->noRegVoters = RegisteredVoter::count();
    }

    public function candidatesWithVotes () {
        $this->candidatesWithVotes = Candidate::with([
            'president:id,first_name,middle_name,last_name',
            'vice:id,first_name,middle_name,last_name'
        ])->withCount('votes')->get(['id', 'president_id', 'vice_id', 'votes_count', 'president_img', 'vice_img'])
        ->map(function ($candidate) {
            return [
                'id' => $candidate->id,
                'candidates_name' => $candidate->president->first_name ." ". $candidate->president->last_name . " NA ". $candidate->vice->first_name ." ". $candidate->president->last_name ?? null,
                'votes_count' => $candidate->votes_count,
                'president_img' => $candidate->president_img,
                'vice_img' => $candidate->vice_img,
                'counts' => $candidate->votes_count,
                'percentage' => $candidate->votes_count == 0 ? 0 : ($candidate->votes_count / $this->totalVotes) * 100
            ];
        });
    }

    #[On('refreshData')]
    public function refreshVotes() {
        $this->getTotalVotes();
        $this->getRegTotalVoters();
        // $this->candidatesWithVotes();
        logger('Event fired');
    }

    public function logout () {
        Auth::logout();
        $this->success('Imefanikiwa');
        return redirect()->route('admin-sign-in');
    }

    public function render() {
        return view('livewire.admin.dashboard', [
            'totalVotes' => $this->totalVotes
        ]);
    }
}
