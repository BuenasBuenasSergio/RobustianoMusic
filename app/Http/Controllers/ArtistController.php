<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function artistList(){
        return view('artist.listArtist');
    }
    
    public function create(){
        return view('artist.createArtist');
    }
    
    
    public function edit($artist){
        return view('artist.editArtist', compact('artist'));
        
    }
    
    public function delete($artist){
        return view('artist.deleteArtist', compact('artist'));
    }
}
