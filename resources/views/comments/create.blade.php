<x-layouts.app title="Nuevo comentario" meta-description="Formulario para crear un comentario" header="HACER COMENTARIO">

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        @include('comments.comment_form')
        <button type="submit">Send</button>
    </form>
</x-layouts.app>
