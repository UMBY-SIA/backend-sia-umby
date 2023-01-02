<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsProgramPend;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MsProgramPendController extends Controller
{
    public function index()
    {
        $data = new MsProgramPend;
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
            'namaprogram' => 'required|max:100',
            'masastudimax' => 'required',
            'kodenim' => 'required',
            'namalengkap' => 'required|max:100',
            'namaprogramen' => 'required|max:100',
            'kodepmb' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new MsProgramPend;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('programpend','desc')->first()->programpend;
            }
            $ProgramPend = new MsProgramPend;
            $ProgramPend->programpend =  $data + 1;
            $ProgramPend->namaprogram = $request->get('namaprogram');
            $ProgramPend->masastudimax = $request->get('masastudimax');
            $ProgramPend->kodenim = $request->get('kodenim');
            $ProgramPend->namalengkap = $request->get('namalengkap');
            $ProgramPend->namaprogramen = $request->get('namaprogramen');
            $ProgramPend->kodepmb = $request->get('kodepmb');
            $ProgramPend->save();
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
            'namaprogram' => 'required|max:100',
            'masastudimax' => 'required',
            'kodenim' => 'required',
            'namalengkap' => 'required|max:100',
            'namaprogramen' => 'required|max:100',
            'kodepmb' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsProgramPend::where('programpend',$id)->update([
                'namaprogram' => $request->get('namaprogram'),
                'masastudimax' => $request->get('masastudimax'),
                'kodenim' => $request->get('kodenim'),
                'namalengkap' => $request->get('namalengkap'),
                'namaprogramen' => $request->get('namaprogramen'),
                'kodepmb' => $request->get('kodepmb'),
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
            MsProgramPend::where('programpend',$id)->delete();
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
