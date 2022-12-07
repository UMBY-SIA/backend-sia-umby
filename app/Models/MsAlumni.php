<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsAlumni extends Model
{
    protected $table = 'ms_alumni';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "idalumni";
}
