<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsUnit extends Model
{
    protected $table = 'gate.ms_unit';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodeunit";
    protected $fillable = [
        'kodeunit',
        'kodeunitparent',
        'namaunit',
        'namasingkat',
        'levels',
        'gelar',
        'programpend',
        'kodekampus',
        'bebanstudi',
        'batasip',
        'prosentasecmax',
        'toeflmin',
        'cutimax',
        'keterangan',
        'urutan',
        'infoleft',
        'inforight',
        'isaktif',
        'nipketua',
        'namauniten',
        'gelaren',
        'noskdikti',
        'tglskdikti',
        'noskbanpt',
        'tglskbanpt',
        'kodeakreditasi',
        'telp',
        'email',
        'kodenim',
        'kodedikti',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
        'kodefakultas',


    ];
}
