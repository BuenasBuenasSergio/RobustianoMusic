@extends('layout.base')

@section('title', 'PAGINA PRINCIPAL')
@section('encabezado', 'PAGINA PRINCIPAL')

@section('novedades')

@endsection 
@section('content')
<h2 class="text-white text-2xl font-bold">Ultimas Canciones</h2>
<div class="container">
    <div class="row">

    </div>
</div>

<h2 class="text-white text-2xl font-bold">Ultimos albums</h2>
<div class="container">
    <div class="row">
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
<ul>
@foreach ($songs as $song)
    {{-- <li class="text-white"> {{$song->title}}</li> --}}
    <li class="text-white"><a href="{{route('songs.edit', $song)}}"> {{$song->title}}</a></a></li>
@endforeach
</ul>

{{$songs->links()}}
@endsection