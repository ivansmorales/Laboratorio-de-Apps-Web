<?php

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

Route::get('/f', function () {
    return view('f');
});

//Path de la ruta, NombreDelController@FunctionDentroDelController
Route::get('/prueba-controller', 'PruebaController@index');

Route::resource('coins', 'CoinsController');

//Route::get('coins','CoinsController@index' );