<?php

use App\Http\Controllers\api\categoreyController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
});

Route::controller(categoreyController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::post('/categories', 'store');
    Route::put('/categories/{id}', 'update');
    Route::delete('/categories/{id}', 'destroy');
    Route::get('/categories/{id}', 'show');
    Route::get('/categories/{id}/courses', 'courses');
});
