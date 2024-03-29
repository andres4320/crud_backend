<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $departaments = Departament::with('country');

            if ($request->countryId) {
                $departaments = $departaments->where('country_id', $request->countryId);
            }

            $departaments = $departaments->get()->toArray();

            return response()->json([
                'message' => 'Se traen los departamentos',
                'data' => $departaments,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $departament = new Departament();
            $departament->name = $request->name;
            $departament->country_id = $request->country_id;
            $departament->save();

            return response()->json([
                'message' => 'Departamento creado exitosamente',
                'data' => $departament,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el Departamento'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        try {
            $departament = Departament::where('id', $id)->firstOrFail();

            return response()->json([
                'message' => 'Detalles del Departamento',
                'data' => $departament,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required|max:255|string',
                'country_id' => 'required|integer',
            ]);

            $departament = Departament::findOrFail($id);
            $departament->name = $request->name;
            $departament->country_id = $request->country_id;

            info('Antes de guardar:', $departament->toArray());

            $departament->save();

            info('Después de guardar:', $departament->toArray());

            return response()->json([
                'message' => 'Nombre del Departamento actualizado exitosamente',
                'data' => $departament,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $departament = Departament::findOrFail($id);
            $departament->delete();

            return response()->json([
                'message' => 'Departamento eliminado exitosamente',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
    }
}
