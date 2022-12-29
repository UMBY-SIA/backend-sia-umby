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

    $router->group(['prefix' => 'pendidikan'],function() use ($router)
    {
        $router->get('/', 'LvPendidikanController@index');
        $router->post('posts','LvPendidikanController@store');
        $router->post('update/{id}','LvPendidikanController@update');
        $router->delete('delete/{id}','LvPendidikanController@delete');
    });
    $router->group(['prefix' => 'kkni'],function() use ($router)
    {
        $router->get('/', 'MsKkniController@index');
        $router->post('posts', 'MsKkniController@store');
        $router->post('update/{id}', 'MsKkniController@update');
        $router->delete('delete/{id}', 'MsKkniController@delete');
    });

    $router->group(['prefix' => 'lv-jabatan'],function() use ($router)
    {
        $router->get('/', 'LvJabatanController@index');
        $router->post('posts', 'LvJabatanController@store');
        $router->post('update/{id}', 'LvJabatanController@update');
        $router->delete('delete/{id}', 'LvJabatanController@delete');
    });

    $router->group(['prefix' => 'pejabat'],function() use ($router)
    {
        $router->get('/', 'MsPejabatController@index');
        $router->post('posts', 'MsPejabatController@store');
        $router->post('update/{id}', 'MsPejabatController@update');
        $router->delete('delete/{id}', 'MsPejabatController@delete');
    });


    $router->group(['prefix' => 'thnkurikulum'],function() use ($router)
    {
        $router->get('/','MsThnKurikulumController@index');
        $router->post('posts','MsThnKurikulumController@store');
        $router->post('update/{id}','MsThnKurikulumController@update');
        $router->delete('delete/{id}','MsThnKurikulumController@delete');
    });

    $router->group(['prefix' => 'syaratkehadiranujian'],function() use ($router)
    {
        $router->get('/','MsSyaratKehadiranUjianController@index');
        $router->post('posts','MsSyaratKehadiranUjianController@store');
        $router->post('update/{id}','MsSyaratKehadiranUjianController@update');
        $router->delete('delete/{id}','MsSyaratKehadiranUjianController@delete');
    });

    $router->group(['prefix' => 'sumberbeasiswa'],function() use ($router)
    {
        $router->get('/','MsSumberBeasiswaController@index');
        $router->post('posts','MsSumberBeasiswaController@store');
        $router->post('update/{id}','MsSumberBeasiswaController@update');
        $router->delete('delete/{id}','MsSumberBeasiswaController@delete');
    });

    $router->group(['prefix' => 'setting-unit'],function() use ($router)
    {
        $router->get('/','MsSettingUnitController@index');
        $router->post('posts','MsSettingUnitController@store');
        $router->post('update/{id}','MsSettingUnitController@update');
        $router->delete('delete/{id}','MsSettingUnitController@delete');
    });

    $router->group(['prefix' => 'setting-krs-unit'],function() use ($router)
    {
        $router->get('/','MsSettingKrsUnitController@index');
        $router->post('posts','MsSettingKrsUnitController@store');
        $router->post('update/{id}','MsSettingKrsUnitController@update');
        $router->delete('delete/{id}','MsSettingKrsUnitController@delete');
    });

    $router->group(['prefix' => 'setting'],function() use ($router)
    {
        $router->get('/','MsSettingController@index');
        $router->post('posts','MsSettingController@store');
        $router->post('update/{id}','MsSettingController@update');
        $router->delete('delete/{id}','MsSettingController@delete');
    });

    $router->group(['prefix' => 'ruang'],function() use ($router)
    {
        $router->get('/','MsRuangController@index');
        $router->post('posts','MsRuangController@store');
        $router->post('update/{id}','MsRuangController@update');
        $router->delete('delete/{id}','MsRuangController@delete');
    });

});
$router->get('mahasiswa', 'AturanCutiController@index');
// });
