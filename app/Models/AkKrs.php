<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AkKrs extends Model
{
    protected $table = 'ak_krs';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "nim";
    protected $fillable = [
        'nim',
        'kodekelas',
        'kodekrs',
        'nnumerik',
        'nangka',
        'nhuruf',
        'lulus',
        'dipakai',
        'nilaimasuk',
        'ulang',
        'autonilai',
        'no_urut',
        'isuts',
        'isuas',
        'isuassusulan',
        'isutssusulan',
        'nasal',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
