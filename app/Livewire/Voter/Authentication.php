<?php

namespace App\Livewire\Voter;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\RegisteredVoter;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

#[Layout("components.layouts.auth")]
#[Title('Ingia')]
class Authentication extends Component{
    use Toast;
    public $title = "Uwanja wa mpiga kura";

    public $admission_number;
    public $password;

    public bool $infoModal = false;

    public function login(){
        $this->validate([
            "admission_number"=> "required|string|exists:students,admission_number",
            "password"=> "required",
        ]);

        if(Auth::guard('student')->attempt(["admission_number"=> $this->admission_number,"password"=> $this->password], false)) {
            // //Muongeze kwenye wasajiliwa
            RegisteredVoter::upsert([
                'student_id' => Auth::guard('student')->user()->id
            ], []);

            $this->success("Imefanikiwa", 'Karibu kwenye mfumo wa kupiga kura.');
            return redirect()->route('home');
        }
        else {
            Log::info('Password : ', [$this->password]);
            $this->warning("Taarifa ulizojaza sio sahihi");
            return redirect()->back()->withErrors("admission_number","Taarifa ulizojaza sio sahihi");
        }
    }

    public function render() {
        return view('livewire.voter.authentication');
    }
}
