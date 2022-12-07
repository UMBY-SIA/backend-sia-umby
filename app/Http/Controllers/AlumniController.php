<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsAlumni;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
                'data' => $data->paginate(10),
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
        // $validator = Validator::make($request->all(), [
        //     "statusnikah" => "qwwq",
        //     "kodekota" => "",
        //     "bidangkerja" => "",
        //     "kodeagama" => "",
        //     "kodewn" => "",
        //     "kodeunit" => "",
        //     "statuskerja" => "",
        //     "kotaperusahaan" => "",
        //     "namaperusahaan" => "",
        //     "alamatperusahaan" => "",
        //     "telpperusahaan" => "",
        //     "jenisinstansi" => "",
        //     "jabatan" => "",
        //     "pekerjaan" => "",
        //     "nama" => "",
        //     "gelardepan" => "",
        //     "gelarbelakang" => "",
        //     "sex" => "",
        //     "tmplahir" => "",
        //     "tgllahir" => "",
        //     "goldarah" => "",
        //     "alamat" => "",
        //     "kodepos" => "",
        //     "telp" => "",
        //     "telp2" => "",
        //     "hp" => "",
        //     "hp2" => "",
        //     "email" => "",
        //     "email2" => "",
        //     "noktp" => "",
        //     "npwp" => "",
        //     "kelurahan" => "",
        //     "kecamatan" => "",
        //     "tinggibadan" => "",
        //     "beratbadan" => "",
        //     "cacattubuh" => "",
        //     "hobi" => "",
        //     "noskkelbaik" => "",
        //     "tglskkelbaik" => "",
        //     "pejabatskkelbaik" => "",
        //     "nosksehat" => "",
        //     "tglsksehat" => "",
        //     "pejabatsksehat" => "",
        //     "nomorika" => "",
        //     "nomornimlama" => "",
        //     "tahunlulus" => "",
        //     "ipklulus" => "",
        //     "lamastudi" => "",
        //     "waktutunggu" => "",

        // ]);
        try {
            $id = IdGenerator::generate(['table' => 'ms_alumni','field' => 'idalumni', 'length' => 6, 'prefix' =>date('y')]);
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

        } catch (Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan', 'detail' => [$e->getMessage()]]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Terjadi kesalahan', 'detail' => $e->getMessage()]);

        }


    }
}
