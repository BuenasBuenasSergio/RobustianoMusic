<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    public function genreList()
    {
        if (Auth::check()) {

            $genres = Genres::orderBy('name' ,'asc')->paginate(8);

            return view('genre.listGenre', compact('genres'));
        } else {
            return redirect('/login');
        }
    }

    public function create()
    {
        if (Auth::check()) {
            return view('genre.formGenre');
        } else {
            return redirect('/login');
        }
    }

    public function save(Request $request)
    {
        $request->validate([

            'genero' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
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
        if (Auth::check()) {
            $genre = Genres::find($id);
            $artists = Artist::where('genre_id', $id)->paginate(15);
            return view('genre.detailGenre', compact('genre', 'artists'));
        } else {
            return redirect('/login');
        }
    }

    public function genreSearch(Request $request)
    {

        if (Auth::check()) {
            $busqueda = $request->input('q');
            $genres = Genres::where('name', 'like', '%' . $busqueda . '%')
                ->orderBy('name', 'asc')
                ->paginate(8);
            return view('genre.listGenre', compact('genres', 'busqueda'));
        } else {
            return redirect('/login');
        }
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
