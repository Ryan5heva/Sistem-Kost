<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengaduanController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('kamar', KamarController::class);
    Route::resource('penghuni', PenghuniController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('pengaduan', PengaduanController::class);
});

require __DIR__.'/auth.php';