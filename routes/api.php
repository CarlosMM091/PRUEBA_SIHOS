<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacienteController;

// Rutas públicas (sin token)
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

// Rutas protegidas con JWT
Route::middleware('auth:api')->group(function () {
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('refresh', [UserController::class, 'refresh']);
    Route::get('me', [UserController::class, 'me']);

    Route::apiResource('pacientes', PacienteController::class);
});
