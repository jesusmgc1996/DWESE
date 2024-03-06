<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideogameController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('videogame', VideogameController::class)->middleware(['auth', 'verified']);
Route::resource('user', UserController::class)->middleware(['auth', 'verified', 'admin']);

Route::get('/pdfVideogames', [VideogameController::class, 'pdf'])->middleware(['auth' , 'verified'])->name('videogames.pdf');
Route::get('/pdfUsers', [UserController::class, 'pdf'])->middleware(['auth' , 'verified', 'admin'])->name('users.pdf');

require __DIR__.'/auth.php';
