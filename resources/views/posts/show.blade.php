<x-layouts.app :title="$post->title" :meta-description="$post->body">
    <div class="container mx-auto my-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="col-span-1 md:col-span-1">
                @if ($post->image)
                    <div class="clearfix bg-white">
                        <img src="{{ Storage::disk('public')->url($post->image) }}"
                            class="img-fluid float-right ms-3 rounded-lg" alt="...">
                    </div>
                @endif
            </div>
            <div class="col-span-1 md:col-span-1">
                <h1 class="text-gray-600 font-bold">{{ $post->title }}</h1>
                <p class="text-gray-500">{{ $post->body }}</p>
                <div class="col-span-1 md:col-span-1">
                    <div class="col-span-1 md:col-span-1 md:col-start-2 flex items-center">
                        <p class="text-gray-500 font-bold">👨🏼‍💻🤖 Autor: {{ $post->user->name }}</p>
                    </div>
                    <div class="col-span-1 md:col-span-1 md:col-start-2 flex items-center">
                        <p class="text-gray-500 font-bold">📅 Creado el: {{ $post->created_at->format('d.m.Y') }}</p>
                    </div>
                    @if ($post->created_at != $post->updated_at)
                        <div class="col-span-1 md:col-span-1 md:col-start-2 flex items-center">
                            <p class="text-gray-500 font-bold">⚙️ Actualizado el:
                                {{ $post->updated_at->format('d.m.Y') }}</p>
                        </div>
                    @endif
                    <div class="col-span-1 md:col-span-1 md:col-start-2 flex items-center">
                        <p class="text-gray-500 font-bold">📚 Categoría: {{ $post->category->category }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <div class="container mx-auto my-4">
        @if ($post->comments->count() > 0)
            <div class="container-fluid my-4 bg-emerald-200 py-3">
                <p class="font-bold text-center">COMENTARIOS</p>
            </div>
            <div class="max-w-screen-xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="text-center px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    #
                                </th>
                                <th scope="col" class="text-center px-6 py-3">
                                    USUARIO
                                </th>
                                <th scope="col" class="text-center px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    FECHA
                                </th>
                                <th scope="col" class="text-center px-6 py-3">
                                    COMENTARIO
                                </th>
                                <th scope="col" class="text-center px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    ACCION
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post->comments as $comment)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $comment->user->name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $comment->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $comment->body }}
                                    </td>
                                    @if (auth()->check() && auth()->user()->name == $comment->user->name)
                                        <td
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    class="bg-red-400 hover:bg-red-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                                                    type="submit">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 text-center">--</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    @auth
        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            @include('comments.comment_form')
        </form>
    @endauth
    <div class="container mx-auto">
        <div class="grid grid-cols-1">
            <a href="{{ route('posts.index') }}"
                class="bg-indigo-400 hover:bg-indigo-600 transition-colors cursor-pointer uppercase font-bold w-auto p-3 text-white rounded-lg text-center"
                type="button">
                <i class="icon-home fas fa-home"></i> Feed</a>
        </div>
    </div>
</x-layouts.app>
