<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">FINSTAGRAM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Bolog
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('posts.by_category', ['category' => 'tecnology']) }}"> Tecnología</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('posts.by_category', ['category' => 'videogames']) }}">Video Juegos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('posts.by_category', ['category' => 'music']) }}">Música</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item"  href="{{ route('posts.index') }}">Todas las categorías</a></li>
            </ul>
        </li>


          <li class="nav-item">
            <a class="nav-link" href="{{ route('about')}}">About Us</a>  
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register')}}">Register</a>  
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login')}}">Login</a>  
          </li>
          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('posts.create') }}">Crear Nuevo Post</a></li>
                <li><a class="dropdown-item" href="{{ route('posts.by_author') }}">Mis Posts</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
        
        @endguest
        </ul>
        <form class="d-flex" role="search" action="{{ route('posts.search') }}" method="POST">
          @csrf
          <input class="form-control me-2" type="text" name="query" placeholder="titulo/autor/categoría" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      
      </div>
    </div>
  </nav>