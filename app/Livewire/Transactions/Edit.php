<?php

namespace App\Livewire\Transactions;

use App\Livewire\Form\TransactionsForm;
use App\Models\Fund;
use App\Models\Transaction;
use Livewire\Component;

class Edit extends Component
{
    public Transaction $transaction;
    public $funds;
    public TransactionsForm $form;

    public function mount(Transaction $transaction)
    {
        $this->funds = Fund::get();
        $this->form->setTransactions($transaction);
    }
    public function cancel()
    {
        return redirect('/funds');
    }

    public function save()
    {
        $this->validate([
            'form.fund_id' => 'required|exists:funds,id',
            'form.amount' => 'required|numeric',
            'form.date' => 'required|date',
            'form.description' => 'nullable|string|max:255',
        ]);

        // Convert the TransactionsForm object to an array of attributes
        $attributes = [
            'fund_id' => $this->form->fund_id,
            'amount' => $this->form->amount,
            'date' => $this->form->date,
            'description' => $this->form->description,
        ];

        $this->transaction->update($attributes);

        return $this->redirect('/funds');
    }


    public function deleteTransaction()
    {
        $this->transaction->delete();

        return $this->redirect('/funds');
    }

    public function render()
    {
        $this->funds = $this->funds->map(function ($fund) {
            $fund->formatted_amount = number_format($fund->amount, 2, ',', ' ') . '€';
            return $fund;
        });
        return view('livewire.transactions.edit', [
            'transaction' => $this->transaction,
            'funds' => $this->funds,
        ]);
    }
}
