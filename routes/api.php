<?php

use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Identity Matrix Infrastructure
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function () {
    Route::post(env('SECURE_API') . '/register', [AuthApiController::class, 'register']);
    Route::post(env('SECURE_API') . '/reset-password', [AuthApiController::class, 'resetPassword']);
});
