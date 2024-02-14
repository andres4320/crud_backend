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
        try {

            $countries = Country::all();

            return response()->json([
                'status' => true,
                'message' => 'Se traen los Paises',
                'data' => $countries,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'País no encontrado'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $country = new country();
            $country->name = $request->name;
            $country->save();

            return response()->json([
                'message' => 'Pais creado exitosamente',
                'data' => ['country' => $country],
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el País'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $country = Country::where('id', $id)->firstOrFail();

            return response()->json([
                'message' => 'Detalles del Pais',
                'country' => $country,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'País no encontrado'], 404);
        }
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
        try {
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
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'País no encontrado'], 404);
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
            $country = Country::findOrFail($id);
            $country->delete();

            return response()->json([
                'message' => 'Pais eliminado exitosamente',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Pais no encontrado'], 404);
        } 
    }
}
