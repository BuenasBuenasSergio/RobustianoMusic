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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body class="bg-black">
    <!-- Navbar -->
    @include('layout.navbar');
    {{-- Encabezado Pagina --}}
    <h1 class="text-3xl font-bold text-white">@yield('encabezado')</h1>
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
