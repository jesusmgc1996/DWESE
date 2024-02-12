<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Http\Requests\CarRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $cars = $user->cars;
        return view('car.index')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $request->validated();

        try {
            $car = new Car();
            $car->plate = $request->plate;
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->last_revision_date = $request->last_revision_date;
            $car->price = $request->price;
            $car->user_id = Auth::id();

            $photoName = time() . "-" . $request->file('photo')->getClientOriginalName();
            $car->photo = $photoName;
            $request->file('photo')->storeAs('public/img_car', $photoName);

            $car->save();

            return to_route('car.index')->with('status', 'Coche añadido correctamente');
        } catch (QueryException $e) {
            return to_route('car.index')->with('status', 'Error en la base de datos');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $route = 'storage/img_car/';
        return view('car.show')->with('car', $car)->with('route', $route);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $route = 'storage/img_car/';
        return view('car.edit')->with('car', $car)->with('route', $route);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'plate' => 'required | unique:cars,plate,' . $car->id . ',id,deleted_at,NULL',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required | integer',
            'last_revision_date' => 'required | date',
            'photo' => 'image',
            'price' => 'required | numeric'
        ]);

        try {
            $car->plate = $request->plate;
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->last_revision_date = $request->last_revision_date;
            $car->price = $request->price;

            if (is_uploaded_file($request->file('photo'))) {
                Storage::delete('public/img_car/' . $car->photo);
                $photoName = time() . "-" . $request->file('photo')->getClientOriginalName();
                $car->photo = $photoName;
                $request->file('photo')->storeAs('public/img_car', $photoName);
            }

            $car->save();

            return to_route('car.index')->with('status', 'Coche modificado correctamente');
        } catch (QueryException $e) {
            return to_route('car.index')->with('status', 'Error en la base de datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        try {
            $car->delete();

            return to_route('car.index')->with('status', 'Coche borrado correctamente');
        } catch (QueryException $e) {
            return to_route('car.index')->with('status', 'Error en la base de datos');
        }
    }
}
