<x-layouts.app
    :title="$post->title"
    :meta-description="$post->body"
    header="EDITAR POST">

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf @method('PATCH')
        @include('posts.forms')
        <button type="submit">Send</button>
    </form>
    <a href=" {{ route('posts.index')}}">Regresar</a>
</x-layouts.app>