<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdJmlAngsuran extends Model
{
    protected $table = 'pd_jmlangsuran';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "idjmlangsuran";
    protected $fillable = [
        'idjmlangsuran',
        'periode',
        'jmlangsuran',
        'lulusan',
        'jenisangsuran',
    ];
}
