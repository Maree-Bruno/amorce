<?php

use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

//index
    Route::get('/bank', [App\Http\Controllers\BankController::class, 'index'])
        ->name('bank.index');
//create
    Route::get('/bank/create', [App\Http\Controllers\BankController::class, 'create'])
        ->name('bank.create');

//show
    Route::get('/bank/{bank}', [App\Http\Controllers\BankController::class, 'show'])
        ->name('bank.show');
//store
    Route::post('/bank', [App\Http\Controllers\BankController::class, 'store'])
        ->name('bank.store');
//edit
    Route::get('/bank/{bank}/edit', [App\Http\Controllers\BankController::class, 'edit'])
        ->can('update', 'bank')
        ->name('bank.edit');
//update
    Route::put('/bank/{bank}', [App\Http\Controllers\BankController::class, 'update'])
        ->can('update', 'bank')
        ->name('bank.update');
//delete
    Route::delete('/bank/{bank}', [App\Http\Controllers\BankController::class, 'destroy'])
        ->can('delete', 'bank')
        ->name('bank.delete');
});
