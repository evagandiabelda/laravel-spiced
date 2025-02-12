<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        return response()->json(User::all());
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

        $usuario = User::create($validatedData);

        return response()->json($usuario, 201);
    }

    // Mostrar un solo usuario
    public function show($id)
    {
        $usuario = User::find($id);
        
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

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

        return response()->json($usuario);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }
}
