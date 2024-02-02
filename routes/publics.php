<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(HealthCheckController::class)->group(function () {
    Route::get('/', 'check');
});

Route::controller(UserController::class)
    ->prefix('user')
    ->group(function () {
        Route::post("/", 'store');
        Route::put("/{id}", 'update');
    });
