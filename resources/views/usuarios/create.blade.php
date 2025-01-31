@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Crear Nuevo Usuario</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre_completo" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                <input type="text" id="nombre_completo" name="nombre_completo" class="mt-1 block w-full p-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="nombre_usuario" class="block text-sm font-medium text-gray-700">Nombre de Usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" class="mt-1 block w-full p-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full p-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">Crear Usuario</button>
            </div>
        </form>
    </div>
@endsection
