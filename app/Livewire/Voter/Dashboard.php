<?php

namespace App\Livewire\Voter;

use App\Models\Vote;
use Mary\Traits\Toast;
use App\Models\Student;
use Livewire\Component;
use App\Models\Candidate;
use App\Models\RegisteredVoter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Events\VoteCastEvent;

class Dashboard extends Component {
    use Toast;
    public $voter;
    public $candidates;
    public bool $hasVoted;

    public $candidate, $selectedCandidate;

    public $president, $vice;

    public function mount () {
        $this->voter = auth()->guard('student')->user();
        $this->candidates = Candidate::with('student')->orderBy('id', 'asc')->get();

        $this->hasVoted = Auth::user()->registeredVoter?->voted;

        $this->hasVoted ? $this->getSelectedCandidate() : null;
    }

    public function submitVote () {
        logger($this->candidate);

        $thisVoter = Auth::user()->registeredVoter;
        $thisVoter->voted = true;

        Vote::upsert([
            'voter_id' => $thisVoter->id,
            'candidate_id' => $this->candidate
        ], []);

        $thisVoter->save();

        // event(new VoteCastEvent($this->candidate));
        // broadcast(new VoteCastEvent($this->candidate))->toOthers();

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
        return view('livewire.voter.dashboard');
    }
}
