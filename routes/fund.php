<?php

use App\Livewire\Fund;
use App\Livewire\Funds\CreateFund;
use App\Livewire\Funds\EditFund;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    // Route pour créer un fonds
    Route::get('/funds/create', CreateFund::class)->name('fund.create');

    // Route pour éditer un fonds
    Route::get('/funds/{fund}/edit', EditFund::class)->name('fund.edit');

    // Route pour afficher un fonds spécifique
    Route::get('/funds/{fund}', Fund::class)->name('fund.index');

    // Redirection automatique vers le fonds avec l'ID 1
    Route::get('/funds', function () {
        return redirect()->route('fund.index', ['fund' => 1]);
    });

});
