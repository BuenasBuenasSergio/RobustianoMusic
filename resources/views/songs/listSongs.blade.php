@extends('layout.base')

@section('title', 'Listado Canciones')
@section('encabezado', 'Listado Canciones')

@section('content')
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

@endsection