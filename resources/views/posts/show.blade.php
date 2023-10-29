<x-layouts.app
    :title="$post->title"
    :meta-description="$post->body"
    header="OVERVIEW">
    <h1>{{ $post->title }}</h1>
    <h2>Autor: {{ $post->author }}</h2>
    <h3>Creado el: {{ $post->created_at }}</h3>
    @if ($post->created_at != $post->updated_at)
    <h3>Actualizado el: {{ $post->updated_at }}</h3>
    @endif
    <h2>{{ $post->body }}</h2>
    @if ($post->image)
        <img  width="400" src="{{Storage::disk('public')->url($post->image)}}" alt="Imagen de la publicación"><br>
    @endif
    
    <a href=" {{ route('posts.index')}}">Regresar</a>
</x-layouts.app>