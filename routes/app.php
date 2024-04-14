<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarManufacturerController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\DriveListController;
use App\Http\Controllers\PropController;
use App\Http\Controllers\WatchContrlorrel;

Route::name('app.')->middleware(['auth', 'verified', 'is.guest'])->group(function() {
    Route::resource('admin', AdminController::class)->middleware('is.admin');
    Route::resource('prop', PropController::class)->middleware('is.admin');
    Route::resource('car-manufacturer', CarManufacturerController::class);
    Route::resource('car', CarController::class);
    Route::resource('drive', DriveController::class);
    Route::get('drive/{drive}/check', [DriveController::class, 'show'])->name('drive.show.check');
    Route::get('watch', [WatchContrlorrel::class, 'index'])->middleware('is.watcher')->name('watch');
});

Route::get('terminal-write', [DriveListController::class, 'terminal'])->name('app.terminal.write');
Route::get('terminal-get', [DriveController::class, 'terminal'])->name('app.terminal.get');
Route::get('qr/{data}', function ($data) {
    include 'script/qrcode.php';
    QRcode::png(Crypt::decryptString($data), FALSE, 'M', 20, 0);
})->name('app.qr');
