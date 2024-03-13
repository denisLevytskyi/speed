<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarManufacturerController;
use App\Http\Controllers\DriveController;

Route::name('app.')->middleware(['auth', 'verified'])->group(function() {
    Route::resource('car', CarController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('car-manufacturer', CarManufacturerController::class);
    Route::resource('drive', DriveController::class);
});
