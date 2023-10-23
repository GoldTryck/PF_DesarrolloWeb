<x-layouts.app
    title="FI | BLOG"
    meta-description="Descrición del FI Blog">

    <h1>FINSTAGRAM BLOG</h1>
    @foreach ($posts as $post)
        <h2>
            <a href="/blog/{{ $post->id }}">{{ $post->title }}</a>
        </h2>
    @endforeach
</x-layouts.app>
