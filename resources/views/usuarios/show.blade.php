@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Perfil de {{ $usuario->nombre_completo }}</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <p><strong>Nombre de Usuario:</strong> {{ $usuario->nombre_usuario }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Descripción:</strong> {{ $usuario->descripcion_perfil }}</p>

        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white px-4 py-2 rounded mt-4 inline-block">Editar Perfil</a>
    </div>
@endsection
