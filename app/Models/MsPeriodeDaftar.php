<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsPeriodeDaftar extends Model
{
    protected $table = 'ms_periodedaftar';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "periodedaftar";
    protected $fillable = [
        'periodedaftar',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
