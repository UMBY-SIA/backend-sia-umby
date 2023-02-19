<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsMahasiswa;
use App\Models\PdInformasiDari;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RekapStatusMahasiswaController extends Controller
{
    public function index($periode,$kodeunit,$sistem,$kampus,$angkatan,$status){
        // $sql = "Select m.nim, m.mhsnama, w.isdispensasi from ms_mahasiswa m
		// 		join ak_perwalian w on w.nim = m.nim
		// 		and w.periode = "$this->db->escape($periode)."
		// 		and w.statusmhs = "$this->db->escape($status)."
		// 		where mhskodeunit = "$this->db->escape($kodeunit)."
		// 		and mhssistemkuliah = "$this->db->escape($sistem)."
		// 		and mhskodekampus = "$this->db->escape($kampus)."
		// 		and substr(mhsperiode,1,4) = ".$this->db->escape($angkatan)."
		// 		order by m.nim";

		$query = MsMahasiswa::select('m.nim','m.mhsnama','w.isdispensasi')
							->join('ak_perwalian w', 'w.nim', 'm.nim')
							->join('w.periode', $periode)
							->join('w.statusmhs',$status)
							->where('mhskodeunit',$kodeunit)
							->where('mhssistemkuliah',$sistem)
							->where('mhskodekampus',$kampus)
							->where('substr(mhsperiode,1,4)',$angkatan)
							->orderBy('m.nim')->get();
		if (count($query) != 0) {
			return response()->json([
				'status' => false,
				'message' => 'Terjadi Kesalahan',
            ], Response::HTTP_BAD_REQUEST);
		};
		return response()->json([
			'status' => true,
			'data' => $query,
        ], Response::HTTP_OK);

    }
}
