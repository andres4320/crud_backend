<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\GenderController;

Route::prefix('auth')->group(function() {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth:api')->group(function () {

    //Profesiones
    Route::get('professions', [ProfessionController::class, 'index'])->withoutMiddleware('auth:api');
    //Genero
    Route::get('genders', [GenderController::class, 'index'])->name('index')->withoutMiddleware('auth:api');
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
    //Usuarios por municipio
    Route::get('users', [UserController::class, 'index'])->withoutMiddleware('auth:api');
    Route::get('users/usersByMunicipality', [UserController::class, 'getUsersByMunicipality'])->withoutMiddleware('auth:api');
    Route::get('users/usersByDepartament', [UserController::class, 'getUsersByDepartament'])->withoutMiddleware('auth:api');
    Route::get('users/usersByCountry', [UserController::class, 'getUsersByCountry'])->withoutMiddleware('auth:api');
    Route::get('users/usersByProfession', [UserController::class, 'getUsersByProfession'])->withoutMiddleware('auth:api');
    Route::get('users/usersByGender', [UserController::class, 'getUsersByGender'])->withoutMiddleware('auth:api');
});
