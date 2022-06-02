@extends('layout.base')

@section('title', 'Nuevas Canciones para Album' . $album->title  ) 
@section('encabezado', 'Nuevas Canciones para Album' . $album->title )

@section('novedades')

@endsection
@section('content')
    <div class="container">
        <div class="row text-white">
            <form action="{{ route('songs.save') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ARTISTA --}}
                <input type="number" name="artist" class="form-control" id="artist" value="{{ $artist->id }}"
                    style="display: none">
                {{-- ALBUM --}}
                <input type="number" name="album" class="form-control" id="album" value="{{ $album->id }}"
                    style="display: none">
                <input type="number" name="year" class="form-control" id="year" value="{{ $album->release_year }}"
                    style="display: none">

                <input type="text" name="caratula" class="form-control" id="caratula" value="{{ $album->image }}"
                    style="display: none">
                <div class="form-group">
                    <div class="form-row col-8">
                        <label for="file">Canciones</label>
                        <input type="file" name="canciones[]" class="form-control" id="canciones" placeholder="canciones"
                            multiple>
                    </div>
                    <div class="form-row col-4">
                        <p class="text-xl text-white">Subir archivos con el nombre de la cancion</p>
                    </div>

                </div>
                <div class="form-group">
                    <div class="form-row col-8">
                        <button type="submit" class="btn btn-success form-control">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
