<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Country;
use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function artistList(){
        $artists = Artist::paginate(12);
        return view('artist.listArtist', compact('artists'));
    }
    
    public function create(){
        $genres = Genres::all();
        $countries = Country::all();
        return view('artist.formArtist', compact('genres', 'countries'));
    }
    
    public function save(Request $request){
        

        $artist = new Artist();
        $artist->name = $request->input('name');
        $artist->debutYear = $request->input('debutYear');
        $artist->country_id = $request->input('country_id');
        $artist->genre_id = $request->input('genre_id');
        $artist->bio = $request->input('bio');
        

        //imagenes de artista
        Storage::disk('public')->put('/images/artists/'. $artist->name .'/' . $request->file('image')->getClientOriginalName(), file_get_contents($request->file('image'))); //guardado del archivo
        //ruta del archivo
        $artist->image = 'storage/images/artists/' . $artist->name .'/' . $request->file('image')->getClientOriginalName(); //guardar la ruta de la imagen
        //imagenes de artista banner

        Storage::disk('public')->put('/images/artists/'. $artist->name .'/' . $request->file('banner')->getClientOriginalName(), file_get_contents($request->file('banner'))); //guardado del archivo
        //ruta del archivo
        $artist->image_banner = 'storage/images/artists/' . $artist->name .'/' . $request->file('banner')->getClientOriginalName(); //guardar la ruta de la imagen


        $artist->save();
        
        return redirect()->route('artist.listArtist');
    }
    

    public function details($id){
        $artist = Artist::find($id);
        $country = Country::find($artist->country_id);
        $genre = Genres::find($artist->genre_id);
        $albums = Album::where('artist_id', $id)->get()->all();
        return view('artist.detailsArtist', compact('artist' , 'country', 'genre', 'albums'));
    }

    public function edit($artist){
        return view('artist.editArtist', compact('artist'));
        
    }
    
    public function delete($artist){
        return view('artist.deleteArtist', compact('artist'));
    }
}
