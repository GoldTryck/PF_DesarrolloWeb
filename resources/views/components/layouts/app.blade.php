<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
        <title>{{ $title ?? 'PF -DW'}}</title>
        <meta name="description" content="{{ $metaDescription ?? 'Default meta description'}}">
    </head>
    <body>
        <x-layouts.nav />
        {{ $slot }}
    </body>
</html>