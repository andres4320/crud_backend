<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;

// Route::group([
//     'middleware' => 'api',
//     'namespace' => 'App\Http\Controllers',
//     'prefix' => 'auth'
// ], function () { 

//     Route::post('login', [AuthController::class, 'login'])->name('login');
//     Route::post('register', [AuthController::class, 'register'])->name('register');
//     Route::post('store', [UserController::class, 'store'])->name('store');

//     Route::middleware('auth:api')->group(function(){

//         //CRUD de Municipios
//         Route::get('/municipalities', [MunicipalityController::class, 'index']);
//         Route::post('/municipalities/create', [MunicipalityController::class, 'store']);
//         Route::get('/municipalities/{id}', [MunicipalityController::class, 'show']);
//         Route::put('/municipalities/update/{id}', [MunicipalityController::class, 'update']);
//         Route::delete('/municipalities/destroy/{id}', [MunicipalityController::class, 'destroy']);

//         //CRUD de Departamentos
//         Route::get('/departaments', [DepartamentController::class, 'index']);
//         Route::post('/departaments/create', [DepartamentController::class, 'store']);
//         Route::get('/departaments/{id}', [DepartamentController::class, 'show']);
//         Route::put('/departaments/update/{id}', [DepartamentController::class, 'update']);
//         Route::delete('/departaments/destroy/{id}', [DepartamentController::class, 'destroy']);

//         //CRUD de Paises
//         Route::get('/countries', [CountryController::class, 'index']);
//         Route::post('/countries/create', [CountryController::class, 'store']);
//         Route::get('/countries/{id}', [CountryController::class, 'show']);
//         Route::put('/countries/update/{id}', [CountryController::class, 'update']);
//         Route::delete('/countries/destroy/{id}', [CountryController::class, 'destroy']);
        
//         //User
//         Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout');
//         Route::post('refresh', [\App\Http\Controllers\Api\AuthController::class, 'refresh'])->name('refresh');
//         Route::post('me', [\App\Http\Controllers\Api\AuthController::class, 'me'])->name('me');
        
//     });

// });

Route::prefix('auth')->group(function() {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth:api')->group(function () {
    // CRUD de Municipios
    Route::get('/municipalities', [MunicipalityController::class, 'index']);
    Route::post('/municipalities/create', [MunicipalityController::class, 'store']);
    Route::get('/municipalities/{id}', [MunicipalityController::class, 'show']);
    Route::put('/municipalities/update/{id}', [MunicipalityController::class, 'update']);
    Route::delete('/municipalities/destroy/{id}', [MunicipalityController::class, 'destroy']);

    // CRUD de Departamentos
    Route::get('/departaments', [DepartamentController::class, 'index']);
    Route::post('/departaments/create', [DepartamentController::class, 'store']);
    Route::get('/departaments/{id}', [DepartamentController::class, 'show']);
    Route::put('/departaments/update/{id}', [DepartamentController::class, 'update']);
    Route::delete('/departaments/destroy/{id}', [DepartamentController::class, 'destroy']);

    // CRUD de Países
    Route::get('/countries', [CountryController::class, 'index']);
    Route::post('/countries/create', [CountryController::class, 'store']);
    Route::get('/countries/{id}', [CountryController::class, 'show']);
    Route::put('/countries/update/{id}', [CountryController::class, 'update']);
    Route::delete('/countries/destroy/{id}', [CountryController::class, 'destroy']);
});
