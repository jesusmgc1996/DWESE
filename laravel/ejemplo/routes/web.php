<?php

use App\Http\Controllers\FrutasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "Bienvenido a mi web";
});

Route::get('/contacto/{nombre?}/{edad?}', function ($nombre = "Jesús", $edad = 27) {
    return view('contacts.contact')->with('nombre', $nombre)->with('edad', $edad)->with('frutas', array('pera', 'manzana', 'naranja', 'plátano'));
    //return view('contacts.contact', compact("nombre", "edad"));
})->where(['nombre' => '[A-Za-z]+', 'edad' => '[0-9]+'])->middleware('mayorEdad:10,Antonio')->name('contacto');

Route::get('/vistamaster', function () {
    return view('vista_master');
});

Route::get('/vistacomponente', function () {
    return view('vista_componente');
});

Route::prefix('fruteria')->group(function() {
    Route::get('/frutas', [FrutasController::class, 'index'])->name('frutas');
    Route::post('/frutas', [FrutasController::class, 'guardaFruta'])->name('guardaFruta');
    Route::get('/naranjas/{num?}', [FrutasController::class, 'naranjas'])->name('naranjas');
    Route::get('/peras', [FrutasController::class, 'peras'])->name('peras');
});