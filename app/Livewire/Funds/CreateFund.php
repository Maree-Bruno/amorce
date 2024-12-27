<?php

namespace App\Livewire\Funds;

use Livewire\Component;
use App\Models\Fund as FundModel;

class CreateFund extends Component
{
    public $feedback="";
    public $name;
    public function save()
    {
        FundModel::create($this->all());
        $this->feedback = 'Fond crée !';
        return $this->redirect('/funds');
    }
    public function render()
    {
        return view('livewire.funds.create-fund');
    }
}
