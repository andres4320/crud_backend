<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();

        return response()->json([
            'message' => 'Se traen los Paises',
            'data' => $countries,
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
        $country = new country();
        $country->name = $request->name;
        $country->save();

        return response()->json([
            'message' => 'Pais creado exitosamente',
            'country' => $country,
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
        $country = Country::find($id);

        if (!$country) {
            return response()->json(['message' => 'Pais no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Detalles del Pais',
            'country' => $country,
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

        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->save();

        return response()->json([
            'message' => 'Nombre del Pais actualizado exitosamente',
            'country' => $country,
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
            $country = Country::findOrFail($id);
            $country->delete();
    
            return response()->json([
                'message' => 'Pais eliminado exitosamente',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Pais no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el Pais'], 500);
        }
    }
}
