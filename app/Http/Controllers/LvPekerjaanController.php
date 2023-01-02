<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LvPekerjaan;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class LvPekerjaanController extends Controller
{
    public function index()
    {
        $data = new LvPekerjaan;
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
            'namapekerjaan' => 'required|max:50'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        try {
            $id = IdGenerator::generate(['table' => 'lv_pekerjaan','field' => 'kodepekerjaan','length' => 5, 'prefix' =>date('m')]);
            $lvPekerjaan = new LvPekerjaan;
            $lvPekerjaan->kodepekerjaan = $id;
            $lvPekerjaan->namapekerjaan = $request->get('namapekerjaan');
            $lvPekerjaan->save();
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
            'namapekerjaan' => 'required|max:50',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        try {
            LvPekerjaan::where('kodepekerjaan',$id)->update([
                'namapekerjaan' => $request->get('namapekerjaan'),
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
            LvPekerjaan::where('kodepekerjaan',$id)->delete();
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
