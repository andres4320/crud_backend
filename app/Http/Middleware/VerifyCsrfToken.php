<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $addHttpCookie = true;
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //Controles de Municipios
        'municipalities/create', 
        'municipalities/update/*',
        'municipalities/destroy/*',
        //Controles de Departamentos
        'departaments/create',
        'departaments/update/*',
        'departaments/destroy/*',
        //Controles de Paises
        'countries/create',
        'countries/update/*',
        'countries/destroy/*',
        //Controles de Usuarios
        '/user/register',

        'auth/facebook/callback',
        'auth/google/callback',
    ];
}
