<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvJabatanAkademik extends Model
{
    protected $table = 'lv_jabatanakademik';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "jabakademik";
    protected $fillable = [
        'jabakademik',
        'namajabakademik',
    ];
}
