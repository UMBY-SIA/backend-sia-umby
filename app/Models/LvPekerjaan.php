<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvPekerjaan extends Model
{
    protected $table = 'lv_pekerjaan';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodepekerjaan";
    protected $fillable = [
        'kodepekerjaan',
        'namapekerjaan',
    ];
}
