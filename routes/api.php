<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('login', LoginController::class);
Route::post('register', RegisterController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('meals', MealController::class)->only(['index', 'show']);
    Route::apiResource('orders', OrderController::class)->only(['index', 'store']);
});
