<x-layouts.app title="FI | HOME" meta-description="Descrición del Home" header="FINSTAGRAM">

    <h1>Hola este es el index de usuarios en esta vista ya estan disponibles todos los usuarios registrados en la base
        de datos</h1>

    @foreach ($users as $user)
        <p>Nombre de usuario: {{ $user->name }}</p>
    @endforeach
</x-layouts.app>
