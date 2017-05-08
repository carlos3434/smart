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

Route::get('entrust',['before' => ['create-users'], function()
{
    $user = Auth::user();//obtenemos el usuario logueado
    return "";
    if ($user->hasRole(‘admin’))
    {
    return 'usuario tiene rol admin!';
    }
}]);
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

/*Route::group(["before" => "auth"], function() {
    Route::group(["before" => "session"], function() {*/

        Route::get('inicio', function () {
            return View::make('admin.main');
        });
        Route::get('admin.mantenimiento.usuarios', function () {
            $user = Auth::user();
            return View::make('admin.mantenimiento.users')->with('user',$user);
        });
        Route::get('admin.orders.order', function () {
            $mesas = Mesa::all();
            $sql = "SELECT p.id, p.nombre, cp.stock, cp.precio, tp.nombre as tipo
                    FROM calendario_platos cp
                    JOIN calendarios  c  ON cp.calendario_id = c.id
                    JOIN platos  p  ON cp.plato_id = p.id
                    JOIN tipo_platos  tp ON p.tipo_platos_id  =  tp.id
                    WHERE fecha='2017-05-08' AND p.categoria_platos_id=1";
            $menu = DB::select($sql);
            $sql = "SELECT p.id, p.nombre, cp.stock, cp.precio, tp.nombre as tipo
                    FROM calendario_platos cp
                    JOIN calendarios  c  ON cp.calendario_id = c.id
                    JOIN platos  p  ON cp.plato_id = p.id
                    JOIN tipo_platos  tp ON p.tipo_platos_id  =  tp.id
                    WHERE fecha='2017-05-08' AND p.categoria_platos_id=2";
            $carta = DB::select($sql);
            $data=[
                'mesas' => $mesas,
                'menu'  => $menu,
                'carta' => $carta
            ];
            return View::make('admin.orders.orders')->with($data);
        });

        //esto tiene que ser dinamico
        /*Route::get('/{uri}', function ($uri) {
            list($modulo,$submodulo) = explode('.', $uri);
            return view('admin.'.$modulo.'.'.$submodulo.'.index');
        });*/

/*   });*/
    //filtro token csrf
    Route::group(["before" => "csrf"], function() {
        //Route::controller('user', 'UserController');
        Route::resource('pedido', 'PedidoController');

    });
/*});
*/