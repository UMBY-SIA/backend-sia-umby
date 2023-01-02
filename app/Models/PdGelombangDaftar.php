<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdGelombangDaftar extends Model
{
    protected $table = 'pd_gelombangdaftar';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "idgelombang";
    protected $fillable = [
        'idgelombang',
        'jalurpenerimaan',
        'kodegelombang',
        'periodedaftar',
        'pengumuman',
        'tglawaldaftar',
        'tglakhirdaftar',
        'tglujian',
        'tglpengumuman',
        'tglawalregistrasi',
        'tglakhirregistrasi',
        'sistemkuliah',
        'aktif',
        'kodefrm',
        'tambahpangkal',
        'gelombang',
        'programpend',
        'filebiaya',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
