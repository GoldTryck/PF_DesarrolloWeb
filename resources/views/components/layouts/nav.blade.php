<!--Agregar los siguientes botones en esta vista: ->
route('users.index')  -> dirige a la vista de la lista de Usuarios
route('categories.index') " -> dirige a la vista de Categorias-->

<header class="p-5 border-d bg-white shadow">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">Finstagram</h1>
        <nav class="flex gap-3 items-center">
            <a class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('home') }} ">Home</a>
            <a class="font-bold uppercase text-emerald-400 text-sm" href=" {{ route('about') }} ">About Us</a>
            <div class="relative inline-block text-left">
                <button
                    class=" text-white bg-emerald-400 hover:bg-emerald-600 focus:ring-3 focus:outline-none focus:ring-emerald-800 font-bold uppercase rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    id="posts-button" type="button">Posts<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div id="posts-content" class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg hidden">
                    <div class="bg-white rounded-md py-1">
                        @foreach ($categories as $category)
                            <a class="block px-4 py-2 text-emerald-800 hover:bg-emerald-100"
                                href="{{ route('posts.by_category', ['category' => $category->id]) }}">{{ $category->category }}</a>
                        @endforeach
                        <a class="block px-4 py-2 text-emerald-800 hover:bg-emerald-100"
                            href="{{ route('posts.index') }}">
                            Todas las categorías</a>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('posts-button').addEventListener('click', function() {
                    document.getElementById('posts-content').classList.toggle('hidden');
                });
            </script>


            @auth
                <div class="relative inline-block text-left">
                    <button
                        class="text-white bg-emerald-400 hover:bg-emerald-600 focus:ring-3 focus:outline-none focus:ring-emerald-800 font-bold uppercase rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        id="user-button">
                        {{ Auth::user()->name }}
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div class="origin-top-right absolute right-0 mt-2 w-32 rounded-md shadow-lg hidden" id="user-content">
                        <div class="bg-white rounded-md py-1">
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-emerald-800 hover:bg-emerald-100">Dashboard</a>
                            <hr>
                            @if (Auth::user()->role_id == 1)
                                <a href="{{ route('categories.index') }}"
                                    class="block px-4 py-2 text-emerald-800 hover:bg-emerald-100">Manage categories</a>
                                <hr>
                                <a href="{{ route('users.index') }}"
                                    class="block px-4 py-2 text-emerald-800 hover:bg-emerald-100">Manage users</a>
                            @endif
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="block px-4 py-2 text-emerald-800 hover:bg-emerald-100"
                                    type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('user-button').addEventListener('click', function() {
                        document.getElementById('user-content').classList.toggle('hidden');
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
