@extends('layout.base')

@section('title', 'Nuevo País')
@section('encabezado', 'Nuevo País')

@section('novedades')

@endsection 
@section('content')
<div class="container">
    <div class="row text-white" >
        <form action="{{route('countries.save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Bandera</label>
                <input type="file" name="image[]" class="form-control" id="image" placeholder="file" multiple>
            </div>
            <div class="form-group">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white-300 font-semibold hover:text-white py-2 px-4 border-green-500 rounded">Enviar</button>
            </div>
        </form>
    </div>
</div>

@endsection
