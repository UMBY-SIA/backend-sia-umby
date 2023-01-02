<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LvWargaNegara;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LvWargaNegaraController extends Controller
{
    public function index()
    {
        $data = new LvWargaNegara;
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
            'namawn' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        try {
            $id = new LvWargaNegara;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('kodewn','desc')->first()->kodewn;
            }
            $lvWargaNegara = new LvWargaNegara;
            $lvWargaNegara->kodewn = $data + 1;
            $lvWargaNegara->namawn = $request->get('namawn');
            $lvWargaNegara->save();
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
            'namawn' => 'required|max:50',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        try {
            LvWargaNegara::where('kodewn',$id)->update([
                'namawn' => $request->get('namawn'),
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
            LvWargaNegara::where('kodewn',$id)->delete();
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
