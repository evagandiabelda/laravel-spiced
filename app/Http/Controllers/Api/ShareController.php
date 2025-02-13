<?php

namespace App\Http\Controllers\Api;

use App\Models\Share;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShareController extends Controller
{
    // Mostrar todos los shares
    public function index()
    {
        $shares = Share::with(['user'])->get();
        return response()->json($shares);
    }

    // Crear un nuevo share
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'fecha_publicacion' => 'required|date',
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
            'img_principal' => 'nullable|string|max:255',
            'img_secundaria' => 'nullable|string|max:255',
            'share_verificado' => 'nullable|boolean',
        ]);

        $share = Share::create($request->all());

        return response()->json($share, 201);
    }

    // Mostrar un solo share
    public function show(string $id)
    {
        $share = Share::with(['user'])->findOrFail($id);
        
        if (!$share) {
            return response()->json(['error' => 'Share no encontrado'], 404);
        }

        return response()->json($share);
    }

    // Actualizar un share
    public function update(Request $request, string $id)
    {
        $share = Share::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'fecha_publicacion' => 'required|date',
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
            'img_principal' => 'nullable|string|max:255',
            'img_secundaria' => 'nullable|string|max:255',
            'share_verificado' => 'nullable|boolean',
        ]);

        $share->update($request->all());

        return response()->json($share, 200);
    }

    // Eliminar un share
    public function destroy(string $id)
    {
        $share = Share::find($id);

        if (!$share) {
            return response()->json(['error' => 'Share no encontrado'], 404);
        }

        $share->delete();

        return response()->json(['message' => 'Share eliminado']);
    }
}
