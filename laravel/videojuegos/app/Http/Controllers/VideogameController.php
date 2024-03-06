<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideogameRequest;
use App\Models\Videogame;
use App\Models\Developer;
use App\Models\Platform;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('videogame.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $developers = Developer::all();
        $platforms = Platform::all();

        return view('videogame.create')->with('developers', $developers)->with('platforms', $platforms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideogameRequest $request)
    {
        $request->validated();

        try {
            $videogame = new Videogame();
            $videogame->name = $request->name;
            $videogame->year = $request->year;
            $videogame->developer_id = $request->developer;

            $photoName = time() . "-" . $request->file('photo')->getClientOriginalName();
            $videogame->photo = $photoName;
            $request->file('photo')->storeAs('public/img_videogame', $photoName);

            $videogame->save();

            foreach ($request->platforms as $platform) {
                $videogame->platforms()->attach($platform);
            }

            return to_route('videogame.index')->with('status', 'Videojuego añadido correctamente');
        } catch (QueryException $e) {
            return to_route('videogame.index')->with('status', 'Error en la base de datos');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        $route = 'storage/img_videogame/';
        return view('videogame.show')->with('videogame', $videogame)->with('route', $route);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        $developers = Developer::all();
        $platforms = Platform::all();
        $route = 'storage/img_videogame/';

        return view('videogame.edit')->with('videogame', $videogame)->with('route', $route)->with('developers', $developers)->with('platforms', $platforms);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $request->validate([
            'name' => 'required | unique:videogames,name,'. $videogame->id . ',id,deleted_at,NULL',
            'year' => 'required | integer',
            'photo' => 'image',
            'developer' => 'required',
            'platforms' => 'required'
        ], [
            'name.required' => 'Debe introducir el nombre.',
            'name.unique' => 'El nombre ya existe.',
            'year.required' => 'Debe introducir el año.',
            'year.integer' => 'El año debe ser un número.',
            'photo' => 'Debe añadir una imagen.',
            'developer' => 'Debe seleccionar un desarrollador',
            'platforms' => 'Debe seleccionar al menos una plataforma.',
        ]);

        try {
            $videogame->name = $request->name;
            $videogame->year = $request->year;
            $videogame->developer_id = $request->developer;

            if (is_uploaded_file($request->file('photo'))) {
                Storage::delete('public/img_videogame/' . $videogame->photo);
                $photoName = time() . "-" . $request->file('photo')->getClientOriginalName();
                $videogame->photo = $photoName;
                $request->file('photo')->storeAs('public/img_videogame', $photoName);
            }

            $videogame->save();

            $videogame->platforms()->detach();
            foreach ($request->platforms as $platform) {
                $videogame->platforms()->attach($platform);
            }

            return to_route('videogame.index')->with('status', 'Videojuego modificado correctamente');
        } catch (QueryException $e) {
            return to_route('videogame.index')->with('status', 'Error en la base de datos');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        try {
            Storage::delete('public/img_videogame/' . $videogame->photo);
            $videogame->platforms()->detach();
            $videogame->delete();

            return to_route('videogame.index')->with('status', 'Videojuego borrado correctamente');
        } catch (QueryException $e) {
            return to_route('videogame.index')->with('status', 'Error en la base de datos');
        }
    }

    public function pdf()
    {
        $pdf = PDF::loadView('videogame.index');

        return $pdf->download('videogames.pdf');
    }
}
