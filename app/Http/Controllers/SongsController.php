<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SongsController extends Controller
{
    public function songList()
    {
        $busqueda = '';
        if (Auth::check()) {
            $songs = Song::join('artists', 'songs.artist_id', '=', 'artists.id')
                ->select('*')
                ->orderBy('songs.title', 'asc')
                ->paginate(8);

            return view('songs.listSongs', compact('songs', 'busqueda'));
        } else {
            return redirect('/login');
        }
    }

    public function create($artista, $album)
    {
        if (Auth::check()) {
            $artist = Artist::find($artista);
            $album = Album::find($album);
            return view('songs.newSong', compact('artist', 'album'));
        } else {
            return redirect('/login');
        }
    }

    public function save(Request $request)
    {

        $artista = Artist::find($request->artist);
        $album = Album::find($request->album);

        foreach ($request->file('canciones') as  $canciones) {
            //falta hacer el link 
            $song = new Song(); //declaracion de Pais

            $ogName = $canciones->getClientOriginalName(); //nombre original
            $busqueda = '.';
            $pos = strpos($ogName, $busqueda);
            $name = substr($ogName, 0, $pos);
            $song->title = $name; //recogida del nombre del archivo
            $song->artist_id = $request->artist;
            $song->album_id = $request->album;
            $song->caratula = $request->caratula;
            $song->year = $request->year;
            $song->views = 0;
            //upload canciones
            Storage::disk('public')->put('/songs/' . $artista->name . '/' . $album->title . '/' . $canciones->getClientOriginalName(), file_get_contents($canciones)); //guardado del archivo
            //ruta del archivo
            $song->file = 'storage/songs/' . $artista->name . '/' . $album->title . '/' . $canciones->getClientOriginalName(); //guardar la ruta de la cancionesn
            $song->save(); //guardar el pais
        }

        return redirect()->route('album.details', $album->id);
    }

    public function update(Song $song, Request $request)
    {
        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->collaboratorArtist = $request->colartist;
        $song->album = $request->album;
        $song->genre = $request->genre;
        $song->year = $request->year;
        $song->file = $request->file;

        $song->save();
        return redirect()->route('songs.list');
        // return $request->all();;  
    }

    public function songSearch(Request $request)
    {
        $busqueda = $request->input('q');
        if (Auth::check()) {
            $songs = Song::join('artists', 'songs.artist_id', '=', 'artists.id')
                ->where('songs.title', 'like', '%' . $busqueda . '%')
                ->select('*')
                ->orderBy('songs.title', 'asc')
                ->paginate(8);
            return view('songs.listSongs', compact('songs' , 'busqueda'));
        }
    }


    public function edit(Song $song)
    {

        return view('songs.editSong', compact('song'));
    }

    public function delete($cancion)
    {
        return view('songs.deleteSong', compact('cancion'));
    }
}
