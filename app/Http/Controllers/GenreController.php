<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function genreList(){
        return view('genre.listGenre');
    }
    
    public function create(){
        return view('genre.createGenre');
    }
    
    public function edit($genre){
        return view('genre.editGenre', compact('genre'));
        
    }
    
    public function delete($genre){
        return view('genre.deleteGenre', compact('genre'));
    }
}