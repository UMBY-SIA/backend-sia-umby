<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsKota;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MsKotaController extends Controller
{
    public function index()
    {
        $data = new MsKota;
        if (count($data->get()) > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menampilkan data',
                'data' => $data->select('ms_kota.kodekota',
                                'ms_kota.namakota',
                                'ms_propinsi.kodepropinsi',
                                'ms_propinsi.namapropinsi')
                                ->join('ms_propinsi','ms_propinsi.kodepropinsi','ms_kota.kodepropinsi')->paginate(10),
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
            'kodepropinsi' => 'required',
            'namakota' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new MsKota;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('kodekota','desc')->first()->kodekota;
            }
            $kota = new MsKota;
            $kota->kodekota = $data + 1;
            $kota->kodepropinsi = $request->get('kodepropinsi');
            $kota->namakota = $request->get('namakota');
            $kota->save();
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
            'kodepropinsi' => 'required',
            'namakota' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsKota::where('kodekota', $id)->update([
                'kodepropinsi' => $request->get('kodepropinsi'),
                'namakota' => $request->get('namakota'),
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
            MsKota::where('kodekota',$id)->delete();
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
