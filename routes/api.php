<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UsuarioController;

Route::apiResource('usuarios', UsuarioController::class);

/* Fallback Route (404): */

Route::fallback(function () {
    return response()->json([
        'error' => 'La pàgina no existeix. Revisa la URL.'
    ], 404);
});