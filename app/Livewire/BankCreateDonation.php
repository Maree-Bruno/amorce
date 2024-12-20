<?php

namespace App\Livewire;

use App\Livewire\Form\TransactionsForm;
use App\Models\Fund as FundModel;
use Livewire\Component;

class BankCreateDonation extends Component
{
    public $funds;
    public $transaction;
    public TransactionsForm $form;
    public $selectedFund= '';
    public $feedback = '';

    public function mount(){
        $this->funds = FundModel::get();
    }
    public function retrievingFunds()
    {
        return $this->funds->transactions()->get('fund_id');
    }
    public function save(): void
    {
        $this->form->store();
    }
    public function render()
    {
        return view('livewire.bank-create-donation', ['funds' => $this->funds, 'selectedFund' => $this->selectedFund]);
    }

}
