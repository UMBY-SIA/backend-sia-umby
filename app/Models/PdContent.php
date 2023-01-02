<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdContent extends Model
{
    protected $table = 'pd_content';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodecontent";
    protected $fillable = [
        'kodecontent',
        'menu',
        'sistemkuliah',
        'judul',
        'isi',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
    ];
}
