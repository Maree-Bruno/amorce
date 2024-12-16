<?php

namespace App\Livewire\Navigations;

use Livewire\Component;

class NavItem extends Component
{
    public $icon;
    public $url;
    public $slot;

    public function render()
    {
        return view('livewire.navigations.nav-item');
    }
}
