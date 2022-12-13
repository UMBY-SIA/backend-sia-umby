<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsKota extends Model
{
    protected $table = 'ms_kota';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodekota";
    protected $fillable = [
        'kodekota',
        'kodepropinsi',
        'namakota',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
