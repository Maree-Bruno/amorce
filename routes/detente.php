<?php

use App\Livewire\Detente\Detente;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

//index
    Route::get('/detente', Detente::class)->name('detente');
});
