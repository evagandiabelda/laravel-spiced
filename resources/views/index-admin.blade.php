@extends('layouts.app')

@section('title', 'Spiced')

@section('content')

    <div class="max-w-7xl mx-auto flex flex-col items-center gap-12 py-12">

        @if(request('q'))
            <div class="flex flex-col items-center">
                <p class="text-center">
                    Resultados para: <strong>{{ request('q') }}</strong>
                </p>
            </div>
        @else
            <div class="flex flex-col items-center">
                <h1 class="text-4xl text-center font-bold mb-6">EXAMEN</h1>
                <p class="text-center">Feed del Admin</p>
            </div>
        @endif

        @if ($shares->isEmpty())
            <p class="text-gray-500 mt-4">No se encontraron resultados.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($shares as $share)
                    
                    <div class="flex flex-col items-start gap-4 bg-white p-5 rounded-xl shadow-md hover:scale-[1.01] transition ease">
                        <a href="{{ route('shares.show', $share->id) }}" class="w-full">

                            <img src="{{ $share->img_principal }}" alt="{{ $share->titulo }}" class="w-full h-[300px] object-cover rounded-md">

                            <div class="flex flex-col px-4">

                                <div class="w-full flex flex-row justify-between items-start gap-4 py-4 border-b border-b-[#b0aaaa]">
                                    <div class="w-1/2">
                                        <p class="font-bold text-[0.8rem] pt-1">{{ $share->categorias->pluck('nombre')->implode(', ') }}</p>
                                    </div>
                                    <div class="flex flex-row items-center gap-3">
                                        <p class="text-right text-[0.8rem]">@<span>{{ $share->user->name }}</span></p>
                                        <img src="{{ $share->user->photo }}" alt="avatar usuario" class="w-8 rounded-full">
                                    </div>
                                </div>

                                <div class="w-full flex flex-col gap-4 py-4">
                                    <h2 class="text-xl font-bold mb-2">{{ $share->titulo }}</h2>
                                    <p class="text-gray-700">{{ Str::limit($share->texto, 100) }}</p>
                                    <p class="text-gray-500 italic text-sm">Modificado el {{ $share->fecha_modificacion }}</p>
                                </div>

                            </div>

                        </a>
                    </div>

                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-6">
                {{ $shares->links() }}
            </div>
        @endif

        <div class="flex flex-col items center gap-8 mt-8 text-center">
            <p>¡Es tu turno! Comparte tus conocimientos con la comunidad de Spiced.</p>
            <div class="flex flex-col items-center">
                <a href="{{ route('shares.create') }}" class="pt-[4px] pb-[7px] px-8 rounded-full bg-[#1b1b1b] text-white hover:opacity-60 transition ease font-semibold">
                    <p  class="text-center">Crea un nuevo Share</p>
                </a>
            </div>
        </div>

    </div>

@endsection
