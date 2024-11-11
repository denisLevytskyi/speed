<?php

use App\Http\Controllers\CarManufacturerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\WatchContrlorrel;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropController;
use App\Http\Controllers\DriveListController;

Route::name('app.')->middleware(['auth', 'verified', 'is.guest'])->group(function() {
    Route::resource('car-manufacturer', CarManufacturerController::class)->middleware('is.pass.strong.mod');
    Route::resource('car', CarController::class)->middleware('is.pass.strong.mod');
    Route::resource('drive', DriveController::class);
    Route::get('drive/{drive}/check', [DriveController::class, 'show'])->name('drive.show.check');
    Route::get('watch', [WatchContrlorrel::class, 'index'])->name('watch')->middleware('is.watcher');
    Route::get('report', [ReportController::class, 'index'])->name('report.index')->middleware('is.admin');
    Route::post('report', [ReportController::class, 'store'])->name('report.store')->middleware('is.admin');
    Route::resource('admin', AdminController::class)->middleware('is.admin');
    Route::resource('prop', PropController::class)->middleware('is.admin');
    Route::post('terminal-write', [DriveListController::class, 'terminal'])->name('terminal.write');
    Route::get('terminal-get', [DriveController::class, 'terminal'])->name('terminal.get');
});

Route::get('qr/{data}', function ($data) {
    include 'script/qrcode.php';
    QRcode::png(Crypt::decryptString($data), FALSE, 'M', 20, 0);
})->name('app.qr');
