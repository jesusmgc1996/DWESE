<?php

namespace App\Http\Controllers;

use App\Http\Requests\APICarRequest;
use App\Models\Car;

class APICarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return response()->json([
            'status' => 'true',
            'cars' => $cars
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(APICarRequest $request)
    {
        $car = Car::create($request->all());
        return response()->json([
            'status' => 'true',
            'car' => $car,
            'message' => 'Coche añadido correctamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(APICarRequest $request, string $id)
    {
        $car = Car::find($id);
        $car->update($request->all());
        return response()->json([
            'status' => 'true',
            'car' => $car,
            'message' => 'Coche añadido correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        $car->delete();
    }
}
