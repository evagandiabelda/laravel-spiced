<?php

namespace App\Http\Controllers\Web;

use App\Models\Share;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Spice;

class ShareController extends Controller
{
    // Mostrar todos los shares
    public function index()
    {
        $shares = Share::with(['usuario', 'categorias', 'spices'])->inRandomOrder()->get();
        return view('index', compact('shares'));
    }

    // Mostrar el formulario para crear un nuevo share
    public function create()
    {

        \Log::info('🚀 Entrando en el método create() de ShareController');

        $categorias = Categoria::all(); // Obtiene todas las categorías
        $spices = Spice::all(); // Obtiene todos los spices

        \Log::info('📌 Categorías obtenidas:', ['categorias' => $categorias]);
        \Log::info('📌 Spices obtenidos:', ['spices' => $spices]);
    
        return view('share.create', compact('categorias', 'spices'));
    }
    

    // Mostrar el formulario para editar un share
    public function edit($id)
    {
        $share = Share::findOrFail($id);
        return view('share.edit', compact('share'));
    }
    
    public function store(Request $request)
    {

        \Log::info('🚀 Entrando en store() con los siguientes datos:', $request->all());

/*         $request->validate([
            'usuario_id' => 'required|exists:users,id', // De momento, validamos el usuario manualmente
            'texto' => 'required|string',
            'img_principal' => 'nullable|string|max:255',
            'img_secundaria' => 'nullable|string|max:255',
            'categorias' => 'required|array',
            'categorias.*' => 'exists:categorias,id',
            'spices' => 'required|array',
            'spices.*' => 'exists:spices,id',
        ]);

        \Log::info('✅ Validación pasada correctamente.'); */
    
        // Crear el share con datos básicos
        $share = Share::create([
            'usuario_id' => 1, // De momento, lo ponemos manualmente
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'img_principal' => $request->img_principal,
            'img_secundaria' => $request->img_secundaria,
            'fecha_publicacion' => now(), // Asigna la fecha actual automáticamente
            'share_verificado' => false, // Por defecto, no verificado
        ]);

        \Log::info('📌 Share creado con ID:', ['id' => $share->id]);
    
        // Asociar categorías y spices
        $share->categorias()->attach($request->categorias);
        $share->spices()->attach($request->spices);

        \Log::info('✅ Categorías y Spices asociados correctamente.');
    
        return redirect()->route('shares.show', $share->id)->with('success', 'Tu Share se ha publicado correctamente.');
    }
    

    // Mostrar un solo share
    public function show(string $id)
    {
        $share = Share::with('usuario')->findOrFail($id);
        return view('share.show', compact('share'));
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
