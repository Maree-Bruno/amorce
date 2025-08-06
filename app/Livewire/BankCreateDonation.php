<?php

namespace App\Livewire;

use App\Livewire\Form\TransactionsForm;
use App\Models\Fund as FundModel;
use App\Models\Transaction;
use Livewire\Component;

class BankCreateDonation extends Component
{
    public $funds;
    public $transaction;
    public TransactionsForm $form;
    public $feedback = '';

    public function mount(Transaction $transaction)
    {
        $this->funds = FundModel::get();
        $this->form->setTransactions($transaction);
    }

    public function rules()
    {
        return [
            'form.amount' => 'required|numeric|min:1',
            'form.fund_id' => 'required|exists:funds,id',
            'form.date' => 'required|date|before_or_equal:today',
            'form.description' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'form.amount.required' => 'Le montant est obligatoire.',
            'form.amount.numeric' => 'Le montant doit être un nombre valide.',
            'form.amount.min' => 'Le montant doit être au moins de 1€.',
            'form.fund_id.required' => 'Veuillez sélectionner un fond bénéficiaire.',
            'form.fund_id.exists' => 'Le fond sélectionné n’est pas valide.',
            'form.date.required' => 'La date est obligatoire.',
            'form.date.date' => 'La date doit être une date valide.',
            'form.date.before_or_equal' => 'La date ne peut pas être dans le futur.',
            'form.description.string' => 'La description doit être une chaîne de caractères.',
            'form.description.max' => 'La description ne peut pas dépasser 500 caractères.',
        ];
    }

    public function save()
    {
        $this->validate($this->rules(), $this->messages());

        $this->form->store();

        $this->feedback = 'Transaction enregistrée !';

        return $this->redirect('/funds');
    }

    public function render()
    {
        $this->funds = $this->funds->map(function ($fund) {
            $fund->formatted_amount = number_format($fund->amount, 2, ',', ' ').'€';
            return $fund;
        });

        return view('livewire.bank-create-donation', ['funds' => $this->funds]);
    }
}
