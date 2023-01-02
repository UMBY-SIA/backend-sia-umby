<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsPeriode extends Model
{
    protected $table = 'ms_periode';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "idperiode";
    protected $fillable = [
        'periode',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
