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
            <a class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('home') }} ">Home</a>
            <a class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('about') }} ">About Us</a>
            <a class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('posts.index') }} ">Posts</a>
            @auth
                <div class="relative inline-block text-left">
                    <button
                        class="text-white bg-emerald-400 hover:bg-emerald-600 focus:ring-3 focus:outline-none focus:ring-emerald-800 font-bold uppercase rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        id="dropdown-button">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg hidden"
                        id="dropdown-content">
                        <div class="bg-white rounded-md py-1">
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Dashboard</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="block px-4 py-2 text-gray-800 hover:bg-blue-100"
                                    type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('dropdown-button').addEventListener('click', function() {
                        document.getElementById('dropdown-content').classList.toggle('hidden');
                    });
                </script>

            @endauth
            @guest
                <a class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('login') }} ">Log in</a>
                <a class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('register') }} ">Sing up</a>
            @endguest

        </nav>
    </div>
</header>
