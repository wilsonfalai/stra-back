<?php

use App\Models\Film;
use App\Models\FilmPeople;
use App\Models\People;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {

    $film = Film::where('title', 'The Empire Strikes Back')->first();
    dd($film['title']);
});



Route::get('/read', function () {

    $film = Film::find(2);
    //dd($film->peoples);

    foreach($film->peoples as $p){
        dump($p['name']);
    }
});
