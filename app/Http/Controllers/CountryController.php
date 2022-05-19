<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    public function countryList()
    {
        $countries = Country::all();
        return view('country.listCountry', compact('countries'));
    }

    public function create()
    {
        return view('country.formCountry');
    }

    public function save(Request $request)
    {
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
        $artists = Artist::where('country_id', $country)->get();
        $country = Country::find($country);
        return view('country.detailCountries', compact('artists', 'country'));
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