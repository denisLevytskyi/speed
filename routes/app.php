<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;

Route::name('app.')->middleware(['auth', 'verified'])->group(function() {
    Route::resource('car', CarController::class);
    Route::resource('admin', AdminController::class);
});
