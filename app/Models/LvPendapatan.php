<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvPendapatan extends Model
{
    protected $table = 'lv_pendapatan';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodependapatan";
    protected $fillable = [
        'kodependapatan',
        'namapendapatan',
    ];
}
