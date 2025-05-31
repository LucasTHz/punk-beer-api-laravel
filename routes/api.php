<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/user', [UserController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/me', [UserController::class, 'show']);
    Route::put('/user/me', [UserController::class, 'update']);
    Route::delete('/user/me', [UserController::class, 'destroy']);
});

Route::apiResource('favorite', FavoriteController::class)->middleware('auth:sanctum');

Route::post('/sanctum/token', [AuthController::class, 'login']);

Route::get('/email/verify/{id}/{hash}',[EmailVerifyController::class , 'verify'])->name('verification.verify');
