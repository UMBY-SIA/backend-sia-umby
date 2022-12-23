<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvPendidikan extends Model
{
    protected $table = 'lv_pendidikan';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodependidikan";
    protected $fillable = [
        'kodependidikan',
        'namapendidikan',
        'namasingkat',
    ];
}
