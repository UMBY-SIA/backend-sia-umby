<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MsSettingUnit;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class MsSettingUnitController extends Controller
{
    public function index()
    {
        $data = new MsSettingUnit;
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'ulang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new MsSettingUnit;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('idsetting','desc')->first()->idsetting;
            }
            $data_sv = new MsSettingUnit;
            $data_sv->idsetting = $data + 1;
            $data_sv->sistemkuliah = $request->get('sistemkuliah');
            $data_sv->kodeunit = $request->get('kodeunit');
            $data_sv->tglawalkrs = $request->get('tglawalkrs');
            $data_sv->tglakhirkrs = $request->get('tglakhirkrs');
            $data_sv->tglakhirnilaiuts = $request->get('tglakhirnilaiuts');
            $data_sv->tglakhirnilaiuas = $request->get('tglakhirnilaiuas');
            $data_sv->tglakhirnilaiutssusulan = $request->get('tglakhirnilaiutssusulan');
            $data_sv->tglakhirnilaiuassusulan = $request->get('tglakhirnilaiuassusulan');
            $data_sv->krsisdan = $request->get('krsisdan');
            $data_sv->isijadwaldosen = $request->get('isijadwaldosen');
            $data_sv->skslulus = $request->get('skslulus');
            $data_sv->ulang = $request->get('ulang');
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

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'ulang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsSettingUnit::where('idsetting',$id)->update([
                'sistemkuliah' => $request->get('sistemkuliah'),
                'kodeunit' => $request->get('kodeunit'),
                'tglawalkrs' => $request->get('tglawalkrs'),
                'tglakhirkrs' => $request->get('tglakhirkrs'),
                'tglakhirnilaiuts' => $request->get('tglakhirnilaiuts'),
                'tglakhirnilaiuas' => $request->get('tglakhirnilaiuas'),
                'tglakhirnilaiutssusulan' => $request->get('tglakhirnilaiutssusulan'),
                'tglakhirnilaiuassusulan' => $request->get('tglakhirnilaiuassusulan'),
                'krsisdan' => $request->get('krsisdan'),
                'isijadwaldosen' => $request->get('isijadwaldosen'),
                'skslulus' => $request->get('skslulus'),
                'ulang' => $request->get('ulang'),
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
            MsSettingUnit::where('idsetting',$id)->delete();
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
