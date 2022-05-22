@extends('layout.base')

@section('title', 'Artistas de ' . $country->name)
@section('encabezado', 'Artistas de ' . $country->name)

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($artists as $artist)
                <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3">
                    {{-- <a href="{{ route('artist.details', $artist->id) }}"> --}}
                    <div id="fondo">
                        <img class="card-img " src="{{ asset($artist->image) }}">
                    </div>
                    <div class="card-img-overlay">
                        <div class="texto">
                            <h5 class="card-title">{{ $artist->name }}</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
            @endforeach
        </div>
        {{ $artists->links() }}
    </div>

@endsection
