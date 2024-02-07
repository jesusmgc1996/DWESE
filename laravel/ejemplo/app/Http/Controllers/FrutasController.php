<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrutasRequest;
use Illuminate\Support\Facades\DB;

class FrutasController extends Controller
{
    protected $redirectRoute = "peras";

    public function index() {
        $frutas = DB::table('frutas')->get();
        return view('frutas.index')->with('frutas', $frutas);
    }

    public function naranjas($num = 0) {
        return "VISTA DE NARANJAS $num";
    }
    
    public function peras() {
        return "VISTA DE PERAS";
    }
    
    public function guardaFruta(FrutasRequest $request) {
        /*if ($request->input("nombre") == "pera") {
            return redirect()->back()->withInput()->with('msg', 'Error, fruta no añadida');
        }
        return "Correcto";*/

        /*$messages = [
            "nombre.min" => "El nombre debe ser mayor de 5 caracteres",
            "nombre.lowercase" => "El nombre debe estar en minúsculas",
            "desc.max" => "La descripción debe tener un máximo de 10 caracteres",
            "temp.required" => "Debes seleccionar al menos una temporada"
        ];

        $request->validate([
            "nombre" => "required | min:5 | lowercase",
            "desc" => "required | max:10",
            "temp" => "required"
        ], $messages);*/

        $request->validated();

        return to_route('peras');
    }
}
