<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsProvinsi extends Model
{
    protected $table = 'ms_propinsi';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodepropinsi";
    protected $fillable = [
        'kodepropinsi',
        'namapropinsi',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',

    ];
}
