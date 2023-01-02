<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class StatusNikah extends Model
{
    protected $table = 'lv_statusnikah';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "statusnikah";
    protected $fillable = [
        'statusnikah',
        'namastatus',
    ];
}
