<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CombinationController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/user', [UserController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function (): void {
    Route::get('/user/me', [UserController::class, 'show']);
    Route::put('/user/me', [UserController::class, 'update']);
    Route::delete('/user/me', [UserController::class, 'destroy']);

    Route::prefix('favorites')->group(function (): void {
        Route::get('/', [FavoriteController::class, 'index']);
        Route::get('{combination}', [FavoriteController::class, 'show']);
        Route::post('/combinations/{combination}', [FeedController::class, 'addToFavorites']);
        Route::delete('/combinations/{combination}', [FeedController::class, 'removeFromFavorites']);
    });
});

Route::apiResource('combinations/me', CombinationController::class)
    ->parameters(['me' => 'combinations'])
    ->middleware('auth:sanctum');


Route::post('/sanctum/token', [AuthController::class, 'login']);

Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class , 'verify'])->name('verification.verify');

Route::prefix('feed')->group(function (): void {
    Route::get('', [FeedController::class, 'feed']);
});
