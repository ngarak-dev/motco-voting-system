<?php

namespace App\Livewire\Admin;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout("components.layouts.auth")]
#[Title("Ingia")]

class Authentication extends Component {

    use Toast;
    public $title = "Msimamizi wa Uchaguzi";

    public $email;
    public $password;

    public function login(){
        $this->validate([
            "email"=> "required|email",
            "password"=> "required",
        ]);

        if(Auth::attempt(["email"=> $this->email,"password"=> $this->password], true)) {
            $this->success("Imefanikiwa", 'Karibu '. Auth::user()->name);
            return redirect()->route("admin-dashboard");
        }
        else {
            $this->warning("Taarifa ulizojaza sio sahihi");
            return redirect()->back()->withErrors("email","Taarifa ulizojaza sio sahihi");
        }
    }

    public function render() {
        return view('livewire.admin.authentication');
    }
}
