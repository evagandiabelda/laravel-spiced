<?php

namespace App\Http\Controllers\Web;

use App\Models\Share;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShareController extends Controller
{
    // Mostrar todos los shares
    public function index()
    {
        $shares = Share::all();
        return view('index', compact('shares'));
    }

    // Mostrar el formulario para crear un nuevo share
    public function create()
    {
        return view('shares.create');
    }

    // Mostrar el formulario para editar un share
    public function edit($id)
    {
        $share = Share::findOrFail($id);
        return view('shares.edit', compact('share'));
    }

    // Crear un nuevo share
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'fecha_publicacion' => 'required|date',
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
            'img_principal' => 'nullable|string|max:255',
            'img_secundaria' => 'nullable|string|max:255',
            'share_verificado' => 'nullable|boolean',
        ]);

        $share = Share::create($request->all());

        return redirect()->route('shares.show', $share->id)->with('success', 'Tu Share se ha publicado correctamente.');
    }

    // Mostrar un solo share
    public function show(string $id)
    {
        $share = Share::findOrFail($id);
        return view('shares.show', compact('share'));
    }

    // Actualizar un share
    public function update(Request $request, string $id)
    {
        $share = Share::findOrFail($id);

        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'fecha_publicacion' => 'required|date',
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
            'img_principal' => 'nullable|string|max:255',
            'img_secundaria' => 'nullable|string|max:255',
            'share_verificado' => 'nullable|boolean',
        ]);

        $share->update($request->all());

        return redirect()->route('shares.show', $share->id)->with('success', 'Cambios guardados.');
    }

    // Eliminar un share
    public function destroy(string $id)
    {
        $share = Share::find($id);

        if (!$share) {
            return response()->json(['error' => 'Share no encontrado'], 404);
        }

        $share->delete();

        return redirect()->route('shares.index')->with('success', 'Share eliminado correctamente.');
    }
}
