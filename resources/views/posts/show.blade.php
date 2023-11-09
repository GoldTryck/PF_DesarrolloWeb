<x-layouts.app :title="$post->title" :meta-description="$post->body">
    @if ($post->image)
        <div class="clearfix bg-blanco">
            <img src="{{ Storage::disk('public')->url($post->image) }}" class=" img-fluid col-md-4 float-md-end ms-md-3"
                alt="...">
            <h1 class="text-center">{{ $post->title }}</h1>
            <p class="text-justify">{{ $post->body }}</p>
        </div>
    @endif
    <div class="container mb-4 mt-4">
        <div class="row">
            <div class="col align-items-center">
                <p class="text-center"> 👨🏼‍💻🤖 Autor: {{ $post->user->name }}</p>
            </div>
            <div class="col align-items-center">
                <p class="text-center">📅 Creado el: {{ $post->created_at->format('d.m.Y') }}</p>
            </div>
            @if ($post->created_at != $post->updated_at)
                <div class="col align-items-center">
                    <p class="text-center">⚙️ Actualizado el: {{ $post->updated_at->format('d.m.Y') }}</p>
                </div>
            @endif
            <div class="col align-items-center">
                <p class="text-center"> 📚 Categoría: {{ $post->category->category }}</p>
            </div>
        </div>
    </div>
    @if ($post->comments->count() > 0)
        <div class="container-fluid mb-4 bg-azul py-3">
            <h3 class="text-center neon-text">-- Comentarios --</h3>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered align-middle">
                <colgroup>
                    <col style="width: 5%">
                    <col style="width: 20%">
                    <col style="width: 10%">
                    <col style="width: 50%">
                    <col style="width: 15%">
                </colgroup>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
                            <p class="text-center">Usuario</p>
                        </th>
                        <th scope="col">
                            <p class="text-center">Fecha</p>
                        </th>
                        <th scope="col">
                            <p class="text-center">Comentario</p>
                        </th>
                        <th scope="col">
                            <p class="text-center">Acción</p>
                        </th>
                    </tr>
                </thead>
                @foreach ($post->comments as $comment)
                    <tbody>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <p class="text-center">{{ $comment->user->name }}</p>
                        </td>
                        <td>
                            <p class="text-center">{{ $comment->created_at->format('d.m.Y') }}</p>
                        </td>
                        <td>
                            <p class="text-justify">{{ $comment->body }}</p>
                        </td>
                        <td class="align-middle">
                            @if (auth()->check() && auth()->user()->name == $comment->user->name)
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark btn-sm text">Eliminar</button>
                                    </div>
                                </form>
                            @else
                                <p class="text-center">--</p>
                            @endif
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>

    @endif
    @auth
        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            @include('comments.comment_form')
        </form>
    @endauth
    <div class="container-fluid">
        <div class="row">
            <a href="{{ route('posts.index') }}" class="col btn btn-uva cian-text btn-lg">Regresar</a>
        </div>
    </div>

</x-layouts.app>
