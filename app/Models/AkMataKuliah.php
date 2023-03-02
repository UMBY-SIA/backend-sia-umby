<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AkMataKuliah extends Model
{
    protected $table = 'ak_matakuliah';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodemk";
    protected $fillable = [
        'kodemk',
        'nip',
        'kodejenis',
        'namamk',
        'namamken',
        'sks',
        'nilaimin',
        'abstrakmk',
        'sksmk',
        'skstatapmuka',
        'skspraktikum',
        'sksprakteklapangan',
        'sap',
        'silabus',
        'bahanajar',
        'diktat',
        'tglmulaiefektif',
        'tglakhirefektif',
        'tipekuliah',
        'skslulusmin',
        'filesapmk',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',


    ];
}
