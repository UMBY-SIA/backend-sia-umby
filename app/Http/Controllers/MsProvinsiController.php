<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsProvinsi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MsProvinsiController extends Controller
{
    public function index()
    {
        $data = new MsProvinsi;
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
        $validator = Validator::make([
            'kodepropinsi' => 'required',
            'namapropinsi' => 'required',
            'namakota' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=> false, 'message' => $validator->errors()]);
        }

        try {

        } catch (Exception $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        } catch (QueryException $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

}
