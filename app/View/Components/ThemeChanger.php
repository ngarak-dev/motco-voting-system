<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ThemeChanger extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct() {
        //
    }

    // <x-button label="Ondoka kwenye akaunti" class="btn-ghost btn-xs hover:bg-red-400" wire:click="save" icon-right="o-power" spinner no-wire-navigate link="/admin/logout" />


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
            <x-header>
                <x-slot:actions>
                    <x-theme-toggle darkTheme="dark" lightTheme="light" />
                </x-slot:actions>
            </x-header>
            HTML;
    }
}
