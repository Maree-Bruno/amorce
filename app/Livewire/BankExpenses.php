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
