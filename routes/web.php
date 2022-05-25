<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', HomeController::class);


// Route::get('cursos', [CursoController::class, 'index']);

// //lee de arriba a abajo
// Route::get('cursos/create', [CursoController::class, 'create']);

// //Si no va a ña URL Create ira a esta ruta
// Route::get('cursos/{curso}',[CursoController::class, 'show']);;

//Rutas Canciones
Route::controller(SongsController::class)->group(function () {
    Route::get('/songs', 'songList')->name('songs.list');
    Route::get('/songs/newSong', 'create')->name('songs.create');
    Route::post('/songs/save', 'save')->name('songs.save');
    Route::get('/songs/edit/{song}', 'edit')->name('songs.edit');
    Route::put('/songs/update/{song}', 'update')->name('songs.update');
    Route::get('/songs/delete/{song}', 'delete')->name('songs.delete');
    
});

Route::controller(ArtistController::class)->group(function () {
    Route::get('/artists', 'artistList')->name('artists.list');
    Route::get('/artists/newArtist', 'create')->name('artists.create');
    Route::post('/artists/save', 'save')->name('artists.save');
    route::get('/artists/details/{id}', 'details')->name('artist.details');
    Route::get('/artists/edit/{artista}', 'edit')->name('artists.edit');
    Route::get('/artists/delete/{artista}', 'delete')->name('artists.delete');
});

Route::controller(AlbumController::class)->group(function () {
    Route::get('/albums', 'albumList')->name('albums.list');
    Route::get('/albums/newAlbum/{artist_id}', 'create')->name('albums.create');
    Route::post('/albums/save', 'save')->name('albums.save');
    Route::get('/albums/details/{id}', 'details')->name('album.details');
    Route::get('/albums/edit/{album}', 'edit')->name('albums.edit');
    Route::get('/albums/delete/{album}', 'delete')->name('albums.delete');
});

Route::controller(GenreController::class)->group(function () {
    Route::get('/genres', 'genreList')->name('genres.list');
    Route::get('/genres/newGenre', 'create')->name('genres.create');
    Route::get('/genres/details/{id}', 'details')->name('genres.details');
    Route::post('/genres/save', 'save')->name('genres.save');
    Route::get('/genres/edit/{genero}', 'edit')->name('genres.edit');
    Route::get('/genres/delete/{genero}', 'delete')->name('genres.delete');
});

Route::controller(CountryController::class)->group(function () {
    Route::get('/countries', 'countryList')->name('countries.list');
    Route::get('/countries/newCountry', 'create')->name('countries.create');
    Route::get('/countries/{country}', 'details')->name('countries.details');
    Route::post('/countries/save', 'save')->name('countries.save');
    Route::get('/countries/edit/{pais}', 'edit')->name('countries.edit');
    Route::get('/countries/delete/{pais}', 'delete')->name('countries.delete');
});

// //Pasando dos parametros en la URL
// Route::get('cursos/{curso}/{categoria}', function ($curso, $categoria) {
//     return "Bienvenido al Curso de $curso en la categoria $categoria";
// });

// //Puede haber parametros opcionales
// Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
//     if($categoria){
//         return "Bienvenido al Curso de $curso en la categoria $categoria";
//     }
//     else{
//         return "Bienvenido al Curso de $curso";
//     }
    
// });

