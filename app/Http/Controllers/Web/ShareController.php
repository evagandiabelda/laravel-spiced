<?php

namespace App\Http\Controllers\Web;

use App\Models\Share;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Spice;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    // Mostrar todos los shares
    public function index(Request $request)
    {
        $query = Share::query();

        if ($request->has('q') && !empty($request->q)) {
            $query->where('titulo', 'LIKE', '%' . $request->q . '%') // Buscar per títol
                  ->orWhere('texto', 'LIKE', '%' . $request->q . '%'); // Buscar també pel contingut
        }
    
        $shares = $query->orderBy('fecha_modificacion', 'desc')->paginate(10);

        // Si el usuario está autenticado y es administrador, devolver la vista "index-admin"
        if (Auth::check() && Auth::user()->is_admin) {
            return view('index-admin', compact('shares'));
        }
    
        return view('index', compact('shares'));
    }

    // Mostrar el formulario para crear un nuevo share
    public function create()
    {
        $categorias = Categoria::all(); // Obtiene todas las categorías
        $spices = Spice::all(); // Obtiene todos los spices

        // PROTECCIÓN DE LA RUTA:
        // Si el usuario NO está autenticado, se redirige al Login.
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para crear un nuevo Share.');
        }
    
        return view('share.create', compact('categorias', 'spices'));
    }
    

    // Mostrar el formulario para editar un share
    public function edit($id)
    {
        $share = Share::findOrFail($id);

        $categorias = Categoria::all(); // Obtiene todas las categorías
        $spices = Spice::all(); // Obtiene todos los spices

        // PROTECCIÓN DE LA RUTA:
        // Si el usuario NO está autenticado, se redirige al Login.
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para crear un nuevo Share.');
        }

        return view('share.edit', compact('share', 'categorias', 'spices'));
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
            'img_principal' => 'nullable|string|max:255',
            'img_secundaria' => 'nullable|string|max:255',
            'categorias' => 'required|array',
            'categorias.*' => 'exists:categorias,id',
            'spices' => 'required|array',
            'spices.*' => 'exists:spices,id',
        ]);

        \Log::info('✅ Validación pasada correctamente.');
    
        // Crear el share con datos básicos
        $share = Share::create([
            'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'img_principal' => $request->img_principal,
            'img_secundaria' => $request->img_secundaria,
            'fecha_publicacion' => now(), // Asigna la fecha actual automáticamente
            'fecha_modificacion' => now(), // Asigna la fecha actual automáticamente
            'share_verificado' => false, // Por defecto, no verificado
        ]);
    
        // Asociar categorías y spices
        $share->categorias()->attach($request->categorias);
        $share->spices()->attach($request->spices);
    
        return redirect()->route('shares.show', $share->id)->with('success', 'Tu Share se ha publicado correctamente.');
    }
    

    // Mostrar un solo share
    public function show(string $id)
    {
        $share = Share::with('user')->findOrFail($id);
        return view('share.show', compact('share'));
    }

    // Actualizar un share
    public function update(Request $request, string $id)
    {
        $share = Share::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
            'img_principal' => 'nullable|string|max:255',
            'img_secundaria' => 'nullable|string|max:255',
            'categorias' => 'required|array',
            'categorias.*' => 'exists:categorias,id',
            'spices' => 'required|array',
            'spices.*' => 'exists:spices,id',
        ]);

        \Log::info('✅ Validación pasada correctamente.');

        // Actualizar el share:
        $share = Share::update([
            'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'img_principal' => $request->img_principal,
            'img_secundaria' => $request->img_secundaria,
            'fecha_modificacion' => now(), // Asigna la fecha actual automáticamente
            'share_verificado' => false, // Por defecto, no verificado
        ]);

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
