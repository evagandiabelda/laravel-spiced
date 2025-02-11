<?php

use App\Http\Controllers\Web\UsuarioController;
use App\Http\Controllers\Web\ShareController;
use App\Http\Controllers\Web\ComentarioController;
use App\Http\Controllers\Web\CategoriaController;
use App\Http\Controllers\Web\SpiceController;
use Illuminate\Support\Facades\Route;

/* ------------ RUTES WEB: ------------ */

Route::get('/', [ShareController::class, 'index'])->name('shares.index');

Route::resource('shares', ShareController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('comentarios', ComentarioController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('spices', SpiceController::class);

/* Fallback Route (404): */
Route::fallback(function () {
    return view('errors.404'); // Vista d'exemple (actualment no implementada).
    // També es podria fer un "return redirect('/');".
});


/* --------- EXEMPLES DE RUTES: --------- */

/* Exemple de ruta que mostra la data i hora actuals: */
Route::get('fecha', function() {
    return date("d/m/y h:i:s");
});

/* Exemple de ruta amb paràmetres i validació de paràmetres: */
Route::get('saludo/{nombre?}', function($nombre = "Invitado") {
    return "Hola, " . $nombre;
})->where('nombre', "[A-Za-z]+");

/* Route::get('/user', [UserController::class, 'index']); */