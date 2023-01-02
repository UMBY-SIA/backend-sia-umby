<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsPengalaman extends Model
{
    protected $table = 'ms_pengalaman';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "idpengalaman";
    protected $fillable = [
        'idpengalaman',
        'namapengalaman',
        'namapengalamanen',
        'judulpengalaman',
    ];
}
