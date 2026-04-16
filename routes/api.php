<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ClassificationController;
use App\Http\Controllers\API\DeviseController;
use App\Http\Controllers\API\DomaineInterventionController;
use App\Http\Controllers\API\EntiteAccrediteeController;
use App\Http\Controllers\API\FinancementController;
use App\Http\Controllers\API\HeroController;
use App\Http\Controllers\API\MapController;
use App\Http\Controllers\API\ProjetController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\ZoneGeographiqueController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API fonctionne',
    ]);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/heros', [HeroController::class, 'index']);
Route::get('/maps/{id}', [MapController::class, 'show']);
Route::get('/maps', [MapController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // lecture
    Route::get('/classifications', [ClassificationController::class, 'index']);
    Route::get('/statuses', [StatusController::class, 'index']);
    Route::get('/zone-geographiques', [ZoneGeographiqueController::class, 'index']);
    Route::get('/entite-accreditees', [EntiteAccrediteeController::class, 'index']);
    Route::get('/domaine-interventions', [DomaineInterventionController::class, 'index']);
    Route::get('/projets', [ProjetController::class, 'index']);
    Route::get('/projets/{id}', [ProjetController::class, 'show']);
    Route::get('/financements', [FinancementController::class, 'index']);
    Route::get('/financements/{id}', [FinancementController::class, 'show']);
    Route::get('/devises', [DeviseController::class, 'index']);
            // --- HERO ---
        Route::post('/heros', [HeroController::class, 'store']);
        Route::put('/heros/{id}', [HeroController::class, 'update']);
        Route::delete('/heros/{id}', [HeroController::class, 'destroy']);

        // --- MAPS ---
        Route::post('/maps', [MapController::class, 'store']);
        Route::put('/maps/{id}', [MapController::class, 'update']);
        Route::delete('/maps/{id}', [MapController::class, 'destroy']);

    // admin + gestionnaire
    Route::middleware('role:admin,gestionnaire')->group(function () {
        // --- CLASSIFICATIONS ---
        Route::post('/classifications', [ClassificationController::class, 'store']);
        Route::put('/classifications/{id}', [ClassificationController::class, 'update']);
        Route::delete('/classifications/{id}', [ClassificationController::class, 'destroy']);

        // --- STATUSES ---
        Route::post('/statuses', [StatusController::class, 'store']);
        Route::put('/statuses/{id}', [StatusController::class, 'update']);
        Route::delete('/statuses/{id}', [StatusController::class, 'destroy']);

        // --- ZONES GEOGRAPHIQUES ---
        Route::post('/zone-geographiques', [ZoneGeographiqueController::class, 'store']);
        Route::put('/zone-geographiques/{id}', [ZoneGeographiqueController::class, 'update']);
        Route::delete('/zone-geographiques/{id}', [ZoneGeographiqueController::class, 'destroy']);

        // --- ENTITES ACCREDITEES ---
        Route::post('/entite-accreditees', [EntiteAccrediteeController::class, 'store']);
        Route::put('/entite-accreditees/{id}', [EntiteAccrediteeController::class, 'update']);
        Route::delete('/entite-accreditees/{id}', [EntiteAccrediteeController::class, 'destroy']);

        // --- DOMAINES D'INTERVENTION ---
        Route::post('/domaine-interventions', [DomaineInterventionController::class, 'store']);
        Route::put('/domaine-interventions/{id}', [DomaineInterventionController::class, 'update']);
        Route::delete('/domaine-interventions/{id}', [DomaineInterventionController::class, 'destroy']);

        // --- PROJETS ---
        Route::post('/projets', [ProjetController::class, 'store']);
        Route::put('/projets/{id}', [ProjetController::class, 'update']);
        Route::delete('/projets/{id}', [ProjetController::class, 'destroy']);

        // --- DEVISES ---
        Route::post('/devises', [DeviseController::class, 'store']);
        Route::put('/devises/{id}', [DeviseController::class, 'update']);
        Route::delete('/devises/{id}', [DeviseController::class, 'destroy']);

        // --- FINANCEMENTS ---
        Route::post('/financements', [FinancementController::class, 'store']);
        Route::put('/financements/{id}', [FinancementController::class, 'update']);
        Route::delete('/financements/{id}', [FinancementController::class, 'destroy']);



    });

});
