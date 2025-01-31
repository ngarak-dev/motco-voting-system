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
use App\Models\System;
use Illuminate\Container\Attributes\Log;
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

    public $time_management;

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

        $this->time_management = System::first();
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
                // 'percentage' => round(($candidate->votes_count == 0 ? 0 : ($candidate->votes_count / $this->totalVotes) * 100) * 100, 2),
                'percentage' => $candidate->votes_count == 0 ? 0 : number_format(($candidate->votes_count / $this->totalVotes) * 100, 1)
            ];
        });
    }

    #[On('refreshData')]
    public function refreshVotes() {
        $this->getTotalVotes();
        $this->getRegTotalVoters();
        $this->candidatesWithVotes();
        logger('Event fired');
    }

    public function getFullStats() {
        try {
            //candiddates
            $candidatesVotes = Candidate::with([
                'president:id,first_name,last_name',
                'vice:id,first_name,last_name'
                ])->withCount('votes')->get(['id', 'president_id', 'vice_id', 'votes_count'])
                ->map(function ($candidate) {
                    return [
                        'id' => $candidate->id,
                        'candidates_name' => $candidate->president->first_name ." ". $candidate->president->last_name . " NA ". $candidate->vice->first_name ." ". $candidate->president->last_name ?? null,
                        'vote_count' => $candidate->votes_count,
                    ];
                });

            //Number of students who are not in registered voters
            $nonRegisteredVoters = Student::whereNotIn('id', RegisteredVoter::pluck('student_id'))->count();

            //Registered voters who have not voted
            $registeredNotVoted = RegisteredVoter::where('voted', 0)->count();

            //By sex
            $votersBySex = Student::whereHas('registeredVoters')
                ->selectRaw("sex, COUNT(*) as total")
                ->groupBy('sex')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [
                        $item->sex === 'F' ? 'WANAWAKE' : ($item->sex === 'M' ? 'WANAUME' : 'OTHER') => $item->total
                    ];
                });

            //By year
            $votersByYear = Student::whereHas('registeredVoters')
                ->selectRaw('year, COUNT(*) as total')
                ->groupBy('year')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [
                        $item->year === 1 ? 'MWAKA WA KWANZA' : ($item->year === 2 ? 'MWAKA WA PILI' : 'MWAKA WA TATU') => $item->total
                    ];
                });

            return [
                'status' => 'success',
                'code' => 200,
                'message' => 'Data fetched successfully',
                'data' => [
                    'candidatesVotes' => $candidatesVotes,
                    'nonRegisteredVoters' => $nonRegisteredVoters,
                    'registeredNotVoted' => $registeredNotVoted,
                    'votersBySex' => $votersBySex,
                    'votersByYear' => $votersByYear
                ]
            ];
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'An error occurred while processing your request',
                'debug_message' => $th->getMessage()
            ]);
        }
    }

    public function setElectionTime() {

        System::upsert([
            'id' => 1,
            'start' => $this->start,
            'end' => $this->end
        ], []);

        $this->success('Muda wa uchaguzi umewekwa');
        return redirect()->back();
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
