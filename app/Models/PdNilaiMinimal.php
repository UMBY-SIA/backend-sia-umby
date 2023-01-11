<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdNilaiMinimal extends Model
{
    protected $table = 'pd_nilaiminimal';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodenilaiminimal";
    protected $fillable = [
        'kodenilaiminimal',
        'sistemkuliah',
        'periodedaftar',
        'nilaiminimun',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
