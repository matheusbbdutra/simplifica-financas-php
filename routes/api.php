<?php

use Illuminate\Support\Facades\Route;
use App\User\Adapter\Http\Controller\UserController;

Route::prefix('user')->group(function () {
    Route::post('register', [UserController::class, 'create']);
    Route::post('login', [UserController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::put('update', [UserController::class, 'update']);
    });
});
