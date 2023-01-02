<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsAlumni;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AlumniController extends Controller
{
    public function index()
    {
        $data = new MsAlumni;
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

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "statusnikah" => "required",
            "kodekota" => "required",
            "bidangkerja" => "required",
            "kodeagama" => "required",
            "kodewn" => "required",
            "kodeunit" => "required",
            "statuskerja" => "required",
            "kotaperusahaan" => "required",
            "namaperusahaan" => "required",
            "alamatperusahaan" => "required",
            "telpperusahaan" => "required",
            "jenisinstansi" => "required",
            "jabatan" => "required",
            "pekerjaan" => "required",
            "nama" => "required",
            "gelardepan" => "required",
            "gelarbelakang" => "required",
            "sex" => "required",
            "tmplahir" => "required",
            "tgllahir" => "required",
            "goldarah" => "required",
            "alamat" => "required",
            "kodepos" => "required",
            "telp" => "required",
            "telp2" => "required",
            "hp" => "required",
            "hp2" => "required",
            "email" => "required",
            "email2" => "required",
            "noktp" => "required",
            "npwp" => "required",
            "kelurahan" => "required",
            "kecamatan" => "required",
            "tinggibadan" => "required",
            "beratbadan" => "required",
            "cacattubuh" => "required",
            "hobi" => "required",
            "noskkelbaik" => "required",
            "tglskkelbaik" => "required",
            "pejabatskkelbaik" => "required",
            "nosksehat" => "required",
            "tglsksehat" => "required",
            "pejabatsksehat" => "required",
            "nomorika" => "required",
            "nomornimlama" => "required",
            "tahunlulus" => "required",
            "ipklulus" => "required",
            "lamastudi" => "required",
            "waktutunggu" => "required",

        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        try {
            $id = IdGenerator::generate(['table' => 'ms_alumni','field' => 'idalumni', 'length' => 6, 'prefix' =>date('m')]);
            $add = new MsAlumni;
            $add->idalumni =  $id;
            $add->statusnikah = $request->get('statusnikah');
            $add->kodekota = $request->get('kodekota');
            $add->bidangkerja = $request->get('bidangkerja');
            $add->kodeagama = $request->get('kodeagama');
            $add->kodewn = $request->get('kodewn');
            $add->kodeunit = $request->get('kodeunit');
            $add->statuskerja = $request->get('statuskerja');
            $add->kotaperusahaan = $request->get('kotaperusahaan');
            $add->namaperusahaan = $request->get('namaperusahaan');
            $add->alamatperusahaan = $request->get('alamatperusahaan');
            $add->telpperusahaan = $request->get('telpperusahaan');
            $add->jenisinstansi = $request->get('jenisinstansi');
            $add->jabatan = $request->get('jabatan');
            $add->pekerjaan = $request->get('pekerjaan');
            $add->nama = $request->get('nama');
            $add->gelardepan = $request->get('gelardepan');
            $add->gelarbelakang = $request->get('gelarbelakang');
            $add->sex = $request->get('sex');
            $add->tmplahir = $request->get('tmplahir');
            $add->tgllahir = $request->get('tgllahir');
            $add->goldarah = $request->get('goldarah');
            $add->alamat = $request->get('alamat');
            $add->kodepos = $request->get('kodepos');
            $add->telp = $request->get('telp');
            $add->telp2 = $request->get('telp2');
            $add->hp = $request->get('hp');
            $add->hp2 = $request->get('hp2');
            $add->email = $request->get('email');
            $add->email2 = $request->get('email2');
            $add->noktp = $request->get('noktp');
            $add->npwp = $request->get('npwp');
            $add->kelurahan = $request->get('kelurahan');
            $add->kecamatan = $request->get('kecamatan');
            $add->tinggibadan = $request->get('tinggibadan');
            $add->beratbadan = $request->get('beratbadan');
            $add->cacattubuh = $request->get('cacattubuh');
            $add->hobi = $request->get('hobi');
            $add->noskkelbaik = $request->get('noskkelbaik');
            $add->tglskkelbaik = $request->get('tglskkelbaik');
            $add->pejabatskkelbaik = $request->get('pejabatskkelbaik');
            $add->nosksehat = $request->get('nosksehat');
            $add->tglsksehat = $request->get('tglsksehat');
            $add->pejabatsksehat = $request->get('pejabatsksehat');
            $add->nomorika = $request->get('nomorika');
            $add->nomornimlama = $request->get('nomornimlama');
            $add->tahunlulus = $request->get('tahunlulus');
            $add->ipklulus = $request->get('ipklulus');
            $add->lamastudi = $request->get('lamastudi');
            $add->waktutunggu = $request->get('waktutunggu');
            $add->save();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Berhasil menambahkan data',
                ],Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan', 'detail' => [$e->getMessage()]]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Terjadi kesalahan', 'detail' => $e->getMessage()]);

        }
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            "statusnikah" => "required",
            "kodekota" => "required",
            "bidangkerja" => "required",
            "kodeagama" => "required",
            "kodewn" => "required",
            "kodeunit" => "required",
            "statuskerja" => "required",
            "kotaperusahaan" => "required",
            "namaperusahaan" => "required",
            "alamatperusahaan" => "required",
            "telpperusahaan" => "required",
            "jenisinstansi" => "required",
            "jabatan" => "required",
            "pekerjaan" => "required",
            "nama" => "required",
            "gelardepan" => "required",
            "gelarbelakang" => "required",
            "sex" => "required",
            "tmplahir" => "required",
            "tgllahir" => "required",
            "goldarah" => "required",
            "alamat" => "required",
            "kodepos" => "required",
            "telp" => "required",
            "telp2" => "required",
            "hp" => "required",
            "hp2" => "required",
            "email" => "required",
            "email2" => "required",
            "noktp" => "required",
            "npwp" => "required",
            "kelurahan" => "required",
            "kecamatan" => "required",
            "tinggibadan" => "required",
            "beratbadan" => "required",
            "cacattubuh" => "required",
            "hobi" => "required",
            "noskkelbaik" => "required",
            "tglskkelbaik" => "required",
            "pejabatskkelbaik" => "required",
            "nosksehat" => "required",
            "tglsksehat" => "required",
            "pejabatsksehat" => "required",
            "nomorika" => "required",
            "nomornimlama" => "required",
            "tahunlulus" => "required",
            "ipklulus" => "required",
            "lamastudi" => "required",
            "waktutunggu" => "required",

        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        try {
            MsAlumni::find($id)->update([
                'statusnikah' => $request->get('statusnikah'),
                'kodekota' => $request->get('kodekota'),
                'bidangkerja' => $request->get('bidangkerja'),
                'kodeagama' => $request->get('kodeagama'),
                'kodewn' => $request->get('kodewn'),
                'kodeunit' => $request->get('kodeunit'),
                'statuskerja' => $request->get('statuskerja'),
                'kotaperusahaan' => $request->get('kotaperusahaan'),
                'namaperusahaan' => $request->get('namaperusahaan'),
                'alamatperusahaan' => $request->get('alamatperusahaan'),
                'telpperusahaan' => $request->get('telpperusahaan'),
                'jenisinstansi' => $request->get('jenisinstansi'),
                'jabatan' => $request->get('jabatan'),
                'pekerjaan' => $request->get('pekerjaan'),
                'nama' => $request->get('nama'),
                'gelardepan' => $request->get('gelardepan'),
                'gelarbelakang' => $request->get('gelarbelakang'),
                'sex' => $request->get('sex'),
                'tmplahir' => $request->get('tmplahir'),
                'tgllahir' => $request->get('tgllahir'),
                'goldarah' => $request->get('goldarah'),
                'alamat' => $request->get('alamat'),
                'kodepos' => $request->get('kodepos'),
                'telp' => $request->get('telp'),
                'telp2' => $request->get('telp2'),
                'hp' => $request->get('hp'),
                'hp2' => $request->get('hp2'),
                'email' => $request->get('email'),
                'email2' => $request->get('email2'),
                'noktp' => $request->get('noktp'),
                'npwp' => $request->get('npwp'),
                'kelurahan' => $request->get('kelurahan'),
                'kecamatan' => $request->get('kecamatan'),
                'tinggibadan' => $request->get('tinggibadan'),
                'beratbadan' => $request->get('beratbadan'),
                'cacattubuh' => $request->get('cacattubuh'),
                'hobi' => $request->get('hobi'),
                'noskkelbaik' => $request->get('noskkelbaik'),
                'tglskkelbaik' => $request->get('tglskkelbaik'),
                'pejabatskkelbaik' => $request->get('pejabatskkelbaik'),
                'nosksehat' => $request->get('nosksehat'),
                'tglsksehat' => $request->get('tglsksehat'),
                'pejabatsksehat' => $request->get('pejabatsksehat'),
                'nomorika' => $request->get('nomorika'),
                'nomornimlama' => $request->get('nomornimlama'),
                'tahunlulus' => $request->get('tahunlulus'),
                'ipklulus' => $request->get('ipklulus'),
                'lamastudi' => $request->get('lamastudi'),
                'waktutunggu' => $request->get('waktutunggu'),
                't_updateuser' => $request->get('user'),
                't_updateip' => $request->ip(),
                't_updatetime' => Carbon::now(),
            ]);
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Berhasil mengganti data',
                ],Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan', 'detail' => [$e->getMessage()]]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Terjadi kesalahan', 'detail' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            MsAlumni::where('idalumni',$id)->delete();
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

}
