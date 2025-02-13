@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <div class="w-full mx-auto pt-12">
        <h1 class="text-2xl text-center font-bold mb-6">Editar mi información</h1>
    </div>

    <div class="w-1/2 mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('users.update', Auth::user()->id) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT') 

            <div class="mb-4">
                <label for="nombre_completo" class="block text-sm font-medium text-gray-700">Tu nombre</label>
                <input type="text" id="nombre_completo" name="nombre_completo" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('nombre_completo', $user->nombre_completo) }}" required>
            </div>

            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">URL de tu foto de perfil</label>
                <input type="text" id="photo" name="photo" class="mt-1 block w-full p-2 border rounded-md" value="{{ old('photo', $user->photo) }}">
            </div>

            <div class="mb-4">
                <label for="descripcion_perfil" class="block text-sm font-medium text-gray-700">Descripción de tu perfil</label>
                <textarea id="descripcion_perfil" name="descripcion_perfil" class="mt-1 block w-full p-2 border rounded-md">{{ old('descripcion_perfil', $user->descripcion_perfil) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Nueva contraseña (opcional)</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full p-2 border rounded-md">
            </div>

            <div class="w-full flex flex-row justify-end mb-4">
                <button type="submit" class="pt-[4px] pb-[7px] px-8 rounded-full bg-[#1b1b1b] text-white hover:opacity-60 transition ease font-semibold text-center">Guardar Cambios</button>
            </div>
        </form>
    </div>
@endsection
