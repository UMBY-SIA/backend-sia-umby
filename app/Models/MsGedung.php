<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsGedung extends Model
{
    protected $table = 'ms_gedung';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodegedung";
    protected $fillable = [
        'kodegedung',
        'namagedung',
        'keterangan',
        'kodekampus',

    ];
}
