<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdBeasiswa extends Model
{
    protected $table = 'pd_beasiswa';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "idpdbeasiswa";
    protected $fillable = [
        'idpdbeasiswa',
        'jalurpenerimaan',
        'sistemkuliah',
        'periode',
        'pdpotongan',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
