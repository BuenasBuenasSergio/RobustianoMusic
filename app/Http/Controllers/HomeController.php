<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __invoke()
    {
        $songs = Song::join('artists', 'songs.artist_id', '=', 'artists.id')
            ->select('*')
            ->limit(4)
            ->get()
            ;
        $artists = Artist::limit(4)->get();
        $albums = Album::limit(4)->get();
        return view('index', compact('songs', 'artists', 'albums'));
    }
}
