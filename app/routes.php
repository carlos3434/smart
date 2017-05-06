<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('hello');
});*/
/*
Route::group(["before" => "auth"], function() {
    Route::group(['prefix' => 'admin','middleware' => ['sesion']], function () {
        Route::get('inicio', function () {
            return view('admin.inicio');
        });

        //esto tiene que ser dinamico
        Route::get('/{uri}', function ($uri) {
            list($modulo,$submodulo) = explode('.', $uri);
            return view('admin.'.$modulo.'.'.$submodulo.'.index');
        });
    });
    //llamada de apis

    Route::group(['prefix' => 'api'], function () {
        //Route::resource('/users', 'ApiUserController');
        Route::resource('/users', 'ApiUserController');
    });
    
});*/

Route::any('/', function()
{
    if (Auth::check())
    {
        return Redirect::to('inicio');
    }
    return View::make('user/login');
});

Route::get('password/remind', function()
{
    return View::make('password/remind');
});
Route::get('user/registro', function()
{
    return View::make('user/registro');
});
Route::get('register/confirm/{token}', 'UserController@confirmEmail');

//Route::group(["before" => "csrf"], function() {
    Route::controller('password', 'RemindersController');
    Route::controller("user", "UserController");
    Route::controller("mesa", "MesaController");
    Route::controller("plato", "PlatoController");
    Route::post("login", "UserController@postLogin");
    //Route::controller('login', 'LoginController');
//});

Route::group(["before" => "auth"], function() {
    Route::group(["before" => "session"], function() {*/

        Route::get('inicio', function () {
            return View::make('admin.main');
        });
        Route::get('admin.mantenimiento.usuarios', function () {
            return View::make('admin.mantenimiento.users');
        });
        Route::get('admin.orders.order', function () {
            return View::make('admin.orders.orders');
        });

        //esto tiene que ser dinamico
        Route::get('/{uri}', function ($uri) {
            list($modulo,$submodulo) = explode('.', $uri);
            return view('admin.'.$modulo.'.'.$submodulo.'.index');
        });

   });
    //filtro token csrf
    Route::group(["before" => "csrf"], function() {
        Route::controller('user', 'UserController');

    });
});
