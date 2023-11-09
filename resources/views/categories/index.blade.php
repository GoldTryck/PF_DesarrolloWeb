<x-layouts.app title="FI | ADMIN" meta-description="Vista de gestion de categorias" header="FINSTAGRAM">

    <h1>Este es el index de categorias en esta vista ya estan disponibles todas las categorias registrados en la base de
        datos</h1>

    @foreach ($categories as $category)
        <p>Nombre categoria: {{ $category->category }}</p>
    @endforeach
</x-layouts.app>
