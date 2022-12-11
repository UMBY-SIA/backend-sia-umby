<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsKota;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MsKotaController extends Controller
{
    public function index()
    {
        $data = new MsKota;
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
            'kodekota' => 'required',
            'kodepropinsi' => 'required',
            'namakota' => 'required',
        ]);
    }
}
