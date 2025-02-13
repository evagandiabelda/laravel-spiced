<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Share;
use App\Models\User;

class ComentarioController extends Controller
{
    // Mostrar todos los comentarios asociados a un Share:
    public function index($share_id)
    {
        $share = Share::findOrFail($share_id);

        $comentarios = Comentario::where('share_id', $share_id)->orderBy('created_at', 'asc')->get();

        return view('comentarios.index', compact('share', 'comentarios'));
    }

    // Mostrar el formulario para crear un nuevo comentario
    public function create()
    {
        return view('comentarios.create');
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

        return redirect()->route('shares.show', $comentario->share_id)->with('success', '¡Comentario publicado!');
    }

    // Eliminar un comentario
    public function destroy(string $id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentarioId = $comentario->comentario_id; // Guardamos el ID antes de eliminar

        $comentario->delete();

        return redirect()->route('shares.show', $comentarioId)->with('success', 'Comentario eliminado correctamente.');
    }
}
