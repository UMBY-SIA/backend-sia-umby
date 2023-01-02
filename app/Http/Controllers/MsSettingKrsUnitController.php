<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MsSettingKrsUnit;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
class MsSettingKrsUnitController extends Controller
{
    public function index()
    {
        $data = new MsSettingKrsUnit;
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
            'idsetting' => 'required',
            'batal' => 'required',
            'periode' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new MsSettingKrsUnit;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('idsetting','desc')->first()->idsetting;
            }
            $data = new MsSettingKrsUnit;
            $data->idsetting = $request->get('idsetting');
            $data->sistemkuliah = $request->get('sistemkuliah');
            $data->kodeunit = $request->get('kodeunit');
            $data->tglawalkrs = $request->get('tglawalkrs');
            $data->tglakhirkrs = $request->get('tglakhirkrs');
            $data->batal = $request->get('batal');
            $data->periode = $request->get('periode');
            $data->save();
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
            'idsetting' => 'required',
            'batal' => 'required',
            'periode' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsSettingKrsUnit::where('idsetting',$id)->update([
                'idsetting' => $request->get('idsetting'),
                'sistemkuliah' => $request->get('sistemkuliah'),
                'kodeunit' => $request->get('kodeunit'),
                'tglawalkrs' => $request->get('tglawalkrs'),
                'tglakhirkrs' => $request->get('tglakhirkrs'),
                'batal' => $request->get('batal'),
                'periode' => $request->get('periode'),
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
            MsSettingKrsUnit::where('idsetting',$id)->delete();
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
