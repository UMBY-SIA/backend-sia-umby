<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvFrekuensiKurikulum extends Model
{
    protected $table = 'lv_frekuensikurikulum';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "frekuensikurikulum";
    protected $fillable = [
        'frekuensikurikulum',
        'keterangansem',
    ];
}
