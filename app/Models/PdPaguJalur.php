<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdPaguJalur extends Model
{
    protected $table = 'pd_pagujalur';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "jalurpenerimaan";
    protected $fillable = [
        'jalurpenerimaan',
        'kodeunit',
        'periodedaftar',
        'pagujalur',
    ];
}
