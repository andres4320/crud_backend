<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        try {
            $users = User::all();

            return response()->json([
                'status' => true,
                'message' => 'Se traen los usuarios',
                'data' => $users,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuarios no encontrados'], 404);
        }
    }

    public function getUsersByMunicipality(Request $request): JsonResponse
    {
        try {
            $usersByMunicipality = User::select('municipality.name', \DB::raw('count(*) as total'))
                ->join('municipality', 'user.municipality_id', 'municipality.id')
                ->groupBy('municipality_id');

            $usersByMunicipality = $usersByMunicipality->get();

            return response()->json([
                'status' => true,
                'message' => 'Se trae la cantidad de usuarios por municipio',
                'data' => $usersByMunicipality,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'No se encontraron usuarios'], 404);
        }
    }

    public function getUsersByDepartament(Request $request): JsonResponse
    {
        try {
            $usersByDepartament = User::select('departaments.name', \DB::raw('count(*) as total'))
                ->join('municipality', 'user.municipality_id', 'municipality.id')
                ->join('departaments', 'municipality.departaments_id', 'departaments.id')
                ->groupBy('departaments.id')
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Se trae la cantidad de usuarios por departamento',
                'data' => $usersByDepartament,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'No se encontraron usuarios'], 404);
        }
    }

    public function getUsersByCountry(Request $request): JsonResponse
    {
        try {
            $usersByCountry = User::select('country.name', \DB::raw('count(*) as total'))
                ->join('municipality', 'user.municipality_id', 'municipality.id')
                ->join('departaments', 'municipality.departaments_id', 'departaments.id')
                ->join('country', 'departaments.country_id', 'country.id')
                ->groupBy('country.id')
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Se trae la cantidad de usuarios por país',
                'data' => $usersByCountry,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'No se encontraron usuarios'], 404);
        }
    }

    public function getUsersByProfession(Request $request): JsonResponse
    {
        try {
            $usersByProfession = User::select('profession.name', \DB::raw('count(*) as total'))
                ->join('profession', 'user.profession_id', 'profession.id')
                ->groupBy('profession.id')
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Se trae la cantidad de usuarios por profesion',
                'data' => $usersByProfession,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'No se encontraron usuarios'], 404);
        }
    }

    public function getUsersByGender(Request $request): JsonResponse
    {
        try {
            $usersByGender = User::select('gender.name', \DB::raw('count(*) as total'))
                ->join('gender', 'user.gender_id', 'gender.id')
                ->groupBy('gender.id')
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Se trae la cantidad de usuarios por género',
                'data' => $usersByGender,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'No se encontraron usuarios'], 404);
        }
    }
}