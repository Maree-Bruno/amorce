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
    public $csvRecords = []; // Les données du fichier CSV
    public $selectedFunds = []; // Fonds sélectionnés pour chaque ligne

    public function updatedCsvFile()
    {
        // Valider le fichier CSV
        $this->validate([
            'csvFile' => 'required|file|mimes:csv,txt',
        ]);

        // Lire les données du fichier CSV
        $csvFile = Reader::createFromPath($this->csvFile->getRealPath(), 'r');
        $csvFile->setHeaderOffset(null);

        // Charger les enregistrements dans $csvRecords
        $this->csvRecords = iterator_to_array($csvFile->getRecords());

        // Initialiser les fonds sélectionnés avec la valeur par défaut (1)
        $this->selectedFunds = array_fill(0, count($this->csvRecords), 1);
    }
    public function import()
    {
        $this->validate([
            'selectedFunds' => 'required|array',
            'selectedFunds.*' => 'required|integer|exists:funds,id',
        ]);

        foreach ($this->csvRecords as $index => $record) {
            $amount = str_replace(',', '', $record[2]);
            $amount = number_format($amount, 2, '.', '');
            Transaction::create([
                'date' => \Carbon\Carbon::parse($record[0]), // Conversion de la date
                'amount' => $amount,
                'account' => $record[3],
                'identity' => $record[5],
                'description' => $record[8],
                'fund_id' => $this->selectedFunds[$index], // Fond choisi pour cette ligne
            ]);
        }

        $this->csvRecords = [];
        $this->csvFile = null;

        session()->flash('message', 'Fichier importé avec succès avec les fonds choisis !');
    }

    public function render()
    {
        $funds = Fund::all(); // Charger tous les fonds disponibles

        return view('livewire.bank-add-multiple-donation', compact('funds'));
    }
}
