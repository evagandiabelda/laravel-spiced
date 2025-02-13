<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        return view('users.create');
    }

    // Mostrar el formulario para editar un usuario
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'name' => 'required|string|unique:users,name|max:50',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|string|min:8',
            'photo' => 'nullable|string|max:255',
            'descripcion_perfil' => 'nullable|string',
            'perfil_privado' => 'nullable|boolean',
        ]);

        // Abans de crear l'usuari, s'encripta la password:
        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        return redirect()->route('users.show', $user->id)->with('success', '¡Bienvenid@ a Spiced!');
    }

    // Mostrar un solo usuario
    public function show($name)
    {
        $user = User::where('name', $name)->firstOrFail();
        return view('users.show', compact('user'));
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:100',
            'name' => 'required|string|unique:users,name,' . $user->id . '|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:100',
            'password' => 'nullable|string|min:8',
            'photo' => 'nullable|string|max:255',
            'descripcion_perfil' => 'nullable|string',
            'perfil_privado' => 'nullable|boolean',
        ]);        

        // Si se proporciona una nueva contraseña, encriptarla:
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']); // Evita sobrescribir con un valor vacío
        }

        $user->update($validatedData);

        return redirect()->route('users.show', $user->id)->with('success', 'Cambios guardados.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
