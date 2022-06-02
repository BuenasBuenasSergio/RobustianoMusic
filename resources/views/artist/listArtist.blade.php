@extends('layout.base')

@if ($busqueda != '')
    @section('title', 'Listado Artista que contienen ' . $busqueda)
    @section('encabezado', 'Listado Artista que contienen ' . $busqueda)
@else
@section('title', 'Listado Artistas')
@section('encabezado', 'Listado Artistas')
@endif
@section('content')
    <div class="container">
        <form action="{{ route('artist.search') }}" method="get">
            <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                        <input type="text"
                            class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Search" aria-label="Search" aria-describedby="button-addon3" id="q" name="q">
                        <button
                            class="btn inline-block px-6 py-2 border-2 border-green-600 text-white font-medium text-xs leading-tight uppercase rounded hover:bg-green-700 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                            type="submit" id="button-addon3">Busqueda</button>
                    </div>
                </div>
            </div>
        </form>
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
        <center>
            {{ $artists->links( 'pagination::bootstrap-4') }}
        </center>
       
    </div>

@endsection
