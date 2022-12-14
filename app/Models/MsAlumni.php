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
    protected $fillable = [
        'idalumni',
        'statusnikah',
        'kodekota',
        'bidangkerja',
        'kodeagama',
        'kodewn',
        'kodeunit',
        'statuskerja',
        'kotaperusahaan',
        'namaperusahaan',
        'alamatperusahaan',
        'telpperusahaan',
        'jenisinstansi',
        'jabatan',
        'pekerjaan',
        'nama',
        'gelardepan',
        'gelarbelakang',
        'sex',
        'tmplahir',
        'tgllahir',
        'goldarah',
        'alamat',
        'kodepos',
        'telp',
        'telp2',
        'hp',
        'hp2',
        'email',
        'email2',
        'noktp',
        'npwp',
        'kelurahan',
        'kecamatan',
        'tinggibadan',
        'beratbadan',
        'cacattubuh',
        'hobi',
        'noskkelbaik',
        'tglskkelbaik',
        'pejabatskkelbaik',
        'nosksehat',
        'tglsksehat',
        'pejabatsksehat',
        'nomorika',
        'nomornimlama',
        'tahunlulus',
        'ipklulus',
        'lamastudi',
        'waktutunggu',
    ];
}
