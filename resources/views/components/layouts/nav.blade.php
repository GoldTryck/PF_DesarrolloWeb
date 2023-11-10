<!--Agregar los siguientes botones en esta vista: ->
route('users.index')  -> dirige a la vista de la lista de Usuarios
route('categories.index') " -> dirige a la vista de Categorias
route('home')  -> dirige a la vista Principal
route('posts.by_category', ['category' => $category->id])  ->Dirige a la vista de los posts por categoria, debe llamarse dentro de un for each tal que:

foreach ($categories as $category)
route('posts.by_category', ['category' => $category->id])
Aqui crear una lista desplegable que tenga la etiqueta  $category->category
endforeach

route('posts.index')  ->Dirige a la vista de posts en el menu desplegable de categorias agregar.

el menu desplegable de posts quedaria así:
Posts:
-categoria1
-categoria2
-categoriaN
-Todas las categorias

route('about')  -> Dirige a la vista aboutUs

guest
        route('register')  ->Dirige a la vista de registro de usuarios, debe estar entre la directiva guest para que solo se muestre a usuarios que no se han logueado
else
    Auth::user()->name  ->Muestra el nombre del usuario logueado, solo si guest resulta falso
    route('posts.create')  -> Dirige a la vista de crear post, solo usuarios logueados pueden crear posts
    route('posts.by_author')  -> dirige a la vista de los post del usuario logueado, solo se muestra si el usuario se logueo.
    route('logout')  -> Termina la sesion del usuario actual, solo se muestra si el usuario se ha logueado. Debe hacerse un formulariio con el metodo POST y un token csrf
endguest

    route('posts.search')  -> esta ruta hace un filtrado de posts con las coincidencias, debe hacerse un formulariio con el metodo POST y un token csrf-->


<header class="p-5 border-d bg-white shadow">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">Finstagram</h1>
        <nav class="flex gap-3 items-center">

            @auth
                <label class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('login') }} ">
                    {{ Auth::user()->name }}</label> <!--Este deberia ser un dropdown-->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="font-bold uppercase text-emerald-400 text-sm" type="submit">Logout</button>
                </form>
            @endauth
            @guest
                <a class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('login') }} ">Log in</a>
                <a class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('register') }} ">Sing up</a>
            @endguest

        </nav>
    </div>
</header>
