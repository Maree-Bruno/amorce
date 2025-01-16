<?php

namespace App\Livewire\Funds;

use App\Models\Fund;
use Livewire\Component;

class EditFund extends Component
{
    public $fundId;
    public $newFundName;
    public $feedback = '';

    protected $rules = [
        'fundId' => 'required|exists:funds,id',
        'newFundName' => 'required|string|max:255',
    ];

    protected $messages = [
        'fundId.required' => 'Veuillez sélectionner un fond.',
        'fundId.exists' => 'Le fond sélectionné n\'existe pas.',
        'newFundName.required' => 'Le nouveau nom de fond est requis.',
        'newFundName.string' => 'Le nom doit être une chaîne de caractères.',
        'newFundName.max' => 'Le nom ne peut pas dépasser 255 caractères.',
    ];

    public function mount()
    {
        if ($this->fundId) {
            $fund = Fund::find($this->fundId);
            $this->newFundName = $fund ? $fund->name : '';
        }
    }
    

    public function update()
    {
        $this->validate();

        $fund = Fund::find($this->fundId);

        if ($fund) {
            $fund->name = $this->newFundName;
            $fund->save();

            session()->flash('message', 'Le fond a été mis à jour avec succès.');
        } else {
            $this->feedback = 'Erreur : Le fond est introuvable.';
        }
        return $this->redirect('/funds');
    }

    public function render()
    {
        return view('livewire.funds.edit-fund', [
            'funds' => Fund::all(), // Return all funds to populate dropdown
        ]);
    }
}
