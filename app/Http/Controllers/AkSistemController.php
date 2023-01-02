<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AkSistem;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AkSistemController extends Controller
{
    public function index()
    {
        $data = new AkSistem;
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
            'namasistem' => 'required',
            'tipeprogram' => 'required',
            'statusprogram' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        try{
            $id = new AkSistem;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('sistemkuliah','desc')->first()->sistemkuliah;
            }
            $sistem = new AkSistem;
            $sistem->sistemkuliah = $data + 1;
            $sistem->namasistem = $request->get('namasistem');
            $sistem->tipeprogram = $request->get('tipeprogram');
            $sistem->statusprogram = $request->get('statusprogram');
            $sistem->save();
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
            'namasistem' => 'required',
            'tipeprogram' => 'required',
            'statusprogram' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            AkSistem::where('sistemkuliah',$id)->update([
                'namasistem' => $request->get('namasistem'),
                'tipeprogram' => $request->get('tipeprogram'),
                'statusprogram' => $request->get('statusprogram'),
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
            AkSistem::where('sistemkuliah',$id)->delete();
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
