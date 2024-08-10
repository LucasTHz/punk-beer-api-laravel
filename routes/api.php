<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::post('/user', [UserController::class, 'store']);

Route::apiResource('user', UserController::class)->except(['index', 'store'])->middleware(['auth:sanctum', 'verifyUserById']);

Route::apiResource('favorite', FavoriteController::class)->middleware('auth:sanctum');

Route::post('/sanctum/token', [AuthController::class, 'login']);


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    ds($request->fulfill());
    return redirect('/home');

    return response([
        'message' => 'Email verificado com sucesso!',
    ], 200);
})->middleware(['auth:sanctum'])->name('verification.verify');
