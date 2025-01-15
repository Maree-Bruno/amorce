<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fund as FundModel;

class Fund extends Component
{
    public FundModel $fund;

    public function mount(FundModel $fund)
    {
        $this->fund = $fund;
    }

    public function render()
    {
        return view('livewire.fund');
    }
}
