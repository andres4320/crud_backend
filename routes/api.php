<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;

Route::prefix('auth')->group(function() {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth:api')->group(function () {
    // CRUD de Municipios
    Route::get('/municipalities', [MunicipalityController::class, 'index'])->withoutMiddleware('auth:api');
    Route::post('/municipalities/create', [MunicipalityController::class, 'store']);
    Route::get('/municipalities/{id}', [MunicipalityController::class, 'show']);
    Route::put('/municipalities/update/{id}', [MunicipalityController::class, 'update']);
    Route::delete('/municipalities/destroy/{id}', [MunicipalityController::class, 'destroy']);

    // CRUD de Departamentos
    Route::get('/departaments', [DepartamentController::class, 'index'])->withoutMiddleware('auth:api');
    Route::post('/departaments/create', [DepartamentController::class, 'store']);
    Route::get('/departaments/{id}', [DepartamentController::class, 'show']);
    Route::put('/departaments/update/{id}', [DepartamentController::class, 'update']);
    Route::delete('/departaments/destroy/{id}', [DepartamentController::class, 'destroy']);

    // CRUD de Países
    Route::get('/countries', [CountryController::class, 'index'])->withoutMiddleware('auth:api');
    Route::post('/countries/create', [CountryController::class, 'store']);
    Route::get('/countries/{id}', [CountryController::class, 'show']);
    Route::put('/countries/update/{id}', [CountryController::class, 'update']);
    Route::delete('/countries/destroy/{id}', [CountryController::class, 'destroy']);
});
