@extends('layout.base')

@section('title',  $album->title)
@section('encabezado', $album->title)

@section('content')
&nbsp;
    
<div class="container">
  <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3 offset-4" >
      <img class="card-img" src="{{asset($album->image)}}">
      <div class="card-img-overlay">
      </div>
  </div>
  <table class="table table-hover table-dark album_table" style="color: white;" style="width: 100%; opacity: 0.3;">
    <thead>
      {{-- {% if user.is_staff%} --}}
      <th colspan="5">
            <p class="text-white">Acciones:
            <a href=""><button type="button" class="btn btn-success">Añadir Cancion</button>
            <a href=""><button type="button" class="btn btn-success">Modificar Album</button></a>
            <a href=""><button type="button" class="btn btn-danger">Eliminar Album</button></a>
      </th>
      {{-- {% endif %} --}}
      <tr>
        <td >Titulo</td>
        <td >Artista</td>
        <td >Colaborador</td>
        <td></td>
        {{-- {% if user.is_staff%} --}}
        <td>Modificar/Eliminar</td>
        {{-- {% endif %} --}}
      </tr>
    </thead>
      {{-- {% for song in song_list %}
        <tr>
          <td>{{song.title}}</td>
          <td>{{song.artist}}</td>
          <td>{{song.show_collab}}</td>
          <td><audio controls src="{{ song.get_song_url }}"></audio> </td>
          {% if user.is_staff%}
          <td>
              <a href="{% url 'modify_song' song.id %}"<i class="bi bi-pencil-square"></i>
              <a href="{% url 'delete_song' song.id %}"><i class="bi bi-trash-fill"></i>
          </td>
          {% endif %}
        </tr>
      {% endfor %} --}}
  </table>
  </p>
</div>

{{-- <!-- &nbsp;

<div class="container">
  <div class="row">
    {% for album in album_list %}
      {% if album.artist.id == artist.id %}
      <div class="card bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3" >
              <img class="card-img" src="{{album.get_image_url}}">
          <div class="card-img-overlay">
              <div  class="texto">
                  <h5 class="card-title">{{album.title}}</h5>
              </div>
          </div>
      </div>
      {% endif%}
      {% endfor %}
</div>
</div> -->
{% endblock %} --}}

@endsection
