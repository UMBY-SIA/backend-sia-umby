<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdLibrary extends Model
{
    protected $table = 'pd_library';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodelibrary";
    protected $fillable = [
        'kodelibrary',
        'namafile',
        'url',
        'sistemkuliah',
        'filetype',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
