@extends('layouts.app')

@section('title', 'Nuevo Share')

@section('content')

    <div class="w-full flex flex-col items-center px-52">

        <!-- Cabecera -->
        <div class="w-full flex flex-col p-16 border-b border-b-[#b0aaaa]">
            <h1 class="text-4xl font-bold mb-6">Nuevo Share</h1>
            <p>¿Tienes algo maravilloso que compartir con la comunidad de Spiced? Adelante, utiliza este editor para crear un nuevo Share.</p>
        </div>

        <!-- Contenido -->
        <div class="w-full flex flex-col p-16">

            <form action="{{ route('shares.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-row justify-between gap-16">
            @csrf

                <!-- COLUMNA IZQUIERDA -->

                <div class="w-1/2 flex flex-col gap-8">

                    <!-- Categorías -->
                    <div>
                        <label for="categorias" class="block text-gray-700 font-semibold">Categorías</label>
                        <select id="categorias" name="categorias[]" multiple required 
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <p class="text-sm text-gray-500 mt-1">Mantén presionada la tecla "Ctrl" (Windows) o "Cmd" (Mac) para seleccionar varias.</p>
                    </div>

                    <!-- Spices -->
                    <div>
                        <label for="spices" class="block text-gray-700 font-semibold">Spices</label>
                        <select id="spices" name="spices[]" multiple required
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400">
                            @foreach($spices as $spice)
                                <option value="{{ $spice->id }}">{{ $spice->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Imagen Principal -->
                    <div>
                        <label for="img_principal" class="block text-gray-700 font-semibold">Imagen Principal</label>
                        <input type="text" id="img_principal" name="img_principal" placeholder="URL" required
                            class="w-full mt-2 p-2 border border-gray-300 rounded-lg">
                    </div>

                    <!-- Imagen Secundaria -->
                    <div>
                        <label for="img_secundaria" class="block text-gray-700 font-semibold">Imagen Secundaria (opcional)</label>
                        <input type="text" id="img_secundaria" name="img_secundaria" placeholder="URL"
                            class="w-full mt-2 p-2 border border-gray-300 rounded-lg">
                    </div>

                </div>

                <!-- COLUMNA DERECHA -->

                <div class="w-1/2 flex flex-col gap-8">

                    <!-- Título -->
                    <div>
                        <label for="titulo" class="block text-gray-700 font-semibold">Título</label>
                        <input type="text" id="titulo" name="titulo" required 
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400">
                    </div>

                    <!-- Contenido -->
                    <div>
                        <label for="texto" class="block text-gray-700 font-semibold">Contenido</label>
                        <textarea id="texto" name="texto" rows="13" required 
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400"></textarea>
                    </div>

                    <!-- Botón de enviar -->
                    <div class="w-full flex flex-row justify-end">
                        <button type="submit" 
                            class="w-fit bg-[#1b1b1b] text-[1.2rem] text-white py-2 px-6 rounded-full hover:opacity-80 transition font-semibold">
                            Publicar Share
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection