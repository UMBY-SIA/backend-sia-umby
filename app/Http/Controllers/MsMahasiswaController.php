<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AkBidangStudi;
use App\Models\MsMahasiswa;
use Carbon\Carbon;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class MsMahasiswaController extends Controller
{
    public function index()
    {
        $data = new MsMahasiswa;
        if (count($data->get()) > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan data',
                'data' => $data->all(),
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada data',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(Request $request)
    {
        $tahun = substr($request->get('mhsperiode'), 2, 2);
        $getbulan = date('m', strtotime($request->get('masuktgl')));
        $kodeProdi = $request->get('mhskodebs');
        $statusStudi = $request->get('');

        return $this->generateNIM($tahun,$kodeProdi,null,null,null,null);
        $validator = Validator::make($request->all(),[
            'nim' => 'required',
            'mhsperiode' => 'required',  //relasi dengan table ms_periode - periode
            'mhskodeunit' => 'required', //relasi dengan table ms_unit - kodeunit (gate)
            'mhskodekurikulum' => 'required', //relasi dengan table ak_jeniskurikulum - kodekurikulum
            'mhsnama' => 'required',
            'mhsgelardepan' => 'required',
            'mhsgelarbelakang' => 'required',
            'mhssex' => 'required',
            'mhstmplahir' => 'required',
            'mhskodeagama' => 'required', //relasi dengan lv_agama - kodeagama
            'mhstgllahir' => 'required',
            'mhsgoldarah' => 'required',
            'mhsalamat' => 'required',
            'mhskodekota' => 'required', //relasi dengan mhskodekota - kodekota
            'mhskodepos' => 'required',
            'mhskodewn' => 'required', //relasi dengan table lv_warganegara - kodewn
            'mhstelp' => 'required',
            'mhstelp2' => 'required',
            'mhshp' => 'required',
            'mhshp2' => 'required',
            'mhsemail' => 'required',
            'mhsemail2' => 'required',
            'mhsnoktp' => 'required',
            'mhsnpwp' => 'required',
            'mhskelurahan' => 'required',
            'mhskecamatan' => 'required',
            'mhstinggibadan' => 'required',
            'mhsberatbadan' => 'required',
            'mhscacattubuh' => 'required',
            'mhshobi' => 'required',
            'mhskodependidikan' => 'required', //relasi dengan table lv_pendidikan - kodependidikan
            'mhskodepekerjaan' => 'required', //relasi dengan table lv_pekerjaan - kodepekerjaan
            'mhsstatusnikah' => 'required', //relasi dengan table lv_statusnikah - statusnikah
            'mhskodependapatan' => 'required', //relasi dengan table lv_pendapatan - kodependapatan
            'mhstransfer' => 'required',
            'mhsjalurpenerimaan' => 'required',
            'mhspenanggungdana' => 'required',
            'mhsnamacpdarurat' => 'required',
            'mhstelpcpdarurat' => 'required',
            'mhsbiodataterisi' => 'required',
            'mhsnilaitoefl' => 'required',
            'mhsdatavalid' => 'required',
            'mhsnimlama' => 'required',
            'mhsnoijasah' => 'required',
            'mhstglijasah' => 'required',
            'mhsnotranskrip' => 'required',
            'mhstglselesai' => 'required',
            'mhsalasankeluar' => 'required',
            'smuasal' => 'required',
            'smualamat' => 'required',
            'smukodekota' => 'required', //relasi dengan table ms_kota - kodekota
            'smutelp' => 'required',
            'smunem' => 'required',
            'smunoijasah' => 'required',
            'ortunamaayah' => 'required',
            'ortunamaibu' => 'required',
            'ortualamat' => 'required',
            'ortukodekota' => 'required', //relasi dengan table ms_kota - kodekota
            'ortukodepos' => 'required',
            'ortutelp' => 'required',
            'ortukodependptn' => 'required', //relasi dengan table  lv_pendapatan - kodependapatan
            'ortukodepddknayah' => 'required', //relasi dengan table lv_pendidikan - kodependidikan
            'ortukodepddknibu' => 'required', //relasi dengan table lv_pendidikan - kodependidikan
            'ortukodepkrjibu' => 'required', // relasi dengan table lv_pekerjaan - kodepekerjaan
            'ortukodepkrjayah' => 'required', //relasi dengan table lv_pekerjaan - kodepekerjaan
            'klgnamaistrisuami' => 'required',
            'klgnamaanak1' => 'required',
            'klgnamaanak2' => 'required',
            'klgkodepekerjpasgn' => 'required', // relasi dengan table lv_pekerjaan-kode_pekerjaan
            'klgtgllahiristrisuami' => 'required',
            'klgtgllahiranak1' => 'required',
            'klgtgllahiranak2' => 'required',
            'klgjeniskelaminanak1' => 'required',
            'klgjeniskelaminanak2' => 'required',
            'mhsstatuskerja' => 'required',
            'krjnamaperusahaan' => 'required',
            'krjalamatperusahaan' => 'required',
            'krjkodekotapersh' => 'required', // relasi dengan table ms_kota-kode_kota
            'krjtelpperusahaan' => 'required',
            'krjjenisinstansi' => 'required',
            'krjjabatan' => 'required',
            'krjpekerjaan' => 'required',
            'ptasal' => 'required',
            'ptkodekota' => 'required', //relasi dengan table ms_kota - kodekota
            'ptjurusan' => 'required',
            'ptipk' => 'required',
            'ptthnlulus' => 'required',
            'ptsksasal' => 'required',
            'ptsksdiakui' => 'required',
            'regnilaimatrikulasi' => 'required',
            'regtgl' => 'required',
            'reggelombang' => 'required',
            'regnilaispmb' => 'required',
            'pdptbatasstudi' => 'required',
            'pdptbiayastudi' => 'required',
            'pdptjalurskripsi' => 'required',
            'pdptnisn' => 'required',
            'pdptkategoripenghasilan' => 'required',
            'mhssistemkuliah' => 'required', // relasi dengan table ak_sistem - sistemkuliah
            'mhskodekampus' => 'required',
            'mhsstatuslulus' => 'required',
            'mhskodebs' => 'required', //relasi dengan table ak_bidangstudi - kodebs
            'mhsisalumni' => 'required',
            'ptjenjangasal' => 'required',
            'ptkodeasal' => 'required',
            'ptkodeprodi' => 'required',
            'mhsperiodeakhir' => 'required',
            'mhstipepertemuan' => 'required',
            'mhsisibiodata' => 'required',
            'mhsdoubledegree' => 'required',
            'mhsemailbenar' => 'required',
            'mhsemailkey' => 'required',
            'mhsbacaeval' => 'required',
            'ortuemail' => 'required',
            't_updateuser' => 'required',
            't_updateip' => 'required',
            't_updatetime' => 'required',
            't_updateact' => 'required',
            'kelas_malam' => 'required',
            'jumlahangsuran' => 'required',
            'masuktgl' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = IdGenerator::generate(['table' => 'ak_bidangstudi','field' => 'kodebs','length' => 5, 'prefix' =>date('m')]);

            $mahasiswa = new MsMahasiswa;
            $mahasiswa->kodebs = $id;
            $mahasiswa->kodeunit = $request->get('kodeunit');
            $mahasiswa->namabs = $request->get('namabs');
            $mahasiswa->namabsen = $request->get('namabsen');
            $mahasiswa->save();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Berhasil menambahkan data',
                ],Response::HTTP_OK);

        } catch (Exception $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        } catch (QueryException $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'kodeunit' => 'required',
            'namabs' => 'required',
            'namabsen' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsMahasiswa::where('kodebs',$id)->update([
                'namabs' => $request->get('namabs'),
                'namabsen' => $request->get('namabsen'),
                't_updateuser' => $request->get('user'),
                't_updateip' => $request->ip(),
                't_updatetime' => Carbon::now(),
            ]);

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Berhasil mengganti data',
                ],Response::HTTP_OK);

        } catch (Exception $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        } catch (QueryException $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            MsMahasiswa::where('kodebs',$id)->delete();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Berhasil menghapus data',
                ],Response::HTTP_OK);

        } catch (Exception $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        } catch (QueryException $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function generateNIM($tahun, $program_studi, $status_studi, $nomor_urut, $status_kuliah)
    {
        return $tahun.$program_studi.$status_studi.$nomor_urut.$status_kuliah;
    }
}
