@extends('layouts.app')

@section('title', 'Share')

@section('content')

    <div class="w-full flex flex-col items-center gap-16">

        <!-- Cabecera -->
        <div class="w-full max-h-[400px] flex flex-row overflow-hidden">
            <div class="w-1/2">
                <img src="{{ $share->img_principal }}" alt="imagen principal" class="cover w-full">
            </div>
            <div class="w-1/2 flex flex-col justify-center gap-4 bg-white/50 p-24">
                <div class="flex flex-row gap-3">
                    <img src="{{ asset('icono-spiced.svg') }}" alt="icono spiced" class="w-4">
                    <h3 class="font-bold">{{ $share->categorias->pluck('nombre')->implode(', ') }}</h3>
                </div>
                <h1 class="text-4xl font-bold mb-3">{{ $share->titulo }}</h1>
            </div>

        </div>

        <!-- Contenido -->
        <div class="w-1/2 flex flex-col gap-12">

            <div class="flex flex-col gap-8">
                <div class="flex flex-row justify-between items-center px-4 gap-4">
                    <p class="text-gray-500 text-sm">Publicado el {{ $share->fecha_publicacion }}</p>
                    <a href="{{ route('users.show', $share->user->name) }}">
                        <div class="flex flex-row justify-end items-center gap-3">
                            <p class="italic font-bold">@ {{ $share->user->name }}</p>
                            <img src="{{ $share->user->photo }}" alt="avatar usuario" class="w-14 rounded-full">
                        </div>
                    </a>
                </div>

                <div class="p-4 border-y border-y-[#605d5d]">
                    <p class="font-bold">
                        Spices: 
                        <span class="font-normal">{{ $share->spices->pluck('nombre')->implode(', ') }}</span>
                    </p>
                </div>
            </div>

            <div class="px-4">
                {!! nl2br(e($share->texto)) !!}
            </div>

            <div class="w-full flex flex-row justify-between items-center gap-4">
                <a href="{{ url('/') }}" class="w-fit pt-[4px] pb-[7px] px-8 mx-4 rounded-full border-2 border-[#1b1b1b] text-[#1b1b1b] hover:opacity-60 transition ease font-semibold">
                    <p  class="text-center">← Volver al Feed</p>
                </a>

                @if(Auth::check() && Auth::user()->id === $share->user_id)
                    <a href="{{ route('shares.edit', $share->id) }}" class="w-fit pt-[4px] pb-[7px] px-8 mx-4 rounded-full bg-[#1b1b1b] text-white hover:bg-[#ff9486] transition ease font-semibold">
                        <p  class="text-center">Editar</p>
                    </a>
                @endif

            </div>

        </div>

    </div>

@endsection