<?php

namespace App\Livewire;

use App\Models\Fund as FundModel;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
