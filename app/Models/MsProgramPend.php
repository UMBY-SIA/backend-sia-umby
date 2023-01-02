<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsProgramPend extends Model
{
    protected $table = 'ms_programpend';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "programpend";
    protected $fillable = [
        'programpend',
        'namaprogram',
        'masastudimax',
        'kodenim',
        'namalengkap',
        'namaprogramen',
        'kodepmb',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
