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
        if (is_null($this->fund_id)) {
            $this->fund_id = Transaction::value('fund_id');
        }
        $this->updateTotalAmount();
    }
    public function updatedFundId()
    {
        $this->resetPage(); // Réinitialise la pagination
        $this->updateTotalAmount(); // Met à jour le total
    }
    #[Computed]
    public function transactions()
    {
        return Transaction::where('fund_id', $this->fund_id)
            ->orderBy('date', 'desc')
            ->paginate(6);
    }

    public function updateTotalAmount(): void
    {
        $this->total = Transaction::where('fund_id', $this->fund_id)->sum('amount');
    }

    public function render()
    {
        return view('livewire.fund-table', [
            'total' => $this->total,
        ]);
    }
}
