<?php

namespace App\Livewire\Funds;

use App\Models\Fund;
use Livewire\Component;

class DeleteFund extends Component
{
    public $fundId;
    public $feedback = '';
    public $funds = [];

    public function mount()
    {
        $this->funds= Fund::all();
    }

    public function deleteFund()
    {
        $fund = Fund::find($this->fundId);

        if ($fund) {
            $fund->delete();
            session()->flash('message', 'Le fond a été supprimé avec succès.');
        } else {
            session()->flash('error', 'Le fond est introuvable.');
        }
        return $this->redirect('/funds');
    }

    public function render()
    {
        return view('livewire.funds.delete-fund');
    }
}
