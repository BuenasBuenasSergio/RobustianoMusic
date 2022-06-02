<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    public function countryList()
    {
        $busqueda = '';
        if (Auth::check()) {
            $countries = Country::orderBy('name','asc')->paginate(8);
            return view('country.listCountry', compact('countries', 'busqueda'));
        } else {
            return redirect('/login');
        }
    }

    public function create()
    {
        return view('country.formCountry');
    }

    public function save(Request $request)
    {
        //validaciones
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        foreach ($request->file('image') as  $image) {
            //falta hacer el link 
            $country = new Country(); //declaracion de Pais
            $ogName = $image->getClientOriginalName(); //nombre original
            $busqueda = '.';
            $pos = strpos($ogName, $busqueda);
            $name = substr($ogName, 0, $pos);
            $country->name = $name; //recogida del nombre del archivo
            //upload image
            Storage::disk('public')->put('/images/countries/' . $image->getClientOriginalName(), file_get_contents($image)); //guardado del archivo
            //ruta del archivo
            $country->flag = 'storage/images/countries/' . $image->getClientOriginalName(); //guardar la ruta de la imagen
            $country->save(); //guardar el pais
        }

        return redirect()->route('countries.list');
    }

    public function details($country)
    {
        //seleccionar artistas de un pais
        $artists = Artist::where('country_id', $country)->paginate(15);
        $country = Country::find($country);
        return view('country.detailCountries', compact('artists', 'country'));
    }

    public function search(Request $request){
        $busqueda = $request->input('q');
        if (Auth::check()) {
            $countries = Country::where('name', 'like', '%' . $busqueda . '%')->orderBy('name','asc')->paginate(8);
            return view('country.listCountry', compact('countries', 'busqueda'));
        } else {
            return redirect('/login');
        }
    }

    public function edit($country)
    {
        return view('country.editCountry', compact('country'));
    }

    public function delete($country)
    {
        return view('country.deleteCountry', compact('country'));
    }
}