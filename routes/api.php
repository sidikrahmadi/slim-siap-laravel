<?php

use App\Http\Controllers\Api\PemohonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/pemohon', App\Http\Controllers\Api\PemohonController::class);
// // kalau pakai di bawah ini jadi error: Array to string conversion
// Route::apiResource('/pemohon', [PemohonController::class, 'index']);

Route::get('/pemohon-by-uuid/{uuidPemohon}', [PemohonController::class, 'getPemohonByUuid']);
