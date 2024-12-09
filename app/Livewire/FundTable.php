<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Fund as FundModel;

class FundTable extends Component
{
    use WithPagination;

    public $total;
    public $fund_id;
    public FundModel $fund;


    public function mount(FundModel $fund): void
    {
        $this->fund = $fund;
        $this->updateTotalAmount();
    }
    #[Computed]
    public function transactions()
    {
        return $this->fund->hasMany(Transaction::class, 'fund_id')->paginate(6);
    }

    public function updateTotalAmount(): void
    {
        $this->total = $this->fund->transactions()->sum('amount');
    }

    public function render()
    {
        return view('livewire.fund-table', [
            'total' => $this->total,
        ]);
    }
}
