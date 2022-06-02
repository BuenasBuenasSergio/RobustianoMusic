<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Country;
use App\Models\Genres;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function artistList()
    {
        $busqueda = '';
        if (Auth::check()) {
            $artists = Artist::orderBy('name','asc')->paginate(12);
            return view('artist.listArtist', compact('artists' , 'busqueda'));
        } else {
            return redirect('/login');
        }
    }

    public function create()
    {
        $genres = Genres::all();
        $countries = Country::all();
        return view('artist.formArtist', compact('genres', 'countries'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'debut' => 'required',
            'bio' => 'required',
        ]);

        $artist = new Artist();
        $artist->name = $request->input('name');
        $artist->debutYear = $request->input('debutYear');
        $artist->country_id = $request->input('country_id');
        $artist->genre_id = $request->input('genre_id');
        $artist->bio = $request->input('bio');


        //imagenes de artista
        Storage::disk('public')->put('/images/artists/' . $artist->name . '/' . $request->file('image')->getClientOriginalName(), file_get_contents($request->file('image'))); //guardado del archivo
        //ruta del archivo
        $artist->image = 'storage/images/artists/' . $artist->name . '/' . $request->file('image')->getClientOriginalName(); //guardar la ruta de la imagen
        //imagenes de artista banner

        Storage::disk('public')->put('/images/artists/' . $artist->name . '/' . $request->file('banner')->getClientOriginalName(), file_get_contents($request->file('banner'))); //guardado del archivo
        //ruta del archivo
        $artist->image_banner = 'storage/images/artists/' . $artist->name . '/' . $request->file('banner')->getClientOriginalName(); //guardar la ruta de la imagen
        $artist->save();

        $user = User::find(Auth::user()->id);
        $user->artist_id = $artist->id;
        $user->save();


        return redirect()->route('artist.details', $artist->id);
    }


    public function details($id)
    {
        if (Auth::check()) {
            $artist = Artist::find($id);
            $country = Country::find($artist->country_id);
            $genre = Genres::find($artist->genre_id);
            $albums = Album::where('artist_id', $id)->get()->all();
            $songs = Song::limit(5)->where('artist_id', $id)->orderBy('views', 'asc')->get();
            return view('artist.detailsArtist', compact('artist', 'country', 'genre', 'albums', 'songs'));
        } else {
            return redirect('/login');
        }
    }


    public function search(Request $request)
    {
        $busqueda = $request->input('q');
        if (Auth::check()) {
            $artists = Artist::where('name', 'like', '%' . $busqueda . '%')
            ->orderBy('name', 'asc')
            ->paginate(8);
            return view('artist.listArtist', compact('artists' ,'busqueda'));
        } else {
            return redirect('/login');
        }
    }
    public function edit($artist)
    {
        return view('artist.editArtist', compact('artist'));
    }

    public function delete($artist)
    {
        return view('artist.deleteArtist', compact('artist'));
    }
}
