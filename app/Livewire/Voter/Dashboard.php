<?php

namespace App\Livewire\Voter;

use App\Models\Vote;
use App\Models\System;
use Mary\Traits\Toast;
use App\Models\Student;
use Livewire\Component;
use App\Models\Candidate;
use App\Events\VoteCastEvent;
use App\Models\RegisteredVoter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\json;

class Dashboard extends Component {
    use Toast;
    public $voter;
    public $candidates;
    public bool $hasVoted;
    public $candidate;
    public $selectedCandidate;
    // public $president;
    // public $vice;
    public $time_management;

    public function mount () {
        $this->voter = auth()->guard('student')->user();
        $this->candidates = Candidate::with('student')->orderBy('id', 'asc')->get();
        $this->hasVoted = $this->voter->registeredVoter?->voted;
        $this->hasVoted ? $this->getSelectedCandidate() : null;
    }

    public function submitVote () {
        logger($this->candidate);
        $thisVoter = $this->voter->registeredVoter;

        $thisVoter->voted = true;

        Vote::upsert([
            'voter_id' => $thisVoter->id,
            'candidate_id' => $this->candidate
        ], []);

        $thisVoter->save();

        $this->success('Hongera umefanikiwa kupiga kura !');
        return redirect()->route('home');
    }

    public function getSelectedCandidate () {
        $vote = Vote::where('voter_id', Auth::user()->registeredVoter->id)->first();
        $this->selectedCandidate = $vote->candidate;
    }

    public function logout () {
        Auth::logout();
        $this->success('Imefanikiwa');
        return redirect()->route('welcome');
    }

    public function render() {
        $system = System::first();
        if ($system->isOpen()) {
            return view('livewire.voter.time_management');
        }
        else {
            return view('livewire.voter.dashboard');
        }
    }
}
