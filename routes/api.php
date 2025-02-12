<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ShareController;
use App\Http\Controllers\Api\ComentarioController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\SpiceController;

/* ------------ RUTES API: ------------ */

Route::apiResource('usuarios', UserController::class);
Route::apiResource('shares', ShareController::class);
Route::apiResource('comentarios', ComentarioController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('spices', SpiceController::class);

/* Fallback Route (404): */
Route::fallback(function () {
    return response()->json([
        'error' => 'La pàgina no existeix. Revisa la URL.'
    ], 404);
});