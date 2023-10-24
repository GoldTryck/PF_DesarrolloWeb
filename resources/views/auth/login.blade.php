<x-layouts.app
    title="FI | HOME"
    meta-description="Descrición del Home"
    header="USUARIO LOGIN">

    <form action="{{ route('login') }}" method="POST">
        @csrf
        @include('auth.register-form')
        <input type="checkbox" name="remember">Recordarme&nbsp;
        <button type="submit">Login</button>
    </form>
    <a href="{{ route('home')}}">Regresar</a>
</x-layouts.app>