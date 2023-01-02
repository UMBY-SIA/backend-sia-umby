<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsJabatan;
use Carbon\Carbon;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class MsPejabatController extends Controller
{
    public function index()
    {
        $data = new MsJabatan;
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
        $validator = Validator::make($request->all(),[
            'kodeunit' => 'required|max:10',
            'kodejabatan' => 'required|max:10',
            'nip' => 'required|max:20',
            'namapegawai' => 'required|max:100',
            'sistemkuliah' => 'required',
            'kodekampus' => 'required|max:10',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = IdGenerator::generate(['table' => 'ms_pejabat','field' => 'idpejabat','length' => 10, 'prefix' =>date('m')]);

            $pejabat = new MsJabatan;
            $pejabat->idpejabat = $id;
            $pejabat->kodeunit = $request->get('kodeunit');
            $pejabat->kodejabatan = $request->get('kodejabatan');
            $pejabat->nip = $request->get('nip');
            $pejabat->namapegawai = $request->get('namapegawai');
            $pejabat->sistemkuliah = $request->get('sistemkuliah');
            $pejabat->kodekampus = $request->get('kodekampus');
            $pejabat->save();
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
            'kodeunit' => 'required|max:10',
            'kodejabatan' => 'required|max:10',
            'nip' => 'required|max:20',
            'namapegawai' => 'required|max:100',
            'sistemkuliah' => 'required',
            'kodekampus' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsJabatan::where('idpejabat',$id)->update([
                'kodeunit' => $request->get('kodeunit'),
                'kodejabatan' => $request->get('kodejabatan'),
                'nip' => $request->get('nip'),
                'namapegawai' => $request->get('namapegawai'),
                'sistemkuliah' => $request->get('sistemkuliah'),
                'kodekampus' => $request->get('kodekampus'),
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
            MsJabatan::where('idpejabat',$id)->delete();
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
