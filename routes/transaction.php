<?php

use App\Livewire\BankAddMultipleDonation;
use App\Livewire\BankCreateDonation;
use App\Livewire\BankExpenses;
use App\Livewire\BankTransfert;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/transactions/create/donation', BankCreateDonation::class)->name('transactions.create');
    Route::get('/transactions/create/donations', BankAddMultipleDonation::class)->name('transactions.create');
    Route::get('/transactions/create/transfer', BankTransfert::class)->name('transactions.create');
    Route::get('/transactions/create/spent', BankExpenses::class)->name('transactions.create');

});
