@extends('layout.base')

@section('title', 'Editar ' . $song->title)
@section('encabezado', 'Editar ' . $song->title)

@section('novedades')

@endsection 
@section('content')
<div class="container">
    <div class="row text-white" >
        <form action="{{route('songs.update',$song)}}" method="POST">
            @csrf

            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$song->title}}">
            </div>
            <div class="form-group">
                <label for="artist">Artist</label>
                <input type="text" name="artist" class="form-control" id="artist" placeholder="Artist" value="{{$song->album}}"">
            </div>
            <div class="form-group">
                <label for="colartist">colartist</label>
                <input type="text" name="colartist" class="form-control" id="colartist" placeholder="colartist" value="{{$song->collaboratorArtist}}">
            </div>
            <div class="form-group">
                <label for="album">Album</label>
                <input type="text" name="album" class="form-control" id="album" placeholder="Album" value="{{$song->album}}"> 
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" name="genre" class="form-control" id="genre" placeholder="Genre" value="{{$song->genre}}">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" name="year" class="form-control" id="year" placeholder="Year" value="{{$song->year}}">
            </div>
            <div class="form-group">
                <label for="file">file</label>
                <input type="file" name="file" class="form-control" id="file" placeholder="file" value="{{$song->file}}">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection