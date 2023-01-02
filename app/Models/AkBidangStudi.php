<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AkBidangStudi extends Model
{
    protected $table = 'ak_bidangstudi';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodebs";
    protected $fillable = [
        'kodebs',
        'kodeunit',
        'namabs',
        'namabsen',
    ];
}
