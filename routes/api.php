<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::post('/user', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);

Route::apiResource('user', UserController::class)->except(['index', 'store'])->middleware('auth:sanctum');

Route::apiResource('favorite', FavoriteController::class);

Route::post('/sanctum/token', [AuthController::class, 'login']);
