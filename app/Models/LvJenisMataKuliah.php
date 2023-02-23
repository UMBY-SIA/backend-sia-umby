<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvJenisMataKuliah extends Model
{
    protected $table = 'lv_jenismk';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodejenis";
    protected $fillable = [
        'kodejenis',
        'namajenis',
        'urutan',
        'keterangan',
    ];
}
