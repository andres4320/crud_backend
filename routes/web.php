<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;

Route::middleware(['cors'])->group(function () {

    // //CRUD de Municipios
    // Route::get('/municipalities', [MunicipalityController::class, 'index']);
    // Route::post('/municipalities/create', [MunicipalityController::class, 'store']);
    // Route::get('/municipalities/{id}', [MunicipalityController::class, 'show']);
    // Route::put('/municipalities/update/{id}', [MunicipalityController::class, 'update']);
    // Route::delete('/municipalities/destroy/{id}', [MunicipalityController::class, 'destroy']);

    // //CRUD de Departamentos
    // Route::get('/departaments', [DepartamentController::class, 'index']);
    // Route::post('/departaments/create', [DepartamentController::class, 'store']);
    // Route::get('/departaments/{id}', [DepartamentController::class, 'show']);
    // Route::put('/departaments/update/{id}', [DepartamentController::class, 'update']);
    // Route::delete('/departaments/destroy/{id}', [DepartamentController::class, 'destroy']);

    // //CRUD de Paises
    // Route::get('/countries', [CountryController::class, 'index']);
    // Route::post('/countries/create', [CountryController::class, 'store']);
    // Route::get('/countries/{id}', [CountryController::class, 'show']);
    // Route::put('/countries/update/{id}', [CountryController::class, 'update']);
    // Route::delete('/countries/destroy/{id}', [CountryController::class, 'destroy']);

    // // Users
    // Route::post('/users/create', [UserController::class, 'store']);

    Route::get('/', function () {
        return view('welcome');
    });

    // Route::view('/{any}', 'angular-app.index')->where('any', '.*');

});

