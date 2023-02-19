<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PdInformasiDari extends Model
{
    protected $table = 'pd_informasidari';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "kodeinformasi";
    protected $fillable = [
        'kodeinformasi',
        'informasidari',
    ];

    public function testqw()
    {

    }
}
