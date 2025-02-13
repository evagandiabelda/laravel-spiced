@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')

    <!-- CABECERA -->

    <div class="w-xl py-16">

        <div class="w-full">
            <p class="font-bold">← Volver</p>
        </div>

        <div class="flex flex-row justify-between gap-8 px-16 pt-16">

            <div class="w-full flex flex-row items-center gap-4">
                <div class="rounded-full p-1 border-4 border-[#ff9486]">
                    <img src="{{ $user->photo }}" alt="foto de perfil" class="w-28 rounded-full">
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="text-2xl font-bold">{{ $user->nombre_completo }}</h1>
                    <p class="text-gray-500 italic">@ {{ $user->name }}</p>
                </div>
            </div>

            <div class="min-w-[200px] flex flex-row justify-end pt-6">
                <p class="text-[#63ad3c] font-bold text-right">Cacahuete sabio</p>
            </div>

        </div>

        <div class="max-w-4xl flex flex-col gap-8 pl-52 pr-16">
            <p>{{ $user->descripcion_perfil }}</p>
            <p class="text-[#63ad3c] italic">{{ $user->spices->pluck('nombre')->implode(', ') }}</p>
            <div class="flex flex-col items-end">
                <a href="#" class="pt-[4px] pb-[7px] px-8 rounded-full bg-[#1b1b1b] text-white hover:opacity-60 transition ease font-semibold">
                    <p  class="text-center">Seguir su contenido</p>
                </a>
            </div>
        </div>

    </div>

    <!-- SHARES -->

    <div class="max-w-7xl mx-auto flex flex-col items-center gap-16 p-16 border-t border-t-[#3d3d3d]">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($user->shares as $share)
                
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
                                <p class="text-gray-500 italic text-sm">Publicado el {{ $share->fecha_publicacion }}</p>
                            </div>

                        </div>

                    </a>
                </div>

            @endforeach
        </div>

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
