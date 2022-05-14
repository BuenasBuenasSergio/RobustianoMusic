@extends('layout.base')

@section('title', 'Nueva Cancion')
@section('encabezado', 'Nueva Cancion')

@section('novedades')

@endsection 
@section('content')
<div class="container">
    <div class="row text-white" >
        <form action="{{route('songs.save')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="artist">Artist</label>
                <input type="text" name="artist" class="form-control" id="artist" placeholder="Artist">
            </div>
            <div class="form-group">
                <label for="colartist">colartist</label>
                <input type="text" name="colartist" class="form-control" id="colartist" placeholder="colartist">
            </div>
            <div class="form-group">
                <label for="album">Album</label>
                <input type="text" name="album" class="form-control" id="album" placeholder="Album">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" name="genre" class="form-control" id="genre" placeholder="Genre">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" name="year" class="form-control" id="year" placeholder="Year">
            </div>
            <div class="form-group">
                <label for="file">file</label>
                <input type="file" name="file" class="form-control" id="file" placeholder="file">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection