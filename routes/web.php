<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'v1'], function() use ($router)
{
    $router->group(['prefix' => 'alumni'], function() use ($router) {
        $router->get('/','AlumniController@index');
        $router->post('posts','AlumniController@store');
    });
    $router->group(['prefix' => 'kota'],function() use ($router)
    {
        $router->get('/','MsKotaController@index');
        $router->post('posts','MsKotaController@store');
    });
    $router->group(['prefix' => 'provinsi'],function() use ($router)
    {
        $router->get('/','MsProvinsiController@index');
        $router->post('posts','MsProvinsiController@store');
    });

});
$router->get('mahasiswa', 'AturanCutiController@index');
// });
