<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsSettingKrsUnit extends Model
{
    protected $table = 'ms_settingkrsunit';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "idsetting";
    protected $fillable = [
        'idsetting',
        'sistemkuliah',
        'kodeunit',
        'tglawalkrs',
        'tglakhirkrs',
        'batal',
        'periode',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',

    ];
}
