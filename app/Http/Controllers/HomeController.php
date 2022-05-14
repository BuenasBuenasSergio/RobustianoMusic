<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __invoke()
    {
        $songs = Song::paginate();
        return view('index', compact('songs'));
    }
}
