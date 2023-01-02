<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MsRuang;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
class MsRuangController extends Controller
{
    public function index()
    {
        $data = new MsRuang;
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
            'koderuang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new MsRuang;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('koderuang','desc')->first()->koderuang;
            }
            $data = new MsRuang;
            $data->koderuang = $request->get('koderuang');
            $data->kodeunit = $request->get('kodeunit');
            $data->kodegedung = $request->get('kodegedung');
            $data->lantai = $request->get('lantai');
            $data->lokasi = $request->get('lokasi');
            $data->keterangansem = $request->get('keterangansem');
            $data->luasruangan = $request->get('luasruangan');
            $data->dayatampung = $request->get('dayatampung');
            $data->jenisruang = $request->get('jenisruang');
            $data->isaktif = $request->get('isaktif');
            $data->urutanpakai = $request->get('urutanpakai');
            $data->fungsiruang = $request->get('fungsiruang');
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
            'koderuang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsRuang::where('koderuang',$id)->update([
                'koderuang' => $request->get('koderuang'),
                'kodeunit' => $request->get('kodeunit'),
                'kodegedung' => $request->get('kodegedung'),
                'lantai' => $request->get('lantai'),
                'lokasi' => $request->get('lokasi'),
                'keterangansem' => $request->get('keterangansem'),
                'luasruangan' => $request->get('luasruangan'),
                'dayatampung' => $request->get('dayatampung'),
                'jenisruang' => $request->get('jenisruang'),
                'isaktif' => $request->get('isaktif'),
                'urutanpakai' => $request->get('urutanpakai'),
                'fungsiruang' => $request->get('fungsiruang'),
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
            MsRuang::where('koderuang',$id)->delete();
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
