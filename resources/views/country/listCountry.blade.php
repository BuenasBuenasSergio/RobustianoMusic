@extends('layout.base')

@section('title', 'Listado Paises')
@section('encabezado', 'Listado Paises')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($countries as $country)
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ asset($country->flag) }}" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                        <div class="font-bold text-white  text-xl mb-2">{{ $country->name }}</div>
                    </div>
                </div>
                {{-- <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3">
                <a href="">
                    <!--LLeva a los artistas del pais-->
                    <div id="fondo">
                        <img class="card-img " src="{{ asset($country->flag) }}">
                    </div>
                    <div class="card-img-overlay">
                        <div class="texto">
                            <h5 class="card-title">{{ $country->name }}</h5>
                        </div>
                    </div>
                </a>
                </div> --}}
            @endforeach
        </div>
        <a href="{{ route('countries.create') }}">
            <button
                class="bg-green-500 hover:bg-green-600 text-white-300 font-semibold hover:text-white py-2 px-4 border-green-500 rounded">
                Crear Pais
            </button></a>
    </div>

@endsection
