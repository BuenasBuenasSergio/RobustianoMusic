@extends('layout.base')

@section('title', 'Nueva Cancion')
@section('encabezado', 'Nueva Cancion')

@section('novedades')

@endsection 
@section('content')
<div class="container">
    <div class="row text-white" >
        <form action="{{route('countries.save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nombre Pais</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="image">Bandera</label>
                <input type="file" name="image[]" class="form-control" id="image" placeholder="file" multiple>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
