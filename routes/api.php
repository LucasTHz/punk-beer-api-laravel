<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/user', [UserController::class, 'store']);

Route::apiResource('user', UserController::class)->except(['index', 'store'])->middleware('auth:sanctum');
Route::prefix('user')->group(function () {
    Route::post('/{user}/favorite', [UserController::class, 'createFavorite'])->middleware('auth:sanctum');
});

Route::post('/sanctum/token', [AuthController::class, 'login']);
