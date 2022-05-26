@extends('layout.base')

@section('title', 'PAGINA PRINCIPAL')
@section('encabezado', 'PAGINA PRINCIPAL')

@section('novedades')

@endsection
@section('content')
    <h2 class="text-white text-2xl font-bold">Ultimas Canciones</h2>
    <div class="container">
        <div class="row">
            @foreach ($songs as $song)
            <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3">
                <div id="fondo">
                    <img class="card-img portadas" src="{{asset($song->caratula)}}">
                </div>
                <div class="card-img-overlay">
                    <div class="texto">
                        <h5 class="card-title">{{$song->title}}</h5>
                        <a href="">
                            <p class="card-text">{{$song->name}}</p>
                        </a>
                        <p class="card-text text-center "><audio controls src="{{ asset($song->file) }}" class=""></audio>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <h2 class="text-white text-2xl font-bold">Ultimos albums</h2>
    <div class="container">
        <div class="row">
            @foreach ($albums as $album)
                <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('album.details', $album->id) }}">
                        <img class="card-img" src="{{ asset($album->image) }}">
                        <div class="card-img-overlay">
                            <div class="texto">
                                <h5 class="card-title">{{ $album->title }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <h2 class="text-white text-2xl font-bold">Ultimos artistas</h2>
    <div class="container">
        <div class="row">
            @foreach ($artists as $artist)
                <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('artist.details', $artist->id) }}">
                        <div id="fondo">
                            <img class="card-img " src="{{ asset($artist->image) }}">
                        </div>
                        <div class="card-img-overlay">
                            <div class="texto">
                                <h5 class="card-title">{{ $artist->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
