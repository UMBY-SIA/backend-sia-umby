<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvJabatanStruktural extends Model
{
    protected $table = 'lv_jabatanstruktural';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "jabstruktural";
    protected $fillable = [
        'jabstruktural',
        'namajabstruktural',
    ];
}
