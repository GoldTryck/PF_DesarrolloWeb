<x-layouts.app title="FI | BLOG" meta-description="Descripción del FI Blog" header="FINSTAGRAM BLOG">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    @php
        $chunkedPosts = $posts->chunk(3); // Dividir la colección en grupos de 3
    @endphp

    @foreach ($chunkedPosts as $postGroup)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($postGroup as $post)
                <div class="card bg-blanco">
                    <img src="{{ Storage::disk('public')->url($post->image) }}" class="card-img-top mt-5 rounded-lg" alt="Este post no tiene imagen">
                    <div class="card-body flex-col">
                        <h5 class="card-title mt-5 mb-5 block uppercase text-gray-500 font-bold">{{ $post->title }}</h5>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            <div class="btn-group" role="group">
                                @method('DELETE')
                                @auth
                                    @if (auth()->user()->name == $post->user->name)
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full">
                                            <i class="fas fa-trash"></i> Eliminar
                                            
                                        </button>

                                        <a class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-full" href="{{ route('posts.edit', $post) }}">
                                            <i class="fas fa-edit"></i> Editar</a>
                                    @endif
                                @endauth
                                <a class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full" href="{{ route('posts.show', $post) }}">
                                    <i class="fas fa-paper-plane"></i> Publicación</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted  text-gray-500 font-bold ">Publicado el : {{ $post->updated_at->format('d.m.Y') }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</x-layouts.app>
