@extends('layout.base')

@section('title', 'Nuevo Album de ' . $artist->name)
@section('encabezado', 'Nuevo Album de ' . $artist->name)

@section('novedades')

@endsection
@section('content')
    <div class="container">
        <div id="doc-header" class="doc-header text-center">
            <h1 class="doc-title">Nuevo Album</h1>
        </div>
        <!--//doc-header-->
        <div class="doc-body row justify-content-md-center">
            <div class="doc-content col-md-9 col-12 order-1">
                <div class="content-inner">
                    <section id="dashboards" class="doc-section">
                        <div class="section-block">
                            <form action="{{route('albums.save')}}" method="post" enctype="multipart/form-data" style="border: 1 solid grey;">
                                @csrf
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-sm-2 form-control-label text-white text-xl" for="title" >Titulo Album</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" id="title" class="form-control">
                                        <input type="number" name="artist" id="artist" class="form-control" style="display: none" value="{{$artist->id}}">
                                    </div>
                                </div>
                                {{-- <div class="form-group row justify-content-md-center">
                                    <label class="col-sm-2 form-control-label text-white text-xl">Artista</label>
                                    <div class="col-sm-10">
                                        <select name="artsits" id="artist"  class="form-control">
                                                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-sm-2 form-control-label text-white text-xl">Año de Salida</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="releaseYear" id="releaseYear"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label class="col-sm-2 form-control-label text-white text-xl">Imagen/Caratula</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" id="image"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <div class="col-sm-offset-6 ">
                                        <button type="submit" class="btn btn-success form-control" >Añadir nuevo Album</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--//section-block-->
                    </section>
                    <!--//doc-section-->
                </div>
                <!--//content-inner-->
            </div>
            <!--//doc-content-->
        </div>
        <!--//doc-body-->
    </div>
    <!--//container-->

@endsection
