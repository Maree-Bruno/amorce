<?php

namespace App\Livewire;

use App\Livewire\Form\TransactionsForm;
use App\Models\Fund as FundModel;
use App\Models\Transaction;
use Livewire\Component;

class BankTransfert extends Component
{
    public $funds;
    public TransactionsForm $form;
    public $feedback = '';

    public function mount()
    {
        $this->funds = FundModel::all();
    }

    public function save()
    {
        $this->form->storeTransfer();

        $this->feedback = 'Transfert enregistré !';
        return $this->redirect('/funds');
    }

    public function render()
    {
        return view('livewire.bank-transfert', [
            'funds' => $this->funds,
        ]);
    }
}

