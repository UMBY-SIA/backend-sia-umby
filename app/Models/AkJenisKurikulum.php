<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AkJenisKurikulum extends Model
{
    protected $table = 'ak_jeniskurikulum';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodekurikulum";
    protected $fillable = [
        'kodekurikulum',
        'kodeunit',
        'thnkurikulum',
        'namakurikulum',
        'tglberlaku',
        'is_aktif',
        'pendidikanasal',
        'pendidikantempuh',
        'sistemkuliah',

    ];
}
