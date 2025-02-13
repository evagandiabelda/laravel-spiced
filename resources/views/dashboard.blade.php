@extends('layouts.app')

@section('title', 'Espacio personal')

@section('content')
        
    <!-- CABECERA -->

    <div class="w-2/3 flex flex-col items-center py-12 border-b border-b-[#b0aaaa]">
                
        <h1 class="text-4xl font-bold">Tu espacio personal</h1>

        <div class="w-full flex flex-row justify-between gap-8 px-16 pt-16">

            <div class="w-full flex flex-row items-center gap-8">
                <div class="w-32 rounded-full p-1 border-4 border-[#ff9486]">
                    <img src="{{ Auth::user()->photo }}" alt="foto de perfil" class="w-28 rounded-full">
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="text-2xl font-bold">{{ Auth::user()->nombre_completo }}</h2>
                    <p class="text-gray-500 italic">@ {{ Auth::user()->name }}</p>
                </div>
            </div>

            <div class="w-full flex flex-col items-end gap-4 pt-6">
                <p class="text-[#63ad3c] font-bold text-right">Cacahuete sabio</p>
                <!-- Mensaje de éxito tras la redirección desde el formulario Update -->
                @if (session('success'))
                    <div class="bg-[#63ad3c] text-white px-3 py-2 rounded-lg mb-4">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

        </div>

        <div class="w-2/3 flex flex-col gap-8 pl-14">
            <p>{{ Auth::user()->descripcion_perfil }}</p>
            <p class="text-[#63ad3c] italic"><strong>Mis spices: </strong>{{ Auth::user()->spices->pluck('nombre')->implode(', ') }}</p>
            <div class="w-full flex flex-row justify-end gap-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="pt-[4px] pb-[7px] px-8 rounded-full border-2 border-[#1b1b1b] hover:opacity-60 transition ease font-semibold">
                        Cerrar sesión
                    </button>
                </form>
                <a href="{{ route('users.edit', Auth::user()->id) }}" class="pt-[4px] pb-[7px] px-8 rounded-full bg-[#1b1b1b] text-white hover:opacity-60 transition ease font-semibold">
                    <p  class="text-center">Editar perfil</p>
                </a>
            </div>
        </div>

    </div>

    <!-- SHARES -->

    <div class="w-2/3 flex flex-col items-start px-16 pt-12">
        <a href="{{ route('shares.create') }}" class="pt-[4px] pb-[7px] px-8 rounded-full bg-[#1b1b1b] text-white hover:opacity-60 transition ease font-semibold">
            <p  class="text-center">Nuevo share</p>
        </a>
    </div>

    <div class="w-2/3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-16 py-12">
        @if(Auth::user()->shares->isNotEmpty())
                @foreach(Auth::user()->shares as $share)
                    
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
                                    <p class="text-gray-500 italic text-sm">Publicado el {{ $share->fecha_publicacion }}</p>
                                </div>

                            </div>

                        </a>
                    </div>

                @endforeach
            </div>
        @else
            <p class="text-gray-500">Todavía no has publicado ningún share.</p>
        @endif

@endsection
