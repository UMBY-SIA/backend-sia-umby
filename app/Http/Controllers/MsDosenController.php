<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MsDosen;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use DB;
class MsDosenController extends Controller
{
    public function getList(Request $request)
    {
        $data = DB::table('peg.ms_pegawai')
                    ->leftjoin('gate.ms_unit', 'peg.ms_pegawai.kodeunit', '=', 'gate.ms_unit.kodeunit');
                    // dd($data->get());
        if (count($data->get()) > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan data',
                'data' => $data->get(),
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada data',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getListFilter(Request $request)
    {
        $text = $request->text;
        $data = DB::table('peg.ms_pegawai')
                ->selectraw('nip, f_namalengkap(gelardepan,nama,gelarbelakang) as nama, sex, namaunit')
                ->leftjoin('gate.ms_unit', 'peg.ms_pegawai.kodeunit', '=', 'gate.ms_unit.kodeunit')
                ->where('peg.nip', $text)
                ->orwhere('peg.nama', $text)
                ->orwhere('gate.ms_unit', $text);
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
        // $validator = Validator::make($request->all(),[
        //     'nim' => 'required',
        //     'kodekelas' => 'required',
        //     'lulus' => 'required',
        //     'dipakai' => 'required',
        //     'nilaimasuk' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        // }
        
        try {

            $data_sv = new MsDosen;
            $data_sv->nip = $request->get('nip');
            $data_sv->kodeunit = $request->get('kodeunit');
            $data_sv->nama = $request->get('nama');
            $data_sv->gelardepan = $request->get('gelardepan');
            $data_sv->gelarbelakang = $request->get('gelarbelakang');
            $data_sv->sex = $request->get('sex');
            $data_sv->tmplahir = $request->get('tmplahir');
            $data_sv->tgllahir = $request->get('tgllahir');
            $data_sv->goldarah = $request->get('goldarah');
            $data_sv->alamat = $request->get('alamat');
            $data_sv->kodepos = $request->get('kodepos');
            $data_sv->telp = $request->get('telp');
            $data_sv->telp2 = $request->get('telp2');
            $data_sv->hp = $request->get('hp');
            $data_sv->hp2 = $request->get('hp2');
            $data_sv->email = $request->get('email');
            $data_sv->email2 = $request->get('email2');
            $data_sv->noktp = $request->get('noktp');
            $data_sv->npwp = $request->get('npwp');
            $data_sv->kelurahan = $request->get('kelurahan');
            $data_sv->kecamatan = $request->get('kecamatan');
            $data_sv->tinggibadan = $request->get('tinggibadan');
            $data_sv->beratbadan = $request->get('beratbadan');
            $data_sv->cacattubuh = $request->get('cacattubuh');
            $data_sv->hobi = $request->get('hobi');
            $data_sv->noskkelbaik = $request->get('noskkelbaik');
            $data_sv->tglskkelbaik = $request->get('tglskkelbaik');
            $data_sv->pejabatskkelbaik = $request->get('pejabatskkelbaik');
            $data_sv->nosksehat = $request->get('nosksehat');
            $data_sv->tglsksehat = $request->get('tglsksehat');
            $data_sv->pejabatsksehat = $request->get('pejabatsksehat');
            $data_sv->nidn = $request->get('nidn');
            $data_sv->nidnnew = $request->get('nidnnew');
            $data_sv->kodependapatan = $request->get('kodependapatan');
            $data_sv->kodekota = $request->get('kodekota');
            $data_sv->statustetap = $request->get('statustetap');
            $data_sv->kodeagama = $request->get('kodeagama');
            $data_sv->kodewn = $request->get('kodewn');
            $data_sv->tipepeg = $request->get('tipepeg');
            $data_sv->statuspeg = $request->get('statuspeg');
            $data_sv->statusnikah = $request->get('statusnikah');
            $data_sv->kodepekrjstrisuami = $request->get('kodepekrjstrisuami');
            $data_sv->namaistrisuami = $request->get('namaistrisuami');
            $data_sv->namaanak1 = $request->get('namaanak1');
            $data_sv->namaanak2 = $request->get('namaanak2');
            $data_sv->tgllahiristrisuami = $request->get('tgllahiristrisuami');
            $data_sv->tgllahiranak1 = $request->get('tgllahiranak1');
            $data_sv->tgllahiranak2 = $request->get('tgllahiranak2');
            $data_sv->jeniskelaministrisuami = $request->get('jeniskelaministrisuami');
            $data_sv->jeniskelaminanak1 = $request->get('jeniskelaminanak1');
            $data_sv->jeniskelaminanak2 = $request->get('jeniskelaminanak2');
            $data_sv->norekening = $request->get('norekening');
            $data_sv->namabank = $request->get('namabank');
            $data_sv->namacabang = $request->get('namacabang');
            $data_sv->catatankhusus = $request->get('catatankhusus');
            $data_sv->rekatasnama = $request->get('rekatasnama');
            $data_sv->nik = $request->get('nik');
            $data_sv->nilai_toefl = $request->get('nilai_toefl');
            $data_sv->jabstruktural = $request->get('jabstruktural');
            $data_sv->jabakademik = $request->get('jabakademik');
            $data_sv->penddosen = $request->get('penddosen');
            $data_sv->save();
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
}
