<?php

namespace App\Livewire\Admin;

use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class Dashboard extends Component {

    use Toast;

    public function logout () {
        Auth::logout();
        $this->success('Imefanikiwa');
        return redirect()->route('admin-sign-in');
    }

    public function render() {
        return view('livewire.admin.dashboard');
    }
}
