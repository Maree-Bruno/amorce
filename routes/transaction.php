<?php


use App\Livewire\BankAddMultipleDonation;
use App\Livewire\BankCreateDonation;
use App\Livewire\BankExpenses;
use App\Livewire\BankTransfert;
use App\Livewire\Transactions\Edit;
use App\Livewire\Transactions\Transaction;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/transactions/create/donation', BankCreateDonation::class)->name('transactions.create.donation');
    Route::get('/transactions/create/donations', BankAddMultipleDonation::class)->name('transactions.create.donations');
    Route::get('/transactions/create/transfer', BankTransfert::class)->name('transactions.create.transfer');
    Route::get('/transactions/create/spent', BankExpenses::class)->name('transactions.create.spent');
    Route::get('/transactions/{transaction}/edit', Edit::class)->name('transactions.edit');

});
