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
    public function index(): JsonResponse
    {
        $departaments = Departament::with('country')->get()->toArray(); 

        return response()->json([
            'message' => 'Se traen los departamentos',
            'data' => $departaments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departament = new Departament();
        $departament->name = $request->name;
        $departament->country_id = $request->country_id;
        $departament->save();

        return response()->json([
            'message' => 'Departamento creado exitosamente',
            'data' => $departament,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departament = Departament::where('id',$id)->get();

        return response()->json([
            'message' => 'Detalles del Departamento',
            'data' => $departament,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
        ]);

        $departament = Departament::findOrFail($id);
        $departament->name = $request->name;
        $departament->save();

        return response()->json([
            'message' => 'Nombre del Departamento actualizado exitosamente',
            'data' => $departament,
        ]); 
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
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el Departamento'], 500);
        }
    }
}
