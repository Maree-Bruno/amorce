<?php

namespace App\Livewire;

use App\Models\Fund as FundModel;
use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class FundTable extends Component
{
    use WithPagination;

    public $total;
    public FundModel $fund;
    public $sortField = 'date';
    public $sortDirection = 'desc';
    public $perPage = 8;

    protected $listeners = ['transactionsImported' => 'refreshFunds'];

    public function mount(FundModel $fund): void
    {
        $this->fund = $fund;
        $this->updateTotalAmount();
    }


    #[Computed]
    public function transactions()
    {
        return $this->fund
            ->hasMany(Transaction::class, 'fund_id')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage)
            ->onEachSide(0);
    }

    public function updateTotalAmount(): void
    {
        $this->total = $this->fund
            ->transactions()
            ->sum('amount');
    }

    public function sort($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function refreshFunds()
    {
        $this->updateTotalAmount();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.fund-table', [
            'total' => $this->total,
        ]);
    }
}
