<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body class="bg-gray-100 font-roboto bg-[#ebe4e4]">

    <header class="w-full flex flex-row justify-between items-center bg-white px-10 py-4 shadow-md">

        <div class="flex flex-row items-center gap-10">
            <img src="{{ asset('logo-spiced-pos.svg') }}" alt="logotipo" class="h-10">

            <nav class="flex flex-row justify-end items-center gap-8 border-l-2 border-l-[#b0aaaa] pl-10">
                <a href="{{ url('/') }}" class="text-xl font-bold hover:opacity-50">Explorar</a>
                <a href="{{ route('usuarios.index') }}" class="text-xl font-bold hover:opacity-50">Otros usuarios</a>
            </nav>
        </div>

        <a href="{{ route('usuarios.show', 1) }}" class="text-xl font-bold hover:opacity-50">
            <div class="h-11 rounded-full p-[3px] border-[3px] border-[#ff9486]">
                <img src="{{ asset('icono-usuario-anonimo.svg') }}" alt="mi perfil" class="h-full">
            </div>
        </a>

    </header>

    <main class="max-w-7xl mx-auto p-12">
        @yield('content') <!-- Contingut específic de cada vista -->
    </main>

</body>
</html>
