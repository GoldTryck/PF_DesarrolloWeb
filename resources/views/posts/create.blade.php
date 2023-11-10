<x-layouts.app
    title="Nuevo post"
    meta-description="Formulario para la elaboracion de un nuevo post"
    header="CREAR NUEVO POST">

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('posts.forms')
        <button class= " mt-5 bg-emerald-400 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" type="submit">Send</button>
    </form>
</x-layouts.app>