<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvPmbJenisJalur extends Model
{
    protected $table = 'lv_pmbjenisjalur';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodejenisjalur";
    protected $fillable = [
        'kodejenisjalur',
        'jenisjalur',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
