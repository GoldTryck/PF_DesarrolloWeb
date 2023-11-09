<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'PF | DW' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}">
</head>

<body>
    <x-layouts.nav />
    @if (session('status'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                aria-label="Warning:">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            <div>
                {{ session('status') }}
            </div>
        </div>
    @endif

    {{ $slot }}

    <footer class="footer mt-auto py-3 bg-azul">
        <div class="container d-lg-flex justify-content-between justify-content-lg-end">
            <span class="text-light">GameTunesTech Hub - All rights reserved 2023</span>
        </div>
    </footer>

</body>

</html>
