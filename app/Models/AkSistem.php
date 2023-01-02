<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AkSistem extends Model
{
    protected $table = 'ak_sistem';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "sistemkuliah";
    protected $fillable = [
        'sistemkuliah',
        'namasistem',
        'tipeprogram',
        'statusprogram',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
