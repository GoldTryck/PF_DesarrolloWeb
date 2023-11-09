<nav class="navbar navbar-expand-lg bg-aqua">
    <div class="container-fluid">
        <a class="navbar-brand white-text" href="{{ route('home') }}">GameTunesTech HUB</a>
        @auth
            @if (Auth::user()->role_id == 1)
                <!-- Prueba de roles si se tiene rol de admin se vera este link:-->
                <a href="{{ route('users.index') }}">Usuarios</a>
                <a href="{{ route('categories.index') }}">Categorias</a>
            @endif
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Bolog
                    </a>
                    <ul class="dropdown-menu">

                        @foreach ($categories as $category)
                            <li><a class="dropdown-item neon-text"
                                    href="{{ route('posts.by_category', ['category' => $category->id]) }}">
                                    {{ $category->category }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                        @endforeach
                        <li><a class="dropdown-item neon-text" href="{{ route('posts.index') }}">Todas las
                                categorías</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link white-color" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item neon-text" href="{{ route('posts.create') }}">Crear Nuevo Post</a>
                            </li>
                            <li><a class="dropdown-item neon-text" href="{{ route('posts.by_author') }}">Mis Posts</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item neon-text" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="disabled nav-link ">vista</a>
                    </li>
                @endguest
            </ul>
            <form class="d-flex" role="search" action="{{ route('posts.search') }}" method="POST">
                @csrf
                <input class="form-control me-2" type="text" name="query" placeholder="titulo/autor/categoría"
                    aria-label="Search">
                <button class="btn btn-outline-neon" type="submit">Buscar</button>
            </form>

        </div>
    </div>
</nav>
