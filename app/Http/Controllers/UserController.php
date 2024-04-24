<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validar los datos del usuario
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users|max:255',
                'password' => 'required|string|min:8',
            ]);

            // Crear un nuevo usuario
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            // Guardar el usuario en la base de datos
            $user->save();

            // Devolver una respuesta indicando que el usuario ha sido creado
            return response()->json(['message' => 'Usuario creado con éxito'], 201);
        } catch (\Exception $e) {
            // Capturar excepciones y devolver una respuesta de error
            \Log::error('Error al crear usuario: ' . $e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
}
