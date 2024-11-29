<?php

namespace App\Livewire;

use App\Models\Fund;
use Livewire\Component;

class FundBarNav extends Component
{
public $funds = [];
    public function render()
    {
        return view('livewire.fund-bar-nav');
    }

    public function mount()
    {
        $this->funds = Fund::all();
    }
}
