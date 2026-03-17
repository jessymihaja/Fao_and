<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ClassificationController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API fonctionne',
    ]);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // --- CLASSIFICATIONS ---
    // lecture
    Route::get('/classifications', [ClassificationController::class, 'index']);
    // admin + gestionnaire
    Route::middleware('role:admin,gestionnaire')->group(function () {

        Route::post('/classifications', [ClassificationController::class, 'store']);
        Route::put('/classifications/{id}', [ClassificationController::class, 'update']);
        Route::delete('/classifications/{id}', [ClassificationController::class, 'destroy']);
    });
});
