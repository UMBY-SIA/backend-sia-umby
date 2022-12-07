<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LvAgama extends Model
{
    protected $table = 'lv_agama';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodeagama";
}
