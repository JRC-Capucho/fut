<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['VerifyToken'])->group(function () {

    Route::controller(PlayerController::class)
        ->prefix('player')
        ->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'listByTeam');
            Route::post("/", 'store');
            Route::put("/{id}", 'update');
            Route::delete("/{id}", 'delete');
        });

    Route::controller(TeamController::class)
        ->prefix('team')
        ->group(function () {
            Route::post("/", 'store');
            Route::get("/", 'index');
            Route::put("/{id}", 'update');
            Route::delete('/{id}', 'delete');
        });

    Route::controller(LeagueController::class)
        ->prefix('league')
        ->group(function () {
            Route::get("/{id}", 'index');
            Route::post("/", 'store');
            Route::put('/{id}', 'update');
            Route::delete('/{id}', 'delete');
        });

    Route::controller(GameController::class)
        ->prefix('game')
        ->group(function () {
            Route::post("/", 'store');
            Route::patch('/{id}', 'endGame');
            Route::put('/{id}', 'update');
            Route::delete('/{id}', 'delete');
        });
});
