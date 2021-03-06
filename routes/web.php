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
Route::resource('users', 'AuthController');

Route::post('/users','AuthController@upload');

Route::get('register', 'AuthController@register') 
    -> name('auth.register') //Se le pone nombre a la ruta.
    -> middleware(['validate_hour']); //Para pasarle un array []
Route::post('register', 'AuthController@doRegister') 
    -> name('auth.do-register') //Se le pone nombre a la ruta.
    -> middleware(['validate_hour']); //Pa
Route::get('login', 'AuthController@login') 
    -> name('auth.login') //Se le pone nombre a la ruta.
    -> middleware(['validate_hour']); //Pa
Route::post('login', 'AuthController@doLogin') 
    -> name('auth.do-login') //Se le pone nombre a la ruta.
    -> middleware(['validate_hour']); //Pa
Route::any('logout', 'AuthController@logout') 
    -> name('auth.logout') //Any: cualquier tipo de peticion
    -> middleware(['validate_hour']); //Pa
//Route::get('coins','CoinsController@index' );