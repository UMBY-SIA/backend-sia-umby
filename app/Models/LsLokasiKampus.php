<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LsLokasiKampus extends Model
{
    protected $table = 'lv_lokasikampus';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodekampus";
    protected $fillable = [
        'kodekampus',
        'kampus',
        'alamatkmp',
        'telpkmp',
        'faxkmp',
        'kodepmb',
    ];
}
