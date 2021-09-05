<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Handlers\Auth\GetAuthUserHandler;
use App\Http\Handlers\Auth\LogoutHandler;
use Illuminate\Support\Facades\Route;

Route::post('login', LoginController::class);
Route::post('register', RegisterController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', GetAuthUserHandler::class);
    Route::post('logout', LogoutHandler::class);
    Route::apiResource('meals', MealController::class)->only(['index', 'show']);
    Route::apiResource('orders', OrderController::class)->only(['index', 'store']);
});
