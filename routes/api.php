<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPendidikanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Pendidikan API Routes
Route::prefix('api_pendidikan')->group(function () {
    Route::get('/', [ApiPendidikanController::class, 'index']);
    Route::post('/', [ApiPendidikanController::class, 'createPen']);
    Route::get('/{id}', [ApiPendidikanController::class, 'show']);
    Route::put('/{id}', [ApiPendidikanController::class, 'updatePen']);
    Route::delete('/{id}', [ApiPendidikanController::class, 'deletePen']);
});