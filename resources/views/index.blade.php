@extends('layouts.app')

@section('title', 'Spiced')

@section('content')

    <div class="w-full flex flex-col items-center gap-16">

        <div class="flex flex-col items-center">
            <h1 class="text-4xl text-center font-bold mb-6">¡Hola!</h1>
            <p class="text-center">Descubre, aprende y apasiónate por aquello que te hace especial.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($shares as $share)
                <div class="flex flex-col items-start bg-white p-6 rounded-lg shadow-md">
                    <img src="{{ $share->img_principal }}" alt="{{ $share->titulo }}" class="w-full h-48 object-cover rounded-md">
                    <h2 class="text-xl font-bold mb-2">{{ $share->titulo }}</h2>
                    <p class="text-gray-500 text-sm mb-4">Publicado el {{ $share->fecha_publicacion }}</p>
                    <div class="self-end flex flex-col justify-end">
                        <a href="{{ route('shares.show', $share->id) }}" class="pt-[4px] pb-[5px] px-8 rounded-full border-2 border-[#605d5d] hover:border-[#ff9486] text-[#605d5d] hover:text-[#ff9486] transition ease font-semibold">
                            <p  class="text-center">Leer</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            <a href="{{ route('shares.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded">Crear nuevo share</a>
        </div>

    </div>

@endsection
