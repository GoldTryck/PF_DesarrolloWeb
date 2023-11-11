<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'PF | DW' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}">
</head>

<body class="bg-gray-100">
    <x-layouts.nav />
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 white:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="mt-10 p-5 font-bold uppercase">{{ session('status') }}</span>
        </div>
    @endif
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')

        </h2>
        {{ $slot }} <!-- Equivalente a @yield('contenido')-->

    </main>
    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        Finstagram- Todos los derechos reservados
        {{ now()->year }}
    </footer>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
