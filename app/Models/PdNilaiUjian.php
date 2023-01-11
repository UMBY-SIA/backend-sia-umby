<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdNilaiUjian extends Model
{
    protected $table = 'pd_nilaiujian';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "nopendaftar";
    protected $fillable = [
        'nopendaftar',
        'kodemateri',
        'nilaimateriujian',
        'lulusmateriujian',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
