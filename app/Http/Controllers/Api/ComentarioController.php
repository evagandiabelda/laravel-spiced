<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Share;
use App\Models\User;

class ComentarioController extends Controller
{
    // Mostrar todos los comentarios
    public function index()
    {
        $comentarios = Comentario::with(['user', 'share'])->get();
        return response()->json($comentarios);
    }

    // Crear un nuevo comentario
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Validar que el usuario existe
            'share_id' => 'required|exists:shares,id', // Validar que el share existe
            'texto' => 'required|string',
        ]);

        $comentario = Comentario::create($request->all());

        return response()->json($comentario, 201);
    }

    // Mostrar un solo comentario
    public function show(string $id)
    {
        $comentario = Comentario::with(['user', 'share'])->findOrFail($id);

        if (!$comentario) {
            return response()->json(['error' => 'Comentario no encontrado'], 404);
        }

        return response()->json($comentario);
    }

    // Actualizar un comentario
    public function update(Request $request, string $id)
    {
        $comentario = Comentario::findOrFail($id);

        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'share_id' => 'sometimes|exists:shares,id',
            'texto' => 'sometimes|required|string',
        ]);

        $comentario->update($request->only(['user_id', 'share_id', 'texto']));

        return response()->json($comentario);
    }

    // Eliminar un comentario
    public function destroy(string $id)
    {
        $comentario = Comentario::findOrFail($id);

        $comentario->delete();

        return response()->json(['message' => 'Comentario eliminado con éxito']);
    }
}
