<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index()
    {
        try {

            $gender = Gender::all();
    
            return response()->json([
                'status' => true,
                'message' => 'Se traen los generos',
                'data' => $gender,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Genero no encontrado'], 404);
        }
    }
}
