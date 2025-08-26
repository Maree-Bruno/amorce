<?php

namespace App\Livewire;

use App\Models\Transaction;
use App\Models\Fund;
use League\Csv\Reader;
use Livewire\Component;
use Livewire\WithFileUploads;

class BankAddMultipleDonation extends Component
{
    use WithFileUploads;

    public $csvFile;
    public $csvRecords = [];
    public $selectedFunds = [];

    public function updatedCsvFile()
    {

        $this->validate([
            'csvFile' => 'required|file|mimes:csv,txt',
        ]);


        $csvFile = Reader::createFromPath($this->csvFile->getRealPath(), 'r');
        $csvFile->setHeaderOffset(null);


        $this->csvRecords = iterator_to_array($csvFile->getRecords());


        $this->selectedFunds = array_fill(0, count($this->csvRecords), 1);
    }
    public function import()
    {
        $this->validate([
            'selectedFunds' => 'required|array',
            'selectedFunds.*' => 'required|integer|exists:funds,id',
        ]);

        foreach ($this->csvRecords as $index => $record) {
            $amountRaw = $record[2];
            $amountSanitized = str_replace([' ', ','], ['', '.'], $amountRaw);
            $amount = number_format((float)$amountSanitized, 2, '.', '');



            $hashedAccount = hash('sha256', $record[3]);
            $hashedIdentity = hash('sha256', $record[5]);

            Transaction::create([
                'date' => \Carbon\Carbon::parse($record[0]),
                'amount' => $amount,
                'account' => $hashedAccount,
                'identity' => $hashedIdentity,
                'description' => $record[8],
                'fund_id' => $this->selectedFunds[$index],
            ]);
        }

        $this->csvRecords = [];
        $this->csvFile = null;

        $this->dispatch('transactionsImported');

        session()->flash('message', 'Fichier importé avec succès avec les fonds choisis !');
    }


    public function render()
    {
        $funds = Fund::all();

        return view('livewire.bank-add-multiple-donation', compact('funds'));
    }
}
