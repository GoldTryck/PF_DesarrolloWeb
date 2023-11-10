<x-layouts.app title="FI | HOME" meta-description="Descripción del Home" header="FINSTAGRAM">

    @section('titulo')
        Perfil: {{ Auth::user()->name }}
    @endsection

    @section('contenido')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <div class="flex  justify-left items-center">
            <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
                <div class="md:w-8/12 lg:w-6/12 px-5">
                    <img class="mx-auto" src="{{ asset('img/usuario.svg') }}" alt="Imagen de perfil del usuario">
                </div>
            </div>
            <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-2">
                <a href="{{ route('posts.create') }}"
                    class="bg-emerald-400 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-full text-center">
                    <i class="icon-create-post fas fa-plus"></i>  Crear un post</a>
                <a href="{{ route('posts.by_author')}}"
                    class="bg-emerald-400 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-full text-center">
                    <i class="icon-home fas fa-home"></i> Feed de Finstagram</a>
            </div>
        </div>
      

    </x-layouts.app>
