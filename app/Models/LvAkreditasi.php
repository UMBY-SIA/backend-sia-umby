<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvAkreditasi extends Model
{
    protected $table = 'lv_akreditasi';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodeakreditasi";
    protected $fillable = [
        'kodeakreditasi',
        'keterangansem',
        'keterangansemen',
    ];
}
