<x-layouts.app title="FI | HOME" meta-description="Descrición del Home" header="REGISTRAR NUEVO USUARIO">
    @section('titulo')
        Registrate en Finstagram
    @endsection

    <div class="md:flex md:justify-center md: gap-10 md: items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/registrar.jpg')}}" alt="img registro usuario" class="rounded-lg">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                @include('auth.register-form')
                <input type="submit" value="Crear cuenta"
                    class="bg-emerald-400 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />

            </form>

        </div>
</x-layouts.app>
