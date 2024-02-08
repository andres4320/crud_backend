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
    public function index() :JsonResponse 
    {
        $municipalities = Municipality::all(); 

        return response()->json([
            'message' => 'Se traen los municipios',
            'municipality' => $municipalities,
        ]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $municipality = new Municipality();
        $municipality->name = $request->name;
        $municipality->departaments_id = $request->departaments_id;
        $municipality->save();

        return response()->json([
            'message' => 'Municipio creado exitosamente',
            'municipality' => $municipality,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
       $municipality = Municipality::find($id);

        if (!$municipality) {
            return response()->json(['message' => 'Municipio no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Detalles del Municipio',
            'municipality' => $municipality,
        ]);
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
        $request->validate([
            'name' => 'required|max:255|string',
        ]);

        $municipality = Municipality::findOrFail($id);
        $municipality->name = $request->name;
        $municipality->save();

        return response()->json([
            'message' => 'Nombre del municipio actualizado exitosamente',
            'municipality' => $municipality,
        ]); 
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
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el municipio'], 500);
        } 
    }
}
