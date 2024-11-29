<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class FundTable extends Component
{
    use WithPagination;

    public $transactions;

    public function mount()
    {
        // Fetch all transactions and store them in the public property
        $this->transactions = Transaction::all();
    }
    #[Computed]
    public function transactions()
    {
        return $this->transactions
            ->transactions()
            ->orderBy('date')
            ->paginate(6);
    }

    public function render()
    {
        return view('livewire.fund-table');
    }
}
