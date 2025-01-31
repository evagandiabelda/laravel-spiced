<?php

namespace App\Http\Controllers\Web;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Mostrar el formulario para editar un usuario
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'nombre_usuario' => 'required|string|unique:usuarios,nombre_usuario|max:50',
            'email' => 'required|email|unique:usuarios,email|max:100',
            'password' => 'required|string|min:8',
            'foto' => 'nullable|string|max:255',
            'descripcion_perfil' => 'nullable|string',
            'perfil_privado' => 'nullable|boolean',
        ]);

        // Abans de crear l'usuari, s'encripta la password:
        $validatedData['password'] = bcrypt($validatedData['password']);

        $usuario = Usuario::create($validatedData);

        return redirect()->route('usuarios.show', $usuario->id)->with('success', '¡Bienvenid@ a Spiced!');
    }

    // Mostrar un solo usuario
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'nombre_usuario' => 'required|string|unique:usuarios,nombre_usuario,' . $usuario->id . '|max:50',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id . '|max:100',
            'password' => 'nullable|string|min:8',
            'foto' => 'nullable|string|max:255',
            'descripcion_perfil' => 'nullable|string',
            'perfil_privado' => 'nullable|boolean',
        ]);        

        // Si se proporciona una nueva contraseña, encriptarla:
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']); // Evita sobrescribir con un valor vacío
        }

        $usuario->update($validatedData);

        return redirect()->route('usuarios.show', $usuario->id)->with('success', 'Cambios guardados.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
