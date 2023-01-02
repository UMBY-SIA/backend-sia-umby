<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdBiayaStudi extends Model
{
    protected $table = 'pd_biayastudi';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodebiayastudi";
    protected $fillable = [
        'kodebiayastudi',
        'judul',
        'biayastudi',
        'sistemkuliah',
        'aktif',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
