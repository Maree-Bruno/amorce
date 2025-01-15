<?php

namespace App\Livewire\Funds;

use Livewire\Component;
use App\Models\Fund as FundModel;

class CreateFund extends Component
{
    public $feedback = "";
    public $name;

    // Définir les règles de validation
    protected $rules = [
        'name' => 'required|string|min:3|max:255',
    ];

    // Messages personnalisés
    protected $messages = [
        'name.required' => 'Le nom du fond est requis.',
        'name.string' => 'Le nom du fond doit être une chaîne de caractères.',
        'name.min' => 'Le nom du fond doit contenir au moins 3 caractères.',
        'name.max' => 'Le nom du fond ne peut pas dépasser 255 caractères.',
    ];

    public function save()
    {
        // Valider les données
        $validatedData = $this->validate();

        // Créer le fond
        FundModel::create(['name' => $this->name]);

        // Ajouter un retour utilisateur
        $this->feedback = 'Fond créé avec succès !';

        // Réinitialiser le champ
        $this->reset('name');

        // Redirection
        return $this->redirect('/funds');
    }

    public function render()
    {
        return view('livewire.funds.create-fund');
    }
}
