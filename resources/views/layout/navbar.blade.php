<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index.home') }}">Robustiano Music</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('songs.list') }}">Canciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('artists.list') }}">Artistas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('albums.list') }}">Albums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('genres.list') }}">Generos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('countries.list') }}">Paises</a>
                </li>
            </ul>
            <form class="d-flex" action="{{route('index.home')}}" method="get">
                <input name='q' class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav">
                @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Acceder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Registrarse</a>
                    </li>
                @else
                    @if (Auth::user()->artist_id != null)
                        <li class="nav-item">
                            <a class="nav-link active"
                                href="{{ route('artist.details', Auth::user()->artist_id) }}">Perfil Artista </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('artists.create') }}">Registrar Artista</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('login') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
