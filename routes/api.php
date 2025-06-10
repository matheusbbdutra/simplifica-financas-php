<?php

use App\Finance\Adapter\Http\Controller\AccountController;
use Illuminate\Support\Facades\Route;
use App\User\Adapter\Http\Controller\UserController;

Route::prefix('user')->group(function () {
    Route::post('register', [UserController::class, 'create']);
    Route::post('login', [UserController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::put('update', [UserController::class, 'update']);
    });
});

Route::prefix('finances')->group(function () {
    Route::prefix('account')->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('create', [AccountController::class, 'create']);
            Route::get('list', [AccountController::class, 'list']);
        });
    });
});
