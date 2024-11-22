<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

//index
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home.index');
});
