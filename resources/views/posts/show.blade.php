<x-layouts.app :title="$post->title" :meta-description="$post->body" header="OVERVIEW">
    <h1>{{ $post->title }}</h1>
    <h2>Autor: {{ $post->user->name }}</h2>
    <h3>Creado el: {{ $post->created_at }}</h3>
    @if ($post->created_at != $post->updated_at)
        <h3>Actualizado el: {{ $post->updated_at }}</h3>
    @endif
    <h2>{{ $post->body }}</h2>
    @if ($post->image)
        <img width="400" src="{{ Storage::disk('public')->url($post->image) }}" alt="Imagen de la publicación"><br>
    @endif
    @if ($post->comments->count() > 0)
        <h2>Comentarios</h2>
        <ul>
            @foreach ($post->comments as $comment)
                <li>
                    <strong>{{ $comment->user->name }}:</strong>
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        @include('comments.comment_form')
        <button type="submit">Send</button>
    </form>
    <a href=" {{ route('posts.index') }}">Regresar</a>
</x-layouts.app>
