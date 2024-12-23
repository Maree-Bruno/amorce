<?php

namespace App\Livewire;

use App\Models\Transaction;
use League\Csv\Reader;
use Livewire\Component;
use Livewire\WithFileUploads;

class BankAddMultipleDonation extends Component
{
    use WithFileUploads;
    public $csvFile;

    public function import()
    {
        $this->validate([
            'csvFile' => 'required|file|mimes:csv,txt',
        ]);

        // Ouvrir le fichier CSV
        $csvFile = Reader::createFromPath($this->csvFile->getRealPath(), 'r');
        $csvFile->setHeaderOffset(null); // Utilisez les indices de ligne (pas d'en-tête)

        // Parcourir les enregistrements du CSV
        foreach ($csvFile->getRecords() as $record) {
            // Nettoyage de la valeur 'amount' pour enlever les virgules et garder seulement le format décimal correct
            $amount = str_replace(',', '', $record[2]); // Enlève les virgules pour les milliers
            $amount = number_format($amount, 2, '.', ''); // Formate le nombre avec un point décimal

            // Insérer la transaction dans la base de données
            Transaction::create([
                'date' => \Carbon\Carbon::parse($record[0]), // Conversion de la date
                'amount' => $amount, // Insertion de la valeur de 'amount' propre
                'account' => $record[3], // Compte
                'identity' => $record[5], // Identité
                'description' => $record[8], // Description
                'fund_id' => 1 // Identifiant du fonds
            ]);
        }

        // Message de succès
        session()->flash('message', 'Fichier importé avec succès !');
    }


    public function render()
    {
        return view('livewire.bank-add-multiple-donation');
    }
}
