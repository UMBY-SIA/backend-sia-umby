<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MsMahasiswa extends Model
{
    protected $table = 'ms_mahasiswa';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing  = false;
    protected $primaryKey = "nim";
    protected $fillable = [
        'nim',
        'mhsperiode',
        'mhskodeunit',
        'mhskodekurikulum',
        'mhsnama',
        'mhsgelardepan',
        'mhsgelarbelakang',
        'mhssex',
        'mhstmplahir',
        'mhskodeagama',
        'mhstgllahir',
        'mhsgoldarah',
        'mhsalamat',
        'mhskodekota',
        'mhskodepos',
        'mhskodewn',
        'mhstelp',
        'mhstelp2',
        'mhshp',
        'mhshp2',
        'mhsemail',
        'mhsemail2',
        'mhsnoktp',
        'mhsnpwp',
        'mhskelurahan',
        'mhskecamatan',
        'mhstinggibadan',
        'mhsberatbadan',
        'mhscacattubuh',
        'mhshobi',
        'mhskodependidikan',
        'mhskodepekerjaan',
        'mhsstatusnikah',
        'mhskodependapatan',
        'mhstransfer',
        'mhsjalurpenerimaan',
        'mhspenanggungdana',
        'mhsnamacpdarurat',
        'mhstelpcpdarurat',
        'mhsbiodataterisi',
        'mhsnilaitoefl',
        'mhsdatavalid',
        'mhsnimlama',
        'mhsnoijasah',
        'mhstglijasah',
        'mhsnotranskrip',
        'mhstglselesai',
        'mhsalasankeluar',
        'smuasal',
        'smualamat',
        'smukodekota',
        'smutelp',
        'smunem',
        'smunoijasah',
        'ortunamaayah',
        'ortunamaibu',
        'ortualamat',
        'ortukodekota',
        'ortukodepos',
        'ortutelp',
        'ortukodependptn',
        'ortukodepddknayah',
        'ortukodepddknibu',
        'ortukodepkrjibu',
        'ortukodepkrjayah',
        'klgnamaistrisuami',
        'klgnamaanak1',
        'klgnamaanak2',
        'klgkodepekerjpasgn',
        'klgtgllahiristrisuami',
        'klgtgllahiranak1',
        'klgtgllahiranak2',
        'klgjeniskelaminanak1',
        'klgjeniskelaminanak2',
        'mhsstatuskerja',
        'krjnamaperusahaan',
        'krjalamatperusahaan',
        'krjkodekotapersh',
        'krjtelpperusahaan',
        'krjjenisinstansi',
        'krjjabatan',
        'krjpekerjaan',
        'ptasal',
        'ptkodekota',
        'ptjurusan',
        'ptipk',
        'ptthnlulus',
        'ptsksasal',
        'ptsksdiakui',
        'regnilaimatrikulasi',
        'regtgl',
        'reggelombang',
        'regnilaispmb',
        'pdptbatasstudi',
        'pdptbiayastudi',
        'pdptjalurskripsi',
        'pdptnisn',
        'pdptkategoripenghasilan',
        'mhssistemkuliah',
        'mhskodekampus',
        'mhsstatuslulus',
        'mhskodebs',
        'mhsisalumni',
        'ptjenjangasal',
        'ptkodeasal',
        'ptkodeprodi',
        'mhsperiodeakhir',
        'mhstipepertemuan',
        'mhsisibiodata',
        'mhsdoubledegree',
        'mhsemailbenar',
        'mhsemailkey',
        'mhsbacaeval',
        'ortuemail',
        't_updateuser',
        't_updateip',
        't_updatetime',
        't_updateact',
        'kelas_malam',
        'jumlahangsuran',
        'masuktgl',

    ];
}