@extends('layout.base')

@section('title', 'Nuevo Genero Musical')
@section('encabezado', 'Nuevo Genero Musical')

@section('novedades')

@endsection 
@section('content')
<div class="container">
    <div class="row text-white" >
        <form action="{{route('genres.save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Genero</label>
                <input type="file" name="genero[]" class="form-control" id="genero" placeholder="Seleciona Archivo" multiple>
            </div>
            <div class="form-group">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white-300 font-semibold hover:text-white py-2 px-4 border-green-500 rounded">Enviar</button>
            </div>
        </form>
    </div>
</div>

@endsection