<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    public function genreList()
    {
        $genres = Genres::all();
        return view('genre.listGenre', compact('genres'));
    }

    public function create()
    {
        return view('genre.formGenre');
    }

    public function save(Request $request)
    {
        foreach ($request->file('genero') as  $image) {
            $country = new Genres(); //declaracion de Pais
            $ogName = $image->getClientOriginalName(); //nombre original
            $busqueda = '.';
            $pos = strpos($ogName, $busqueda);
            $name = substr($ogName, 0, $pos);
            $country->name = $name; //recogida del nombre del archivo
            //upload image
            Storage::disk('public')->put('/genres/images/' . $image->getClientOriginalName(), file_get_contents($image)); //guardado del archivo
            //ruta del archivo
            $country->image = 'storage/genres/images/' . $image->getClientOriginalName(); //guardar la ruta de la imagen
            $country->save(); //guardar el pais
        }
        return redirect()->route('genres.list');
    }

    public function details($id)
    {
        $genre = Genres::find($id);
        $artists = Artist::where('genre_id', $id)->paginate(15);
        return view('genre.detailGenre', compact('genre', 'artists'));
    }

    public function edit($genre)
    {
        return view('genre.editGenre', compact('genre'));
    }

    public function delete($genre)
    {
        return view('genre.deleteGenre', compact('genre'));
    }
}
