<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class BankAddMultipleDonation extends Component
{
    use WithFileUploads;
    public $csvFile;

    public function render()
    {
        return view('livewire.bank-add-multiple-donation');
    }
}
