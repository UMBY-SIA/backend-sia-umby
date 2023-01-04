<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvJalurPenerimaan extends Model
{
    protected $table = 'lv_jalurpenerimaan';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "jalurpenerimaan";
    protected $fillable = [
        'jalurpenerimaan',
        'namajalur',
        'keterangan',
        'kodejenisjalur',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
