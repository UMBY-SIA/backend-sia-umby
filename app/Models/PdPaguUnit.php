<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdPaguUnit extends Model
{
    protected $table = 'pd_paguunit';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodepaguunit";
    protected $fillable = [
        'kodepaguunit',
        'periodedaftar',
        'kodeunit',
        'paguunit',
        'jalurpenerimaan',
        'sistemkuliah',
        'kodekampus',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
