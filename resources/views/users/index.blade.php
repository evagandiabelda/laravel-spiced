@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Usuarios</h1>

    <div class="bg-white p-4 rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="border-b">
                    <th class="px-4 py-2 text-left">Nombre Completo</th>
                    <th class="px-4 py-2 text-left">Nombre de Usuario</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $user->nombre_completo }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
                            <span class="mx-2">|</span>
                            <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 hover:text-yellow-700">Editar</a>
                            <span class="mx-2">|</span>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('users.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded">Crear nuevo usuario</a>
    </div>
@endsection
