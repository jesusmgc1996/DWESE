<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
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

/*Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/catalog', function () {
    return view('catalog.index');
})->middleware('auth')->name('catalog');

Route::get('/catalog/show/{id}', function ($id) {
    return view('catalog.show')->with('id', $id);
})->middleware('auth')->name('show');

Route::get('/catalog/create', function () {
    return view('catalog.create');
})->middleware('auth')->name('create');

Route::get('/catalog/edit/{id}', function ($id) {
    return view('catalog.edit')->with('id', $id);
})->middleware('auth')->name('edit');*/

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/catalog/create', [CatalogController::class, 'postCreate'])->name('postCreate');
    Route::put('/catalog/edit/{id}', [CatalogController::class, 'putEdit'])->name('putEdit');
    Route::put('/catalog/rent/{id}', [CatalogController::class, 'putRent'])->name('rent');
    Route::put('/catalog/return/{id}', [CatalogController::class, 'putReturn'])->name('return');
    Route::delete('/catalog/delete/{id}', [CatalogController::class, 'deleteMovie'])->name('delete');
});

Route::get('/', [HomeController::class, 'getHome'])->name('welcome');
Route::get('/catalog', [CatalogController::class, 'getIndex'])->name('catalog');
Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow'])->name('show');
Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->name('create');
Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit'])->name('edit');

require __DIR__.'/auth.php';
