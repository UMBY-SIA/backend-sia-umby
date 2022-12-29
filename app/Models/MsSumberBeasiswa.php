<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsSumberBeasiswa extends Model
{
    protected $table = 'ms_sumberbeasiswa';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodesumber";
    protected $fillable = [
        'kodesumber',
        'namasumber',
        'alamat',
        'kodekota',
        'telp4',
        'fax2',
        'email',
        'homepage',
        'contactperson',
        'keterangansem',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',

    ];
}
