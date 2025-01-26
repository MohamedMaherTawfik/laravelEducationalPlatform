<?php

use App\Http\Controllers\api\categoreyController;
use App\Http\Controllers\api\courseManagment;
use App\Http\Controllers\api\lessonManagment;
use App\Http\Controllers\api\quizManagment;
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
    Route::post('/categories/{id}', 'update');
    Route::delete('/categories/{id}', 'destroy');
    Route::get('/categories/{id}', 'show');
    Route::get('/categories/{id}/courses', 'courses');
});


Route::controller(courseManagment::class)->group(function () {
    Route::get('/courses', 'index');
    Route::post('/courses', 'store');
    Route::post('/courses/{id}', 'update');
    Route::delete('/courses/{id}', 'destroy');
    Route::get('/courses/{id}', 'show');
    Route::get('/courses/{id}/lessons', 'lessons');
    Route::get('/courses/{id}/quiz', 'quiz');
});

Route::controller(lessonManagment::class)->group(function () {
    Route::get('/lessons', 'index');
    Route::post('/lessons', 'store');
    Route::post('/lessons/{id}', 'update');
    Route::delete('/lessons/{id}', 'destroy');
    Route::get('/lessons/{id}', 'show');
});

Route::controller(quizManagment::class)->group(function () {
    Route::get('/quiz', 'index');
    Route::post('/quiz', 'store');
    Route::post('/quiz/{id}', 'update');
    Route::delete('/quiz/{id}', 'destroy');
    Route::get('/quiz/{id}', 'show');
});
