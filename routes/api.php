<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::post('/user', [UserController::class, 'store']);

Route::apiResource('user', UserController::class)->except(['index', 'store'])->middleware(['auth:sanctum', 'verifyUserById']);

Route::apiResource('favorite', FavoriteController::class)->middleware('auth:sanctum');

Route::post('/sanctum/token', [AuthController::class, 'login']);

Route::get('/email/verify/{id}/{hash}',[EmailVerifyController::class , 'verify'])->name('verification.verify');
