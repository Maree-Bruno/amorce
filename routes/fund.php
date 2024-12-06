<?php

use App\Livewire\Fund;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

//index
    Route::get('/funds', Fund::class)->name('fund');
    Route::get('/funds/{fund}/edit', Fund::class)->name('fund.edit');
    Route::get('/funds/{fund}', Fund::class)->name('fund.show');
    Route::get('/funds/create', Fund::class)->name('fund.create');
});
