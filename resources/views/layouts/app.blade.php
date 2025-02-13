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

<body class="font-roboto bg-[#ebe4e4] m-0 p-0">

    <header class="w-full flex flex-row justify-between items-center gap-10 bg-white px-10 py-4 shadow-md">

        <div class="flex flex-row items-center gap-10">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logo-spiced-pos.svg') }}" alt="logotipo" class="h-10">
            </a>

            <nav class="flex flex-row justify-end items-center gap-8 border-l-2 border-l-[#b0aaaa] pl-10">
                <a href="{{ url('/') }}" class="text-xl font-bold hover:opacity-50">Explorar</a>
                <a href="{{ route('shares.create') }}" class="text-xl font-bold hover:opacity-50">Compartir</a>
            </nav>
        </div>

        <form action="{{ route('shares.index') }}" method="GET" class="flex flex-1 gap-6 rounded-full py-2 px-6 bg-[#ebe4e4]">
            <input 
                type="search" 
                name="q" 
                class="flex flex-1 bg-transparent outline-none" 
                placeholder="Buscar Shares..." 
                value="{{ request('q') }}"
            >
            <button type="submit">
                <img src="{{ asset('search-icon.svg') }}" alt="icono buscador" class="h-5">
            </button>
        </form>

        <a href="{{ route('dashboard') }}" class="text-xl font-bold hover:opacity-50">
            <div class="h-11 rounded-full p-[3px] border-[3px] border-[#ff9486]">
                <img src="{{ Auth::user()->photo ? Auth::user()->photo : asset('icono-usuario-anonimo.svg') }}" alt="mi perfil" class="h-full">
            </div>
        </a>

    </header>

    <main class="w-full min-h-[100vh] flex flex-col items-center mx-auto pb-[100px]">
        @yield('content') <!-- Contingut específic de cada vista -->
    </main>

    <footer class="w-full -mt-4 -mb-5 mx-0 p-0 flex flex-col gap-0 bg-transparent">

        <div class='w-full min-h-[18px] flex flex-col justify-end items-center m-0 p-0 overflow-hidden'>
            <img src="{{ asset('wavy-footer.svg') }}" alt="Inicio del footer" class='m-0 p-0 translate-y-[1px] min-w-[1920px]' />
        </div>

        <div class="w-full flex flex-row justify-between items-center m-0 p-12 m-0 gap-2 bg-[#1b1b1b]">
            <img src="{{ asset('logo-spiced-neg.svg') }}" alt="logo spiced">
            <p class='text-[0.8rem] text-white/70'>ⓒ Spiced. Creado con ❤ por y para gente neurospicy.</p>
        </div>

</footer>

</body>
</html>
