@extends('layout.base')

@section('title', 'Nuevo Artista')
@section('encabezado', 'Nuevo Artista')

@section('content')
    <div class="container">
        <div class="row text-white">
            <div class="section-block">
                <form action="{{ route('artists.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row ">
                        <label class="col-sm-2 form-control-label" for="name">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-sm-2 form-control-label">Año de debut</label>
                        <div class="col-sm-6">
                            <input type="number" name="debutYear" id="debutYear" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-sm-2 form-control-label">Biografia</label>
                        <div class="col-sm-6">
                            <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label class="col-sm-2 form-control-label">Genero Musical</label>
                        <div class="col-sm-10">
                            <select name="genre_id" id="genre_id" class="form-control" multiple>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label class="col-sm-2 form-control-label">Pais de Origen</label>
                        <div class="col-sm-10">
                            <select name="country_id" id="country_id" class="form-control" >
                                <option value="" selected hidden>Selecciona Un Pais</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label class="col-sm-2 form-control-label">Imagen Portada</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label class="col-sm-2 form-control-label">Imagen banner</label>
                        <div class="col-sm-10">
                            <input type="file" name="banner" id="banner" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <div class="col-sm-offset-6 ">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white-300 font-semibold hover:text-white py-2 px-4 border-green-500 rounded">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--//section-block-->
        </div>
        <!--//section-row-->
    </div>

@endsection
