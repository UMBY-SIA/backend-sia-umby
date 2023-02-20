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

    $router->group(['prefix' => 'agama'],function() use ($router)
    {
        $router->get('/','LvAgamaController@index');
        $router->post('posts','LvAgamaController@store');
        $router->post('update/{id}','LvAgamaController@update');
        $router->delete('delete/{id}','LvAgamaController@delete');
    });

    $router->group(['prefix' => 'akreditasi'],function() use ($router)
    {
        $router->get('/','LvAkreditasiController@index');
        $router->post('posts','LvAkreditasiController@store');
        $router->post('update/{id}','LvAkreditasiController@update');
        $router->delete('delete/{id}','LvAkreditasiController@delete');
    });

    $router->group(['prefix' => 'frekuensi-kurikulum'],function() use ($router)
    {
        $router->get('/','LvFrekuensiKurikulumController@index');
        $router->post('posts','LvFrekuensiKurikulumController@store');
        $router->post('update/{id}','LvFrekuensiKurikulumController@update');
        $router->delete('delete/{id}','LvFrekuensiKurikulumController@delete');
    });

    $router->group(['prefix' => 'pengalaman'],function() use ($router)
    {
        $router->get('/','MsPengalamanController@index');
        $router->post('posts','MsPengalamanController@store');
        $router->post('update/{id}','MsPengalamanController@update');
        $router->delete('delete/{id}','MsPengalamanController@delete');
    });

    $router->group(['prefix' => 'periode'],function() use ($router)
    {
        $router->get('/','MsPeriodeController@index');
        $router->post('posts','MsPeriodeController@store');
        $router->post('update/{id}','MsPeriodeController@update');
        $router->delete('delete/{id}','MsPeriodeController@delete');
    });

    $router->group(['prefix' => 'periode-daftar'],function() use ($router)
    {
        $router->get('/','MsPeriodeDaftarController@index');
        $router->post('posts','MsPeriodeDaftarController@store');
        $router->post('update/{id}','MsPeriodeDaftarController@update');
        $router->delete('delete/{id}','MsPeriodeDaftarController@delete');
    });

    $router->group(['prefix' => 'program-pend'],function() use ($router)
    {
        $router->get('/','MsProgramPendController@index');
        $router->post('posts','MsProgramPendController@store');
        $router->post('update/{id}','MsProgramPendController@update');
        $router->delete('delete/{id}','MsProgramPendController@delete');
    });

    $router->group(['prefix' => 'pekerjaan'],function() use ($router)
    {
        $router->get('/','LvPekerjaanController@index');
        $router->post('posts','LvPekerjaanController@store');
        $router->post('update/{id}','LvPekerjaanController@update');
        $router->delete('delete/{id}','LvPekerjaanController@delete');
    });

    $router->group(['prefix' => 'bidang-studi'],function() use ($router)
    {
        $router->get('/','AkBidangStudiController@index');
        $router->post('posts','AkBidangStudiController@store');
        $router->post('update/{id}','AkBidangStudiController@update');
        $router->delete('delete/{id}','AkBidangStudiController@delete');
    });

    $router->group(['prefix' => 'pendapatan'],function() use ($router)
    {
        $router->get('/','LvPendapatanController@index');
        $router->post('posts','LvPendapatanController@store');
        $router->post('update/{id}','LvPendapatanController@update');
        $router->delete('delete/{id}','LvPendapatanController@delete');
    });

    $router->group(['prefix' => 'warga-negara'],function() use ($router)
    {
        $router->get('/','LvWargaNegaraController@index');
        $router->post('posts','LvWargaNegaraController@store');
        $router->post('update/{id}','LvWargaNegaraController@update');
        $router->delete('delete/{id}','LvWargaNegaraController@delete');
    });

    $router->group(['prefix' => 'jenis-kurikulum'],function() use ($router)
    {
        $router->get('/','AkJenisKurikulumController@index');
        $router->post('posts','AkJenisKurikulumController@store');
        $router->post('update/{id}','AkJenisKurikulumController@update');
        $router->delete('delete/{id}','AkJenisKurikulumController@delete');
    });

    $router->group(['prefix' => 'sistem'],function() use ($router)
    {
        $router->get('/','AkSistemController@index');
        $router->post('posts','AkSistemController@store');
        $router->post('update/{id}','AkSistemController@update');
        $router->delete('delete/{id}','AkSistemController@delete');
    });

    $router->group(['prefix' => 'status-nikah'],function() use ($router)
    {
        $router->get('/','LvStatusNikahController@index');
        $router->post('posts','LvStatusNikahController@store');
        $router->post('update/{id}','LvStatusNikahController@update');
        $router->delete('delete/{id}','LvStatusNikahController@delete');
    });

    $router->group(['prefix' => 'mahasiswa'],function() use ($router)
    {
        $router->get('/','MsMahasiswaController@index');
        $router->post('posts','MsMahasiswaController@store');
        $router->post('update/{id}','MsMahasiswaController@update');
        $router->delete('delete/{id}','MsMahasiswaController@delete');
    });

    $router->group(['prefix' => 'beasiswa'],function() use ($router)
    {
        $router->get('/','PdBeasiswaController@index');
        $router->post('posts','PdBeasiswaController@store');
        $router->post('update/{id}','PdBeasiswaController@update');
        $router->delete('delete/{id}','PdBeasiswaController@delete');
    });

    $router->group(['prefix' => 'biaya-studi'],function() use ($router)
    {
        $router->get('/','PdBiayaStudiController@index');
        $router->post('posts','PdBiayaStudiController@store');
        $router->post('update/{id}','PdBiayaStudiController@update');
        $router->delete('delete/{id}','PdBiayaStudiController@delete');
    });

    $router->group(['prefix' => 'content'],function() use ($router)
    {
        $router->get('/','PdContentController@index');
        $router->post('posts','PdContentController@store');
        $router->post('update/{id}','PdContentController@update');
        $router->delete('delete/{id}','PdContentController@delete');
    });

    $router->group(['prefix' => 'gelombang-daftar'],function() use ($router)
    {
        $router->get('/','PdGelombangDaftarController@index');
        $router->post('posts','PdGelombangDaftarController@store');
        $router->post('update/{id}','PdGelombangDaftarController@update');
        $router->delete('delete/{id}','PdGelombangDaftarController@delete');
    });

    $router->group(['prefix' => 'informasi-dari'],function() use ($router)
    {
        $router->get('/','PdInformasiDariController@index');
        $router->post('posts','PdInformasiDariController@store');
        $router->post('update/{id}','PdInformasiDariController@update');
        $router->delete('delete/{id}','PdInformasiDariController@delete');
    });

    $router->group(['prefix' => 'library'],function() use ($router)
    {
        $router->get('/','PdLibraryController@index');
        $router->post('posts','PdLibraryController@store');
        $router->post('update/{id}','PdLibraryController@update');
        $router->delete('delete/{id}','PdLibraryController@delete');
    });

    $router->group(['prefix' => 'nilai-minimal'],function() use ($router)
    {
        $router->get('/','PdNilaiMinimalController@index');
        $router->post('posts','PdNilaiMinimalController@store');
        $router->post('update/{id}','PdNilaiMinimalController@update');
        $router->delete('delete/{id}','PdNilaiMinimalController@delete');
    });

    $router->group(['prefix' => 'nilai-ujian'],function() use ($router)
    {
        $router->get('/','PdNilaiUjianController@index');
        $router->post('posts','PdNilaiUjianController@store');
        $router->post('update/{id}','PdNilaiUjianController@update');
        $router->delete('delete/{id}','PdNilaiUjianController@delete');
    });

    $router->group(['prefix' => 'nomor-kategori'],function() use ($router)
    {
        $router->get('/','PdNomorKategoriController@index');
        $router->post('posts','PdNomorKategoriController@store');
        $router->post('update/{id}','PdNomorKategoriController@update');
        $router->delete('delete/{id}','PdNomorKategoriController@delete');
    });

    $router->group(['prefix' => 'pagu-jalur'],function() use ($router)
    {
        $router->get('/','PdPaguJalurController@index');
        $router->post('posts','PdPaguJalurController@store');
        $router->post('update/{id}','PdPaguJalurController@update');
        $router->delete('delete/{id}','PdPaguJalurController@delete');
    });

    $router->group(['prefix' => 'pagu-unit'],function() use ($router)
    {
        $router->get('/','PdPaguUnitController@index');
        $router->post('posts','PdPaguUnitController@store');
        $router->post('update/{id}','PdPaguUnitController@update');
        $router->delete('delete/{id}','PdPaguUnitController@delete');
    });
    $router->group(['prefix' => 'jabatan-akademik'],function() use ($router)
    {
        $router->get('/','LvJabatanAkademikController@index');
        $router->post('posts','LvJabatanAkademikController@store');
        $router->post('update/{id}','LvJabatanAkademikController@update');
        $router->delete('delete/{id}','LvJabatanAkademikController@delete');
    });

    $router->group(['prefix' => 'jabatan-struktural'],function() use ($router)
    {
        $router->get('/','LvJabatanStrukturalController@index');
        $router->post('posts','LvJabatanStrukturalController@store');
        $router->post('update/{id}','LvJabatanStrukturalController@update');
        $router->delete('delete/{id}','LvJabatanStrukturalController@delete');
    });

    $router->group(['prefix' => 'jalur-penerimaan'],function() use ($router)
    {
        $router->get('/','LvJalurPenerimaanController@index');
        $router->post('posts','LvJalurPenerimaanController@store');
        $router->post('update/{id}','LvJalurPenerimaanController@update');
        $router->delete('delete/{id}','LvJalurPenerimaanController@delete');
    });

    $router->group(['prefix' => 'pmb-jenis-jalur'],function() use ($router)
    {
        $router->get('/','lvPmbJenisJalurController@index');
        $router->post('posts','lvPmbJenisJalurController@store');
        $router->post('update/{id}','lvPmbJenisJalurController@update');
        $router->delete('delete/{id}','lvPmbJenisJalurController@delete');
    });

    $router->group(['prefix' => 'jenis-mata-kuliah'],function() use ($router)
    {
        $router->get('/','LvJenisMataKuliahController@index');
        $router->post('posts','LvJenisMataKuliahController@store');
        $router->post('update/{id}','LvJenisMataKuliahController@update');
        $router->get('show/{id}','LvJenisMataKuliahController@show');
        $router->delete('delete/{id}','LvJenisMataKuliahController@delete');

    });




});
$router->get('mahasiswa', 'AturanCutiController@index');
