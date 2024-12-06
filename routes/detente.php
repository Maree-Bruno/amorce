<?php

use App\Livewire\Detente\Detente;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

//index
    Route::get('/detente', Detente::class)->name('detente');
    Route::get('/detente/{detente}/edit', Detente::class)->name('detente.edit');
    Route::get('/detente/create', Detente::class)->name('detente.create');
});
