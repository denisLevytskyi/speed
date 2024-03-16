<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarManufacturerController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\DriveListController;

Route::name('app.')->middleware(['auth', 'verified'])->group(function() {
    Route::resource('car', CarController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('car-manufacturer', CarManufacturerController::class);
    Route::resource('drive', DriveController::class);
});

Route::get('terminal', [DriveListController::class, 'terminal'])->name('app.terminal');
Route::get('qr/{data}', function ($data) {
    include 'script/qrcode.php';
    QRcode::png(Crypt::decryptString($data), FALSE, 'M', 20, 0);

})->name('app.qr');
