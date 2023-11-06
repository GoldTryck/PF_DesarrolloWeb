<x-layouts.app title="FI | BLOG" meta-description="Descripción del FI Blog" header="FINSTAGRAM BLOG">
    @php
        $chunkedPosts = $posts->chunk(3); // Dividir la colección en grupos de 4
    @endphp

    @foreach ($chunkedPosts as $postGroup)
        <div class="card-group ">
            @foreach ($postGroup as $post)
                <div class="card bg-blanco">
                    <img src="{{ Storage::disk('public')->url($post->image) }}" class="card-img-top"
                        alt="Este post no tiene imagen">
                    <div class="card-body flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            <div class="btn-group" role="group">
                                @method('DELETE')
                                @auth
                                    @if (auth()->user()->name == $post->user->name)
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        <a class="btn btn-sm btn-dark" href="{{ route('posts.edit', $post) }}">Edit</a>
                                    @endif
                                @endauth
                                <a href="{{ route('posts.show', $post) }}" type="button"
                                    class="btn btn-sm btn-neon">Publicación</a>
                            </div>

                        </form>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Publicado el: {{ $post->updated_at->format('d.m.Y') }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    </div>
</x-layouts.app>
