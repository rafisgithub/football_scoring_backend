<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





    Route::post('/registration', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/profile', [AuthController::class, 'getProfile']);
        Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
        Route::post('/verify-account', [AuthController::class, 'verifyAccount']);
        Route::post('/reset-password', [AuthController::class, 'resetPassword']);

        
    });
