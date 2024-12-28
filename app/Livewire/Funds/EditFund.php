<?php

namespace App\Livewire\Funds;

use Livewire\Component;
use App\Models\Fund;

class EditFund extends Component
{
    public $fundId;
    public $newFundName;

    public function update()
    {
        // Valider les entrées utilisateur
        $this->validate([
            'fundId' => 'required|exists:funds,id',
            'newFundName' => 'required|string|max:255',
        ]);

        // Trouver le fond et mettre à jour son nom
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
            'funds' => Fund::all(), // Récupérer tous les fonds pour le dropdown
        ]);
    }
}
