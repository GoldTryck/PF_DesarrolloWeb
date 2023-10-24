<x-layouts.app
    title="FI | BLOG"
    meta-description="Descrición del FI Blog"
    header="FINSTAGRAM BLOG">
    @auth
        <a href="{{ route('posts.create') }}">Crear nuevo post</a>
    @endauth
    
    @foreach ($posts as $post)
        
        <div style="display: flex; align-items:baseline">
            <h2>
                <a href=" {{ route('posts.show', $post) }}">
                    {{ $post->title}}
                </a>
            </h2> &nbsp;
            @auth
            <a href="{{ route('posts.edit',$post)}}">Edit</a> &nbsp;
            <form action="{{ route('posts.destroy', $post)}}" method="POST">
                @csrf
                @method('DELETE')
                <BUtton type="submit">Delete</BUtton>
            </form>
            @endauth
        </div>   
        
        
    @endforeach
</x-layouts.app>
