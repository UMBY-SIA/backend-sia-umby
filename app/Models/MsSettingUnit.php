<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsSettingUnit extends Model
{
    protected $table = 'ms_settingunit';
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
        'tglakhirnilaiuts',
        'tglakhirnilaiuas',
        'tglakhirnilaiutssusulan',
        'tglakhirnilaiuassusulan',
        'krsisdan',
        'isijadwaldosen',
        'skslulus',
        'ulang',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',

    ];
}
