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
        $router->post('update/{id}','AlumniController@update');
        $router->delete('delete/{id}','AlumniController@delete');
    });
    $router->group(['prefix' => 'unit'],function() use ($router)
    {
        $router->get('/', 'MsUnitController@index');
        $router->post('posts','MsUnitController@store');
        $router->post('update/{id}','MsUnitController@update');
        $router->delete('delete/{id}/{kodeunitparent}', 'MsUnitController@delete');
    });
    $router->group(['prefix' => 'kota'],function() use ($router)
    {
        $router->get('/','MsKotaController@index');
        $router->post('posts','MsKotaController@store');
        $router->post('update/{id}','MsKotaController@update');
        $router->delete('delete/{id}', 'MsKotaController@delete');
    });
    $router->group(['prefix' => 'provinsi'],function() use ($router)
    {
        $router->get('/','MsProvinsiController@index');
        $router->post('posts','MsProvinsiController@store');
        $router->post('update/{id}','MsProvinsiController@update');
        $router->delete('delete/{id}','MsProvinsiController@delete');
    });
    $router->group(['prefix' => 'lokasi-kampus'],function() use ($router)
    {
        $router->get('/','LsLokasiKampusController@index');
        $router->post('posts','LsLokasiKampusController@store');
        $router->post('update/{id}','LsLokasiKampusController@update');
        $router->delete('delete/{id}','LsLokasiKampusController@delete');
    });
    $router->group(['prefix' => 'gedung'],function() use ($router)
    {
        $router->get('/','MsGedungController@index');
        $router->post('posts','MsGedungController@store');
        $router->post('update/{id}','MsGedungController@update');
        $router->delete('delete/{id}','MsGedungController@delete');
    });

});
$router->get('mahasiswa', 'AturanCutiController@index');
// });
