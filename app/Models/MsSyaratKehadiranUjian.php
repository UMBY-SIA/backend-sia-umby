<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsSyaratKehadiranUjian extends Model
{
    protected $table = 'ms_syaratkehadiranujian';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodesyarat";
    protected $fillable = [
        'kodesyarat',
        'namasyarat',
        'minimal',

    ];
}
