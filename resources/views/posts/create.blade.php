<x-layouts.app
    title="Nuevo post"
    meta-description="Formulario para la elaboracion de un nuevo post"
    header="CREAR NUEVO POST">

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('posts.forms')
        <button type="submit">Send</button>
    </form>
</x-layouts.app>