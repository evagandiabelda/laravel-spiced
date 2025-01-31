<?php

namespace App\Controllers\Api;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        return response()->json(Usuario::all());
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'nombre_usuario' => 'required|string|unique:usuarios,nombre_usuario|max:50',
            'email' => 'required|email|unique:usuarios,email|max:100',
            'password' => 'required|string|min:8',
            'foto' => 'nullable|string|max:255',
            'descripcion_perfil' => 'nullable|string',
            'perfil_privado' => 'nullable|boolean',
        ]);

        // En aquest cas s'especifica per raons de seguretat:
        $usuario = Usuario::create([
            'nombre_completo' => $request->input('nombre_completo'),
            'nombre_usuario' => $request->input('nombre_usuario'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'foto' => $request->input('foto'),
            'descripcion_perfil' => $request->input('descripcion_perfil'),
            'perfil_privado' => $request->input('perfil_privado'),
        ]);

        return response()->json($usuario, 201);
    }

    // Mostrar un solo usuario
    public function show($id)
    {
        $usuario = Usuario::find($id);
        
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'nombre_usuario' => 'required|string|unique:usuarios,nombre_usuario,' . $usuario->id . '|max:50',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id . '|max:100',
            'password' => 'nullable|string|min:8',
            'foto' => 'nullable|string|max:255',
            'descripcion_perfil' => 'nullable|string',
            'perfil_privado' => 'nullable|boolean',
        ]);        

        $usuario->update($request->only(['nombre', 'email', 'password']));

        return response()->json($usuario);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }
}
