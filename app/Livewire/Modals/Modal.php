<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class Modal extends Component
{
    public $slot;
    public function render()
    {
        return view('livewire.modals.modal');
    }
}
