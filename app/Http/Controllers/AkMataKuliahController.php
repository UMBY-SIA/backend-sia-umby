<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AkMataKuliah;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AkMataKuliahController extends Controller
{
    public function index()
    {
        $data = AkMataKuliah::get();
        if (!isset($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada data.',
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil.',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kodemk' => 'required',
            'sks' => 'required',
            'tipekuliah' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);

        };
        try {
            $newAkMataKuliah = new AkMataKuliah;
            $newAkMataKuliah->kodemk = $request->get('kodemk');
            $newAkMataKuliah->nip = $request->get('nip');
            $newAkMataKuliah->kodejenis = $request->get('kodejenis');
            $newAkMataKuliah->namamk = $request->get('namamk');
            $newAkMataKuliah->namamken = $request->get('namamken');
            $newAkMataKuliah->sks = $request->get('sks');
            $newAkMataKuliah->nilaimin = $request->get('nilaimin');
            $newAkMataKuliah->abstrakmk = $request->get('abstrakmk');
            $newAkMataKuliah->sksmk = $request->get('sksmk');
            $newAkMataKuliah->skstatapmuka = $request->get('skstatapmuka');
            $newAkMataKuliah->skspraktikum = $request->get('skspraktikum');
            $newAkMataKuliah->sksprakteklapangan = $request->get('sksprakteklapangan');
            $newAkMataKuliah->sap = $request->get('sap');
            $newAkMataKuliah->silabus = $request->get('silabus');
            $newAkMataKuliah->bahanajar = $request->get('bahanajar');
            $newAkMataKuliah->diktat = $request->get('diktat');
            $newAkMataKuliah->tglmulaiefektif = $request->get('tglmulaiefektif') != '' ? $request->get('tglmulaiefektif') : null;
            $newAkMataKuliah->tglakhirefektif = $request->get('tglakhirefektif') != '' ? $request->get('tglakhirefektif') : null;
            $newAkMataKuliah->tipekuliah = $request->get('tipekuliah');
            $newAkMataKuliah->skslulusmin = $request->get('skslulusmin');
            $newAkMataKuliah->filesapmk = $request->get('filesapmk');
            $newAkMataKuliah->t_updateuser = $request->get('t_updateuser');
            $newAkMataKuliah->t_updateip = $request->ip();
            $newAkMataKuliah->t_updatetime = Carbon::now();
            $newAkMataKuliah->t_updateact = $request->get('t_updateact');
            $newAkMataKuliah->save();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data.',
            ],Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        } catch (QueryException $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }

    public function show(Request $request)
    {
        try {
            $data = AkMataKuliah::where('kodemk',$request->get('kodemk'))->first();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil mendapatkan data.',
                'data' => $data,
            ],Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        } catch (QueryException $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kodemk' => 'required',
            'sks' => 'required',
            'tipekuliah' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);

        };
        try {
            AkMataKuliah::where('kodemk',$request->get('idmk'))->update([
                'kodemk' => $request->get('kodemk'),
                'nip' => $request->get('nip'),
                'kodejenis' => $request->get('kodejenis'),
                'namamk' => $request->get('namamk'),
                'namamken' => $request->get('namamken'),
                'sks' => $request->get('sks'),
                'nilaimin' => $request->get('nilaimin'),
                'abstrakmk' => $request->get('abstrakmk'),
                'sksmk' => $request->get('sksmk'),
                'skstatapmuka' => $request->get('skstatapmuka'),
                'skspraktikum' => $request->get('skspraktikum'),
                'sksprakteklapangan' => $request->get('sksprakteklapangan'),
                'sap' => $request->get('sap'),
                'silabus' => $request->get('silabus'),
                'bahanajar' => $request->get('bahanajar'),
                'diktat' => $request->get('diktat'),
                'tglmulaiefektif' => $request->get('tglmulaiefektif') != '' ? $request->get('tglmulaiefektif') : null,
                'tglakhirefektif' =>$request->get('tglakhirefektif') != '' ? $request->get('tglakhirefektif') : null,
                'tipekuliah' => $request->get('tipekuliah'),
                'skslulusmin' => $request->get('skslulusmin'),
                'filesapmk' => $request->get('filesapmk'),
                't_updateuser' => $request->get('t_updateuser'),
                't_updateip' => $request->ip(),
                't_updatetime' => Carbon::now(),
                't_updateact' => $request->get('t_updateact'),
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengganti data.',
            ],Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        } catch (QueryException $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }

    public function delete(Request $request)
    {
        try {
            AkMataKuliah::where('kodemk',$request->get('idmk'))->delete();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Berhasil menghapus data',
                ],Response::HTTP_OK);

        } catch (Exception $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()],Response::HTTP_BAD_REQUEST);
        } catch (QueryException $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()],Response::HTTP_BAD_REQUEST);
        }
    }
}
