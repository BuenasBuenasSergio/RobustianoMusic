<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function songList(){
        return view('songs.listSongs');
    }
    
    public function create(){
        return view('songs.newSong');
    }

    public function save(Request $request){
        $song = new Song();
        $song->title = $request->input('title');
        $song->artist = $request->input('artist');
        $song->collaboratorArtist = $request->input('colartist');
        $song->album = $request->input('album');
        $song->genre = $request->input('genre');
        $song->year = $request->input('year');
        $song->file = $request->input('file');
        $song->views = 0;
 
        // return redirect('/song/list');
        $song->save();
        return redirect()->route('songs.list');
    }

    public function update(Song $song , Request $request){
        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->collaboratorArtist = $request->colartist;
        $song->album = $request->album;
        $song->genre = $request->genre;
        $song->year = $request->year;
        $song->file = $request->file;
        
        $song->save();
        return redirect()->route('songs.list');
        // return $request->all();;  
    }
    
    public function edit(Song $song){
            
        return view('songs.editSong', compact('song')); 
    }
    
    public function delete($cancion){
        return view('songs.deleteSong', compact('cancion'));
    }

}
