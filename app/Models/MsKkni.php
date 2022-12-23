<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsKkni extends Model
{
    protected $table = 'ms_kkni';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    // protected $primaryKey = "kodeunit";
    protected $fillable = [
        'pendidikanasal',
        'pendidikantempuh',
        'levels',
    ];
}
