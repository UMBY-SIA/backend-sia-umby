<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvJabatan extends Model
{
    protected $table = 'lv_jabatan';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodejabatan";
    protected $fillable = [
        'kodejabatan',
        'namajabatan',
    ];
}
