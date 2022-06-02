<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function albumList()
    {
        $albums = Album::paginate(12)->sortBy('name');
        return view('album.listAlbum', compact('albums'));
    }

    public function create($artist_id)
    {
        $artist = Artist::find($artist_id);
        return view('album.formAlbum', compact('artist'));
    }

    public function save(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'year' => 'required',
        //     'image' => 'required',
        //     'artist_id' => 'required'
        // ]);
        $artist = Artist::find($request->artist);

        $album = new Album();
        $album->title = $request->title;
        $album->release_year = $request->releaseYear;
        $album->artist_id = $request->artist;

        //upload image
        Storage::disk('public')->put('/images/albums/'.$artist->name.'/'.$album->title.'/cover/' . $request->image->getClientOriginalName(), file_get_contents($request->image)); //guardado del archivo
        //ruta del archivo
        $album->image = 'storage/images/albums/'.$artist->name.'/'.$album->title.'/cover/' . $request->image->getClientOriginalName(); //guardar la ruta de la imagen
        $album->save();

        return redirect()->route('songs.create')->with('success', 'Album creado correctamente');
    }

    public function details($id)
    {
        $album = Album::find($id);
        $artist = Artist::find($album->artist_id);//
        $songs = Song::limit(5)->where('album_id', $id)->orderBy('id', 'asc')->get();
        return view('album.detailsAlbum', compact('album', 'artist', 'songs'));
    }

    public function edit($album)
    {
        return view('album.editAlbum', compact('album'));
    }


    public function delete($album)
    {
        return view('album.deleteAlbum', compact('album'));
    }
}
