<?php

use App\Http\Controllers\Privates\PlayerController;
use Illuminate\Support\Facades\Route;


Route::controller(PlayerController::class)
    ->prefix('player')
    ->group(function () {
        Route::post("/", 'store');
    });
