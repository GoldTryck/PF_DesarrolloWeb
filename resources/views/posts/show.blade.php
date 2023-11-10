<x-layouts.app :title="$post->title" :meta-description="$post->body">
    @if ($post->image)
        <div class="clearfix bg-white">
            <img src="{{ Storage::disk('public')->url($post->image) }}" class="img-fluid col-span-4 float-right ms-3" alt="...">
            <h1 class="mt-5 mb-5 text-gray-500 font-bold text-center">{{ $post->title }}</h1>
            <p class="mt-5 mb-5 text-gray-500 font-bold text-center">{{ $post->body }}</p>
        </div>
    @endif
    <div class="container mx-auto my-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="col-span-1 md:col-span-1 md:col-start-2 flex items-center">
                <p class="mb-2 text-gray-500 font-bold text-center">👨🏼‍💻🤖 Autor: {{ $post->user->name }}</p>
            </div>
            <div class="col-span-1 md:col-span-1 md:col-start-2 flex items-center">
                <p class="mb-2 text-gray-500 font-bold text-center">📅 Creado el: {{ $post->created_at->format('d.m.Y') }}</p>
            </div>
            @if ($post->created_at != $post->updated_at)
                <div class="col-span-1 md:col-span-1 md:col-start-2 flex items-center">
                    <p class="mb-2 text-gray-500 font-bold text-center">⚙️ Actualizado el: {{ $post->updated_at->format('d.m.Y') }}</p>
                </div>
            @endif
            <div class="col-span-1 md:col-span-1 md:col-start-2 flex items-center">
                <p class="mb-2 text-gray-500 font-bold text-center">📚 Categoría: {{ $post->category->category }}</p>
            </div>
        </div>
    </div>
    @if ($post->comments->count() > 0)
        <div class="container-fluid my-4 bg-blue-200 py-3">
            <h3 class="mb-2 text-gray-500 font-bold text-center">-- Comentarios --</h3>
        </div>
        <div class="table-responsive">
            <table class="table-auto w-full table-bordered align-middle">
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
                            <p class="text-center text-gray-500 font-mono">Usuario</p>
                        </th>
                        <th scope="col">
                            <p class="text-center text-gray-500 font-mono">Fecha</p>
                        </th>
                        <th scope="col">
                            <p class="text-center text-gray-500 font-mono">Comentario</p>
                        </th>
                        <th scope="col">
                            <p class="text-center text-gray-500 font-mono">Acción</p>
                        </th>
                    </tr>
                </thead>
                @foreach ($post->comments as $comment)
                    <tbody>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <p class="mb-2 text-gray-500 font-bold text-center">{{ $comment->user->name }}</p>
                        </td>
                        <td>
                            <p class="mb-2 text-gray-500 font-bold text-center">{{ $comment->created_at->format('d.m.Y') }}</p>
                        </td>
                        <td>
                            <p class="mb-2 text-gray-500 font-bold text-center">{{ $comment->body }}</p>
                        </td>
                        <td class="align-middle">
                            @if (auth()->check() && auth()->user()->name == $comment->user->name)
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="text-center">
                                        <button class="mt-5 bg-red-400 hover:bg-red-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" type="button">Eliminar</button>
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
    <div class="container mx-auto">
        <div class="grid grid-cols-1">
            <a href="{{ route('posts.index') }}" class="mt-5 bg-indigo-400 hover:bg-indigo-600 transition-colors cursor-pointer uppercase font-bold w-auto p-3 text-white rounded-lg text-center" type="button">Regresar</a>
        </div>
    </div>
</x-layouts.app>
