<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            // Permitir todas las solicitudes desde el puerto 4200 durante el desarrollo
            ->header("Access-Control-Allow-Origin", "http://localhost:4200")
            // Métodos a los que se da acceso
            ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE")
            // Headers de la petición
            ->header("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, X-Token-Auth, Authorization");
    }
}
