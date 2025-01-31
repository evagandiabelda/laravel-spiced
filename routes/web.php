<?php

use Illuminate\Support\Facades\Route;

/* ------------ RUTES WEB: ------------ */

Route::get('/', function () {
    return view('welcome'); // Està renderitzant la vista per defecte de Laravel.
});

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