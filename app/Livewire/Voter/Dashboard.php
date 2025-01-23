<?php

namespace App\Livewire\Voter;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Mary\Traits\Toast;

class Dashboard extends Component {
    use Toast;
    public $voter;

    public function mount () {
        $this->voter = auth()->guard('student')->user();
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
