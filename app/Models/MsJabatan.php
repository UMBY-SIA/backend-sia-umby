<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsJabatan extends Model
{
    protected $table = 'ms_pejabat';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "idpejabat";
    protected $fillable = [
        'idpejabat',
        'kodeunit',
        'kodejabatan',
        'nip',
        'namapegawai',
        'sistemkuliah',
        'kodekampus',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',

    ];
}
