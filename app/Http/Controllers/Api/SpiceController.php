<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Spice;
use Illuminate\Http\Request;

class SpiceController extends Controller
{
    // Mostrar todos los spices
    public function index()
    {
        return response()->json(Spice::all());
    }

    // Crear un nuevo spice
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'color' => 'required|string|max:50',
        ]);

        $spice = Spice::create($request->all());

        return response()->json($spice, 201);
    }

    // Mostrar un solo spice
    public function show(string $id)
    {
        $spice = Spice::findOrFail($id);

        if (!$spice) {
            return response()->json(['error' => 'Spice no encontrado'], 404);
        }

        return response()->json($spice);
    }

    // Actualizar un spice
    public function update(Request $request, string $id)
    {
        $spice = Spice::findOrFail($id);

        $request->validate([
            'nombre' => 'sometimes|required|string|max:100',
            'color' => 'sometimes|required|string|max:50',
        ]);

        $spice->update($request->all());

        return response()->json($spice);
    }

    // Eliminar un spice
    public function destroy(string $id)
    {
        $spice = Spice::find($id);

        if (!$spice) {
            return response()->json(['error' => 'Spice no encontrado'], 404);
        }

        $spice->delete();

        return response()->json(['message' => 'Spice eliminado']);
    }
}
