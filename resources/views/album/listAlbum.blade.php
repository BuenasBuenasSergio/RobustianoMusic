@extends('layout.base')

@section('title', 'Listado Albums')
@section('encabezado', 'Listado Albums')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($albums as $album)
        <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3" >
          <a href="{{route('album.details', $album->id)}}">
            <img class="card-img" src="{{asset($album->image)}}">
            <div class="card-img-overlay">
                <div  class="texto">
                    <h5 class="card-title">{{$album->title}}</h5>
                </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
</div> 

@endsection