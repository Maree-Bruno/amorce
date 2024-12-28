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

    public function retrievingFunds()
    {
        return Transaction::whereIn('fund_id', $this->funds->pluck('id'))->get();
    }
    public function save()
    {
        $this->form->store();
        $this->feedback = 'Transaction enregistrée !';
        return $this->redirect('/funds');
    }
    public function render()
    { $this->funds = $this->funds->map(function ($fund) {
        $fund->formatted_amount = number_format($fund->amount, 2, ',', ' ') . '€';
        return $fund;
    });

        return view('livewire.bank-create-donation', ['funds' => $this->funds]);
    }

}
