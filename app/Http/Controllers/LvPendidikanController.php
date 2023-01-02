<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LvPendidikan;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


class LvPendidikanController extends Controller
{
    public function index()
    {
        $data = new LvPendidikan;
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
            'namapendidikan' => 'required|max:50',
            'namasingkat' => 'required|max:4'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        try {
            $id = IdGenerator::generate(['table' => 'lv_pendidikan','field' => 'kodependidikan','length' => 5, 'prefix' =>date('m')]);
            $pendidikan = new LvPendidikan;
            $pendidikan->kodependidikan = $id;
            $pendidikan->namapendidikan = $request->get('namapendidikan');
            $pendidikan->namasingkat = $request->get('namasingkat');
            $pendidikan->save();
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
            'namapendidikan' => 'required|max:50',
            'namasingkat' => 'required|max:4'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        try {
            LvPendidikan::where('kodependidikan',$id)->update([
                'namapendidikan' => $request->get('namapendidikan'),
                'namasingkat' => $request->get('namasingkat')
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
            LvPendidikan::where('kodependidikan',$id)->delete();
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
