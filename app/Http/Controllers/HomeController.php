<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __invoke()
    {
        $songs = Song::paginate();
        $artists = Artist::limit(4)->get();
        return view('index', compact('songs', 'artists'));
    }
}
