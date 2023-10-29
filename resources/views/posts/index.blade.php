<x-layouts.app
    title="FI | BLOG"
    meta-description="Descripción del FI Blog"
    header="FINSTAGRAM BLOG">
 
    @foreach ($posts as $post)
        
        <div style="display: flex; align-items: baseline">
            <h2>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </h2> &nbsp;
            @if (auth()->check() && auth()->user()->name == $post->author)
                <a href="{{ route('posts.edit', $post) }}">Edit</a> &nbsp;
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endif
        </div>
        
    @endforeach
</x-layouts.app>
