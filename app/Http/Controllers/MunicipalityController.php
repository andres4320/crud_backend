<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $municipalities = Municipality::with('departament.country');

            if ($request->departamentId) {
                $municipalities = $municipalities->where('departaments_id', $request->departamentId);
            }

            $municipalities = $municipalities->get();
            logger($municipalities);

            return response()->json([
                'message' => 'Se traen los municipios',
                'data' => $municipalities,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Municipio no encontrado'], 404);
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
            $municipality = new Municipality();
            $municipality->name = $request->name;
            $municipality->departaments_id = $request->departaments_id;
            $municipality->save();

            return response()->json([
                'message' => 'Municipio creado exitosamente',
                'data' => $municipality,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el Municipio'], 500);
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
            $municipality = Municipality::where('id', $id)->firstOrFail();

            return response()->json([
                'message' => 'Detalles del Municipio',
                'data' => $municipality,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Municipio no encontrado'], 404);
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
        try{
            $request->validate([
                'name' => 'required|max:255|string',
                'departaments_id' =>'required|integer',
            ]);
    
            $municipality = Municipality::findOrFail($id);
            $municipality->name = $request->name;
            $municipality->departaments_id = $request->departaments_id;

            info('Antes de Guardar:', $municipality->toArray());

            $municipality->save();

            info('Despues de Guardar:', $municipality->toArray());
    
            return response()->json([
                'message' => 'Nombre del municipio actualizado exitosamente',
                'data' => $municipality,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Municipio no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        try {
            $municipality = Municipality::findOrFail($id);
            $municipality->delete();

            return response()->json([
                'message' => 'Municipio eliminado exitosamente',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Municipio no encontrado'], 404);
        }
    }
}
