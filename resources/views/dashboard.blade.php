<x-layouts.app title="FI | HOME" meta-description="Descripción del Home" header="FINSTAGRAM">
    
    @section('titulo')
        Perfil: {{ Auth::user()->name }}
    @endsection
    
    @section('contenido')
    <div class="flex  justify-left items-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img class="mx-auto" src="{{ asset('img/usuario.svg') }}" alt="Imagen de perfil del usuario">
            </div>
        </div>
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <a href="#" class="bg-emerald-400 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-full">Crear post</a>
            </div>
        </div>
    </div>
    
    
</x-layouts.app>
