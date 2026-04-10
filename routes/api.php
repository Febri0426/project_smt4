<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPendidikanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk API Pendidikan
Route::get('/api_pendidikan', [ApiPendidikanController::class, 'index']);
Route::post('/api_pendidikan', [ApiPendidikanController::class, 'createPen']);
Route::get('/api_pendidikan/{id}', [ApiPendidikanController::class, 'getPen']);
Route::put('/api_pendidikan/{id}', [ApiPendidikanController::class, 'updatePen']);
Route::delete('/api_pendidikan/{id}', [ApiPendidikanController::class, 'deletePen']);