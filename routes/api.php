<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/* Fallback Route (404): */

Route::fallback(function () {
    return response()->json([
        'error' => 'La pàgina no existeix. Revisa la URL.'
    ], 404);
});