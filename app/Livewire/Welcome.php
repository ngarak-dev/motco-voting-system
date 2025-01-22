<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout("components.layouts.auth")]
// #[Title("Karibu")]
class Welcome extends Component
{
    public $title = 'KARIBU KWENYE MFUMO WA UPOGAJI KURA';

    public function render() {
        return view('livewire.welcome');
    }
}
