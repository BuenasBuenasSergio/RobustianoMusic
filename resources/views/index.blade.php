@extends('layout.base')

@section('title', 'PAGINA PRINCIPAL')
@section('encabezado', 'PAGINA PRINCIPAL')

@section('novedades')

@endsection 
@section('content')
<h2 style="color: white;">Ultimas Canciones</h2>
<div class="container">
    <div class="row">

    </div>
</div>

<h2 style="color: white;">Ultimos albums</h2>
<div class="container">
    <div class="row">
    </div>
</div>

<h2 style="color: white;">Ultimos artistas</h2>
<div class="container">
    <div class="row">
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