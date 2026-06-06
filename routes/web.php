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

    // Semua user bisa lihat
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
    Route::get('/penghuni', [PenghuniController::class, 'index'])->name('penghuni.index');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');

    // Semua user bisa tambah pengaduan
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

    // Hanya admin
    Route::middleware('admin')->group(function () {
        Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
        Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
        Route::get('/kamar/{kamar}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
        Route::put('/kamar/{kamar}', [KamarController::class, 'update'])->name('kamar.update');
        Route::delete('/kamar/{kamar}', [KamarController::class, 'destroy'])->name('kamar.destroy');

        Route::get('/penghuni/create', [PenghuniController::class, 'create'])->name('penghuni.create');
        Route::post('/penghuni', [PenghuniController::class, 'store'])->name('penghuni.store');
        Route::get('/penghuni/{penghuni}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
        Route::put('/penghuni/{penghuni}', [PenghuniController::class, 'update'])->name('penghuni.update');
        Route::delete('/penghuni/{penghuni}', [PenghuniController::class, 'destroy'])->name('penghuni.destroy');

        Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
        Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
        Route::get('/pembayaran/{pembayaran}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
        Route::put('/pembayaran/{pembayaran}', [PembayaranController::class, 'update'])->name('pembayaran.update');
        Route::delete('/pembayaran/{pembayaran}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');

        Route::get('/pengaduan/{pengaduan}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
        Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update'])->name('pengaduan.update');
        Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    });
});

require __DIR__.'/auth.php';