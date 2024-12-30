<?php

namespace App\Livewire;

use App\Livewire\Form\TransactionsForm;
use App\Models\Fund as FundModel;
use App\Models\Transaction;
use Livewire\Component;

class BankExpenses extends Component
{
    public $funds;
    public $transaction;
    public TransactionsForm $form;
    public $feedback = '';

    public function rules()
    {
        return [
            'form.amount' => ['required', 'numeric'], // Montant obligatoire, doit être un nombre et négatif
            'form.fund_id' => ['required', 'exists:funds,id'], // Fond obligatoire, doit exister dans la table funds
            'form.date' => ['required', 'date'], // Date obligatoire et valide
            'form.description' => ['nullable', 'string', 'max:255'], // Description optionnelle, texte max 255 caractères
        ];
    }
    public function messages()
    {
        return [
            'form.amount.required' => 'Le montant est obligatoire.',
            'form.amount.numeric' => 'Le montant doit être un nombre.',
            'form.fund_id.required' => 'Veuillez sélectionner un fond.',
            'form.fund_id.exists' => 'Le fond sélectionné est invalide.',
            'form.date.required' => 'La date est obligatoire.',
            'form.date.date' => 'La date doit être valide.',
            'form.description.max' => 'La description ne peut pas dépasser 255 caractères.',
        ];
    }
    public function mount(Transaction $transaction)
    {
        $this->funds = FundModel::get();
        $this->form->setTransactions($transaction);
    }


    public function retrievingFunds()
    {
        return Transaction::whereIn('fund_id', $this->funds->pluck('id'))->get();
    }
    public function save()
    {
        $this->validate();
        // Force le montant de la dépense à être négatif
        $this->form->amount = -abs($this->form->amount);

        // Puis on stocke
        $this->form->store();

        $this->feedback = 'Dépense enregistrée !';
        return $this->redirect('/funds');
    }


    public function render()
    {
        return view('livewire.bank-expenses');
    }
}
