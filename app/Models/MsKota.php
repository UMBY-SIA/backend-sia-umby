<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsKota extends Model
{
    protected $table = 'ms_kota';
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
