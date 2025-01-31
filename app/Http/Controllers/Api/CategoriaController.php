<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Mostrar todas las categorías
    public function index()
    {
        return response()->json(Categoria::all());
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        $categoria = Categoria::create($request->all());

        return response()->json($categoria, 201);
    }

    // Mostrar una sola categoría
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria);
    }

    // Actualizar una categoría
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nombre' => 'sometimes|required|string|max:100',
        ]);

        $categoria->update($request->all());

        return response()->json($categoria);
    }

    // Eliminar una categoría
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['error' => 'Categoria no encontrada'], 404);
        }

        $categoria->delete();

        return response()->json(['message' => 'Categoria eliminada']);
    }
}
