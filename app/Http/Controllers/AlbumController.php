<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function albumList(){
        return view('album.listAlbum');
    }
    
    public function create(){
        return view('album.createAlbum');
    }
    
    
    public function edit($album){
        return view('album.editAlbum', compact('album'));
        
    }
        
    
    public function delete($album){
        return view('album.deleteAlbum', compact('album'));
    }
}
