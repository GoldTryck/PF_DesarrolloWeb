<x-layouts.app :title="$post->title" :meta-description="$post->body" header="EDITAR POST">

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PATCH')
        @include('posts.forms')
        <button
            class= " mt-5 bg-emerald-400 hover:bg-emerald-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            type="submit">
            <i class="fas fa-paper-plane"></i> Send</button>
    </form>
    <a type="button"
        class= " text-center mt-5 bg-indigo-400 hover:bg-indigo-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
        href=" {{ route('posts.index') }}">Regresar</a>
</x-layouts.app>
