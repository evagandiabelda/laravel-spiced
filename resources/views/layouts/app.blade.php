<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon">
</head>
<body class="bg-gray-100 font-roboto">

    <header class="bg-blue-500 text-white shadow-md">
        <nav class="max-w-7xl mx-auto p-4 flex justify-between items-center">
            <a href="{{ route('shares.index') }}" class="text-xl font-bold hover:text-gray-200">Shares</a>
            <a href="{{ route('usuarios.index') }}" class="text-xl font-bold hover:text-gray-200">Usuarios</a>
            <a href="{{ route('usuarios.show', 1) }}" class="text-xl font-bold hover:text-gray-200">Mi perfil</a>
        </nav>
    </header>

    <main class="max-w-7xl mx-auto p-6">
        @yield('content') <!-- Contingut específic de cada vista -->
    </main>

</body>
</html>
