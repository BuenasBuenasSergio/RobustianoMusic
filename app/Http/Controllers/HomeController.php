<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke(Request $str)
    {
        $busqueda = $str->input('q');
        if (Auth::check()) {
            if ($busqueda) {
                $userArtist = Artist::find(Auth::user()->artist_id);
                $songs = Song::join('artists', 'songs.artist_id', '=', 'artists.id')
                    ->where('title', 'like', '%' . $busqueda . '%')
                    ->select('*')
                    ->limit(4)
                    ->get();
                $artists = Artist::limit(4)->where('name', 'like', '%' . $busqueda . '%')
                    ->get();
                $albums = Album::limit(4)->where('title', 'like', '%' . $busqueda . '%')->get();
                return view('index', compact('songs', 'artists', 'albums', 'userArtist'));
            } else {
                $userArtist = Artist::find(Auth::user()->artist_id);
                $songs = Song::join('artists', 'songs.artist_id', '=', 'artists.id')
                    ->select('*')
                    ->orderBy('songs.id', 'desc')
                    ->limit(4)
                    ->get();
                $artists = Artist::limit(4)->get();
                $albums = Album::limit(4)->get();
                return view('index', compact('songs', 'artists', 'albums', 'userArtist'));
            }
        } else {
            $songs = Song::join('artists', 'songs.artist_id', '=', 'artists.id')
                ->select('*')
                ->limit(4)
                ->get();
            $artists = Artist::limit(4)->get();
            $albums = Album::limit(4)->get();
            return view('index', compact('songs', 'artists', 'albums'));
        }
    }

    public function login()
    {

        return view('auth.login');
    }
}
