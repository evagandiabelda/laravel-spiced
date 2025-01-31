@extends('layouts.app')

@section('title', 'Shares')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Shares</h1>

    <div class="bg-white p-4 rounded-lg shadow-md">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="border-b">
                    <th class="px-4 py-2 text-left">Título</th>
                    <th class="px-4 py-2 text-left">Fecha de Publicación</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shares as $share)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $share->titulo }}</td>
                        <td class="px-4 py-2">{{ $share->fecha_publicacion }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('shares.show', $share->id) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
                            <span class="mx-2">|</span>
                            <a href="{{ route('shares.edit', $share->id) }}" class="text-yellow-500 hover:text-yellow-700">Editar</a>
                            <span class="mx-2">|</span>
                            <form action="{{ route('shares.destroy', $share->id) }}" method="POST" style="display:inline;">
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
        <a href="{{ route('shares.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded">Crear nuevo share</a>
    </div>
@endsection
