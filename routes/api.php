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

// Protected routes (butuh token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::apiResource('kamar', KamarApiController::class);
    Route::apiResource('penghuni', PenghuniApiController::class);
    Route::apiResource('pembayaran', PembayaranApiController::class);
    Route::apiResource('pengaduan', PengaduanApiController::class);
});