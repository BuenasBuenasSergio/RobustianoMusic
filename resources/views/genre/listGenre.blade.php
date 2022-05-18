@extends('layout.base')

@section('title', 'Listado Generos')
@section('encabezado', 'Listado Generos')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="mb-3 xl:w-96">
                <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                    <input type="search"
                        class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Search" aria-label="Search" aria-describedby="button-addon3" id="busqueda">
                    <button
                        class="btn inline-block px-6 py-2 border-2 border-green-600 text-white font-medium text-xs leading-tight uppercase rounded hover:bg-green-700 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                        type="button" id="button-addon3" onclick="">Search</button>
                </div>
            </div>
        </div>
        {{-- @include('genre.results.genresResults') --}}
        <a href="{{ route('genres.create') }}">
            <div class="row" id="resultados">
                @foreach ($genres as $genre)
                    <div class="card  bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3">
                        <a href="">
                            <!--LLeva a los artistas del pais-->
                            <div id="fondo">
                                <img class="card-img " src="{{ asset($genre->image) }}">
                            </div>
                            <div class="card-img-overlay">
                                <div class="texto">
                                    <h5 class="card-title">{{ $genre->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
    </div>
    <button
        class="bg-green-500 hover:bg-green-600 text-white-300 font-semibold hover:text-white py-2 px-4 border-green-500 rounded">
        Crear Genero
    </button></a>

@endsection
