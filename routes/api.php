<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KamarApiController;
use App\Http\Controllers\Api\PenghuniApiController;
use App\Http\Controllers\Api\PembayaranApiController;
use App\Http\Controllers\Api\PengaduanApiController;

// Auth routes (public)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (semua user login)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Kamar - read untuk semua, write hanya admin
    Route::get('/kamar', [KamarApiController::class, 'index']);
    Route::get('/kamar/{kamar}', [KamarApiController::class, 'show']);

    // Penghuni - read untuk semua, write hanya admin
    Route::get('/penghuni', [PenghuniApiController::class, 'index']);
    Route::get('/penghuni/{penghuni}', [PenghuniApiController::class, 'show']);

    // Pembayaran - read untuk semua, write hanya admin
    Route::get('/pembayaran', [PembayaranApiController::class, 'index']);
    Route::get('/pembayaran/{pembayaran}', [PembayaranApiController::class, 'show']);

    // Pengaduan - semua user bisa tambah & lihat
    Route::get('/pengaduan', [PengaduanApiController::class, 'index']);
    Route::get('/pengaduan/{pengaduan}', [PengaduanApiController::class, 'show']);
    Route::post('/pengaduan', [PengaduanApiController::class, 'store']);

    // Admin only routes
    Route::middleware('admin')->group(function () {
        Route::post('/kamar', [KamarApiController::class, 'store']);
        Route::put('/kamar/{kamar}', [KamarApiController::class, 'update']);
        Route::delete('/kamar/{kamar}', [KamarApiController::class, 'destroy']);

        Route::post('/penghuni', [PenghuniApiController::class, 'store']);
        Route::put('/penghuni/{penghuni}', [PenghuniApiController::class, 'update']);
        Route::delete('/penghuni/{penghuni}', [PenghuniApiController::class, 'destroy']);

        Route::post('/pembayaran', [PembayaranApiController::class, 'store']);
        Route::put('/pembayaran/{pembayaran}', [PembayaranApiController::class, 'update']);
        Route::delete('/pembayaran/{pembayaran}', [PembayaranApiController::class, 'destroy']);

        Route::put('/pengaduan/{pengaduan}', [PengaduanApiController::class, 'update']);
        Route::delete('/pengaduan/{pengaduan}', [PengaduanApiController::class, 'destroy']);
    });
});