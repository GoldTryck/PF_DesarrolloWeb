<x-layouts.app
    title="FI | HOME"
    meta-description="Descrición del Home"
    header="REGISTRAR NUEVO USUARIO">

    <form action="{{ route('register') }}" method="POST">
        @csrf
        @include('auth.register-form')
        <button type="submit">Register</button>
    </form>
    <a href="{{ route('home')}}">Regresar</a>
</x-layouts.app>