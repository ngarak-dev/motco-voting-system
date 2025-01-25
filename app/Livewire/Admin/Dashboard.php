<?php

namespace App\Livewire\Admin;

use App\Models\Vote;
use Mary\Traits\Toast;
use App\Models\Student;
use Livewire\Component;
use App\Models\Candidate;
use App\Models\RegisteredVoter;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.admin')]
class Dashboard extends Component {

    use Toast;

    public $totalVotes;
    public $noVoters;
    public $noRegVoters;

    public $candidatesWithVotes;
    protected $listeners = ['voteCast' => 'refreshVotes'];

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
        // $candidatesWithVotes = Candidate::withCount('votes')
        //     ->get(['president_id', 'vice_id','votes_count'])->toArray();
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
        ])->withCount('votes')->get(['id', 'president_id', 'vice_id', 'votes_count'])
        ->map(function ($candidate) {
            return [
                'id' => $candidate->id,
                'president_name' => $candidate->president->first_name ." ". $candidate->president->middle_name ." ". $candidate->president->last_name ?? null,
                'vice_name' => $candidate->vice->first_name ." ". $candidate->president->middle_name ." ". $candidate->president->last_name ?? null,
                'votes_count' => $candidate->votes_count,
                'percentage' => ($candidate->votes_count / $this->totalVotes) * 100
            ];
        });
    }
    public function refreshVotes() {
        $this->getTotalVotes();
        $this->getRegTotalVoters();
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
