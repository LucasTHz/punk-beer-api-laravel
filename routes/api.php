<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/user', [UserController::class, 'store']);

Route::apiResource('user', UserController::class)->except(['index', 'store'])->middleware('auth:sanctum');

Route::apiResource('favorite', FavoriteController::class)->middleware('auth:sanctum');

Route::post('/sanctum/token', [AuthController::class, 'login']);
