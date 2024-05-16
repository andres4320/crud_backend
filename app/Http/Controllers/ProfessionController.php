<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;

class ProfessionController extends Controller
{
    public function index()
    {
        try {

            $profession = Profession::all();
    
            return response()->json([
                'status' => true,
                'message' => 'Se traen las Profesiones',
                'data' => $profession,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Profesion no encontrado'], 404);
        }
    }
}
