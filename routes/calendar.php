<?php

use App\Livewire\Calendar\Calendar;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

//index
    Route::get('/calendar', Calendar::class)->name('calendar');
});
