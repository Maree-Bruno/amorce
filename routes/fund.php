<?php

use App\Livewire\Fund;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

//index
    /*Route::get('/funds', Fund::class)->name('fund.index');*/
    //Route::get('/funds/create', Fund::class)->name('fund.create');
    Route::get('/funds/{fund}', Fund::class)->name('fund.index');
/*    Route::get('/funds/{fund}/edit', Fund::class)->name('fund.edit');*/
/*    Route::get('/funds', function () {
        $defaultFundId = Transaction::value('fund_id');
        return redirect()->route('fund.show', ['fund' => $defaultFundId]);
    });*/


});
