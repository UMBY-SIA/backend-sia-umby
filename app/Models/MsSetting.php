<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsSetting extends Model
{
    protected $table = 'ms_setting';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "idsetting";
    protected $fillable = [
        'idsetting',
        'thnkurikulumsekarang',
        'periodesekarang',
        'batassksdefault',
        'nangkatutup',
        'periodenilai',
        'pesanpengesahan',
        'lintaskurikulum',
        'tglutsmulai',
        'tglutsakhir',
        'tgluasmulai',
        'tgluasakhir',
        'tglsusulanuasmulai',
        'tglsusulanuasakhir',
        'tglkuliahmulai',
        'tglkuliahakhir',
        'tglsusulanutsmulai',
        'tglsusulanutsakhir',
        'sistemkuliah',
        'syaratkehadiran',
        'tglcutimulai',
        'tglcutiakhir',
        'tglnilaiutsmulai',
        'tglnilaiutsakhir',
        'tglnilaiuasmulai',
        'tglnilaiuasakhir',
        'periodesp',
        'periodekrsta',
        'tglkoreksimulai',
        'tglkoreksiakhir',
        'tgluploadsoalmulai',
        'tgluploadsoalakhir',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
        'tgltransfermulai',
        'tgltransferakhir',
    ];
}
