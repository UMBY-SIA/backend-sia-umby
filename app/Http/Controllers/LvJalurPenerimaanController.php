<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LvJalurPenerimaan;
use Carbon\Carbon;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LvJalurPenerimaanController extends Controller
{
    public function index()
    {
        $data = new LvJalurPenerimaan;
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
            'namajalur' => 'required',
            'keterangan' => 'required',
            'kodejenisjalur' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = IdGenerator::generate(['table' => 'lv_jalurpenerimaan','field' => 'jalurpenerimaan','length' => 5, 'prefix' =>'JP'.date('m')]);
            $LvJalurPenerimaan = new LvJalurPenerimaan;
            $LvJalurPenerimaan->jalurpenerimaan = $id;
            $LvJalurPenerimaan->namajalur = $request->get('namajalur');
            $LvJalurPenerimaan->keterangan = $request->get('keterangan');
            $LvJalurPenerimaan->kodejenisjalur = $request->get('kodejenisjalur');
            $LvJalurPenerimaan->save();
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
            'namajalur' => 'required',
            'keterangan' => 'required',
            'kodejenisjalur' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            LvJalurPenerimaan::where('jalurpenerimaan',$id)->update([
                'namajalur' => $request->get('namajalur'),
                'keterangan' => $request->get('keterangan'),
                'kodejenisjalur' => $request->get('kodejenisjalur'),
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
            LvJalurPenerimaan::where('jalurpenerimaan',$id)->delete();
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
