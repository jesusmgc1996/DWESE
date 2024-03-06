<?php

namespace App\Http\Controllers;

use App\Http\Requests\APIPlatformRequest;
use App\Models\Platform;
use Illuminate\Http\Request;

class APIPlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platforms = Platform::all();
        return response()->json([
            'status' => 'true',
            'platforms' => $platforms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(APIPlatformRequest $request)
    {
        $request->validated();
        $platform = Platform::create($request->all());
        return response()->json([
            'status' => 'true',
            'platform' => $platform,
            'message' => 'Plataforma añadida correctamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $platform = Platform::find($id);
        return response()->json($platform);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required | unique:platforms,name,'. $id . ',id,deleted_at,NULL',
        ], [
            'name.required' => 'Debe introducir el nombre.',
            'name.unique' => 'El nombre ya existe.',
        ]);
        $platform = Platform::find($id);
        $platform->update($request->all());
        return response()->json([
            'status' => 'true',
            'platform' => $platform,
            'message' => 'Plataforma actualizada correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $platform = Platform::find($id);
        $platform->delete();
    }
}
