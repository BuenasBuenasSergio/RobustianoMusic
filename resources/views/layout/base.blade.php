<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link rel="shortcut icon" href="media/favicon/favicon.png">
    {{-- Styles / Personal --}}
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    {{-- Styles /Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>
<body class="bg-black">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Robustiano Music</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('songs.list')}}">Canciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('artists.list')}}">Artistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('albums.list')}}">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('genres.list')}}">Generos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('countries.list')}}">Paises</a>
                    </li>
                </ul>
                <form class="d-flex" action="" method="get">
                    <input name='q' class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Sign in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     {{--Encabezado Pagina  --}}
    <h1 class="text-white">@yield('encabezado')</h1>
     {{-- Novedades --}}
    @yield('novedades')
    <!-- CONTENT -->
        @yield('content')
    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <span class="text-muted">&copy; 2022 Robustiano Music</span>
        </div>
    </footer>
</body>
{{-- scrips --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</html>