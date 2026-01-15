<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\LigaController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

//Route::apiResource('Club', ClubController::class)->only(['index', 'show']);

Route::apiResource('clubes', ClubController::class);
Route::apiResource('jugadores', JugadorController::class);
Route::apiResource('ligas', LigaController::class);
    
Route::middleware('admin')->group(function () {
    Route::post('clubes', [ClubController::class, 'store']);
    Route::post('clubes/{club}', [ClubController::class, 'update']);
    Route::delete('clubes/{club}', [ClubController::class, 'destroy']);

    Route::post('jugadores', [JugadorController::class, 'store']);
    Route::post('jugadores/{jugador}', [JugadorController::class, 'update']);
    Route::delete('jugadores/{jugador}', [JugadorController::class, 'destroy']);

    Route::post('ligas', [LigaController::class, 'store']);
    Route::post('ligas/{liga}', [LigaController::class, 'update']);
    Route::delete('ligas/{liga}', [LigaController::class, 'destroy']);

});
