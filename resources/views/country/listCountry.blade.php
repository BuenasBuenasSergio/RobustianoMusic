@extends('layout.base')

@section('title', 'Listado Paises')
@section('encabezado', 'Listado Paises')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($countries as $country)
        <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3" >
            <a href=""><!--LLeva a los artistas del pais-->
            <div id="fondo">
                <img class="card-img " src="{{ asset($country->flag) }}" >
            </div>
            <div class="card-img-overlay">
                <div  class="texto">
                <h5 class="card-title">{{$country->name}}</h5>
                </div>
            </div>
            </a>
        </div>
    @endforeach
</div>
    <a href="{{route('countries.create')}}"><button>Crear Pais</button></a>
    <div class="row">

    </div>
</div> 

@endsection