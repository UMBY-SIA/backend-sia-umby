<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsRuang extends Model
{
    protected $table = 'ms_ruang';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "koderuang";
    protected $fillable = [
        'koderuang',
        'kodeunit',
        'kodegedung',
        'lantai',
        'lokasi',
        'keterangansem',
        'luasruangan',
        'dayatampung',
        'jenisruang',
        'isaktif',
        'urutanpakai',
        'fungsiruang',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',

    ];
}
