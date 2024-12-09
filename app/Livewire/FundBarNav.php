<?php

namespace App\Livewire;

use App\Models\Fund;
use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Component;

class FundBarNav extends Component
{

    public function mount()
    {

    }
    #[Computed]
    public function fund()
    {
        return Fund::get();
    }

    public function render()
    {
        return view('livewire.fund-bar-nav', ['funds' => $this->fund()]);
    }

}
