<?php

use Illuminate\Support\Facades\Route;

Route::controller(PlayerController::class)
    ->prefix('player')
    ->middleware(['VerifyToken'])
    ->group(function () {
        Route::post("/", 'store');
    });

Route::controller(TeamController::class)
    ->prefix('team')
    ->middleware(['VerifyToken'])
    ->group(function () {
        Route::post("/", 'store');
        Route::get("/", 'index');
        Route::put("/{id}", 'update');
    });

Route::controller(LeagueController::class)
    ->prefix('league')
    ->middleware(['VerifyToken'])
    ->group(function () {
        Route::post("/", 'store');
        Route::put('/{id}', 'update');
    });

Route::controller(GameController::class)
    ->prefix('game')
    ->middleware(['VerifyToken'])
    ->group(function () {
        Route::post("/", 'store');
        Route::patch('/{id}', 'scoreboard');
    });
