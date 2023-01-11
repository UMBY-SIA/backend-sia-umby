<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdNomorKategori extends Model
{
    protected $table = 'pd_nomorkategori';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodenokategori";
    protected $fillable = [
        'kodenokategori',
        'nokategori',
    ];
}
