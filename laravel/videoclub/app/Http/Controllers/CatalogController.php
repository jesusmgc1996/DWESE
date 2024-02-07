<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogController extends Controller
{
    public function getIndex() {
        $peliculas = Movie::get();
        return view('catalog.index', ['peliculas' => $peliculas]);
    }

    public function getShow($id) {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', ['pelicula' => $pelicula]);
    }

    public function getCreate() {
        return view('catalog.create');
    }

    public function getEdit($id) {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', ['pelicula' => $pelicula]);
    }

    public function postCreate(Request $request) {
        $p = new Movie();
        $p->title = $request->input('title');
        $p->year = $request->input('year');;
        $p->director = $request->input('director');
        $p->poster = $request->input('poster');
        $p->synopsis = $request->input('synopsis');
        $p->save();
        return to_route('catalog');
    }

    public function putEdit(Request $request, $id) {
        $p = Movie::findOrFail($id);
        $p->title = $request->input('title');
        $p->year = $request->input('year');;
        $p->director = $request->input('director');
        $p->poster = $request->input('poster');
        $p->synopsis = $request->input('synopsis');
        $p->save();
        return to_route('show', ['id' => $id]);
    }

    public function putRent($id) {
        $p = Movie::findOrFail($id);
        $p->rented = true;
        $p->save();
        return to_route('show', ['id' => $id])->with('msg', 1);
    }

    public function putReturn($id) {
        $p = Movie::findOrFail($id);
        $p->rented = false;
        $p->save();
        return to_route('show', ['id' => $id])->with('msg', 1);
    }

    public function deleteMovie($id) {
        $p = Movie::findOrFail($id);
        $p->delete();
        return to_route('catalog')->with('msg', 1);
    }
}
