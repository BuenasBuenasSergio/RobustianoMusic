@extends('layout.base')

@section('title', 'Detalles de' . $artist->name)
@section('encabezado', 'Detalles de ' . $artist->name)

@section('content')
    <div class="container">
        <div class="row" style="align-items: center;">
            <div class="card bg-black text-white">
                <img src="{{ asset($artist->image_banner) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="font-bold text-2xl mb-2 text-white">{{ $artist->name }}</h5>
                    <p class="card-text"><strong>Debut:</strong> {{ $artist->debutYear }}</p>
                    <p class="card-text"><strong>Generos:</strong><a href="{{ route('genres.details', $genre->id) }}">
                            {{ $genre->name }}</p></a>
                    <p class="card-text"><strong>Pais:</strong> {{ $country->name }}</p>
                    <p class="card-text"><strong>Biografia:</strong> {{ $artist->bio }}</p>
                    @if (Auth::user()->artist_id == $artist->id)
                        <p> <strong>Acciones:</strong>
                            <a href="{{ route('albums.create', $artist->id) }}"><button type="button"
                                    class="btn btn-success">Crear Album</button></a>
                            <a href=""><button type="button" class="btn btn-success">Modificar Artista</button></a>
                            <a href=""><button type="button" class="btn btn-danger">Eliminar Artista</button></a>
                        </p>
                    @endif

                    {{-- {% endif %} --}}
                </div>
            </div>
            {{-- <!-- <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3" >
        <img class="card-img" src="{{artist.get_image_url}}">
            <div class="card-img-overlay">
                <div class="texto">
                    <h5 class="card-title">{{artist.name}}</h5>
                    <h5 class="card-title">{{artist.debutYear}}</h5>
                    <h5 class="card-title">{{artist.country}}</h5>
                </div>
            </div>
      </div> --> --}}
        </div>
    </div>

    &nbsp;

    <div class="container">
        <table class="table table-hover table-dark artist_table" style="color: white;" style="width: 100%;">
            <thead>
                <th colspan="6" style="text-align: center;">Canciones Mas escuchadas</th>
                <tr>
                    <td>Titulo</td>
                    <td>Artista</td>
                    <td>Visitas</td>
                    <td></td>
                </tr>
            </thead>
            @foreach ($songs as $song)
            <tr>
                <td>{{$song->title}}</td>
                <td>{{$artist->name}}</td>
                <td>{{$song->views}}</td>
                <td><audio controls src="{{ asset($song->file) }}" class=""></audio></td>
              </tr>
            @endforeach
        
        </table>
    </div>

    &nbsp;

    <div class="container">
        <h2 class="text-white text-3xl font-bold"> Albumes</h1>
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

@endsection
