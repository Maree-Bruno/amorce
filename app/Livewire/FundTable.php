<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class FundTable extends Component
{
    use WithPagination;

    public $total;
    public $fund_id;

    public function mount(): void
    {
        $this->updateTotalAmount();
    }

    #[Computed]
    public function transactions()
    {
        return Transaction::orderBy('date', 'desc')
            ->paginate(6);
    }

    public function updateTotalAmount(): void
    {
        $this->total = Transaction::sum('amount');
    }

    public function render()
    {
        return view('livewire.fund-table', [
            'total' => $this->total,
        ]);
    }
}
