<?php

namespace App\Livewire\Funds;

use App\Models\Fund;
use Livewire\Component;

class EditFund extends Component
{
    public $fundId;
    public $newFundName;

    public function update()
    {

        $this->validate([
            'fundId' => 'required|exists:funds,id',
            'newFundName' => 'required|string|max:255',
        ]);


        $fund = Fund::find($this->fundId);

        if ($fund) {
            $fund->name = $this->newFundName;
            $fund->save();
            session()->flash('message', 'Le fond a été mis à jour avec succès.');
        } else {
            session()->flash('error', 'Le fond n\'existe pas.');
        }

        return $this->redirect('/funds');
    }

    public function render()
    {
        return view('livewire.funds.edit-fund', [
            'funds' => Fund::all(),
        ]);
    }
}
