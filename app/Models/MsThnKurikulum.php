<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsThnKurikulum extends Model
{
    protected $table = 'ms_thnkurikulum';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "thnkurikulum";
    protected $fillable = [
        'thnkurikulum',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',

    ];
}
