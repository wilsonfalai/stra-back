<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PlanetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/film', [FilmController::class, 'index']);
Route::get('/film/{id}', [FilmController::class, 'show']);


Route::get('/peoples', [PeopleController::class, 'index']);

Route::get('/planet/{id}', [PlanetController::class, 'show']);

Route::get('/teste', function () {
    return 'Hello World';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
