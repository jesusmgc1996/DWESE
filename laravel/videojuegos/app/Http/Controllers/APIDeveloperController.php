<?php

namespace App\Http\Controllers;

use App\Http\Requests\APIDeveloperRequest;
use App\Models\Developer;
use Illuminate\Http\Request;

class APIDeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::all();
        return response()->json([
            'status' => 'true',
            'developers' => $developers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(APIDeveloperRequest $request)
    {
        $request->validated();
        $developer = Developer::create($request->all());
        return response()->json([
            'status' => 'true',
            'developer' => $developer,
            'message' => 'Desarrollador añadido correctamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $developer = Developer::find($id);
        return response()->json($developer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required | unique:developers,name,'. $id . ',id,deleted_at,NULL',
        ], [
            'name.required' => 'Debe introducir el nombre.',
            'name.unique' => 'El nombre ya existe.',
        ]);
        $developer = Developer::find($id);
        $developer->update($request->all());
        return response()->json([
            'status' => 'true',
            'developer' => $developer,
            'message' => 'Desarrollador actualizado correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $developer = Developer::find($id);
        $developer->delete();
    }
}
