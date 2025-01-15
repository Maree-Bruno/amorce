<?php

namespace App\Livewire\Form;

use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionsForm extends Form
{
    #[Validate]
    public $deficit_fund_id;
    #[Validate]
    public $benefit_fund_id;
    public $description;
    public $transaction;
    #[Validate]
    public $fund_id;
    #[Validate]
    public $amount;
    #[Validate]
    public $date;

    public function setTransactions(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->fund_id = $transaction->fund_id;
        $this->amount = $transaction->amount;
        $this->date = $transaction->date;
        $this->description = $transaction->description;
    }


    public function update()
    {
        $this->validate();

        $this->transaction->update($this->all());
    }

    public function store(): void
    {
        $this->validate();
        Transaction::create($this->except('transaction'));
        $this->reset();
    }

    public function storeTransfer()
    {
        Transaction::create([
            'fund_id' => $this->deficit_fund_id,
            'amount' => -1 * $this->amount,
            'description' => $this->description,
            'date' => $this->date
        ]);

        Transaction::create([
            'fund_id' => $this->benefit_fund_id,
            'amount' => $this->amount,
            'description' => $this->description,
            'date' => $this->date
        ]);
    }

}
