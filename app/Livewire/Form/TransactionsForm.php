<?php

namespace App\Livewire\Form;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionsForm extends Form
{
    public $description;
    public $transaction;
    #[Validate]
    public $fund_id;
    #[Validate]
    public $amount;
    #[Validate]
    public $date;

    public function setTransactions(Transaction $transaction){
        $this->transaction = $transaction;
        $this->fund_id = $transaction->fund_id;
        $this->amount = $transaction->amount;
        $this->date=$transaction->date;
        $this->description=$transaction->description;
    }

    public function rules()
    {
        return [
            'fund_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'description' => 'nullable',
        ];
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

}
