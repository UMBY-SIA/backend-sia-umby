<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AkMataKuliah;
use Illuminate\Http\Request;
class AkMataKuliahController extends Controller
{
    public function index()
    {
        $data = AkMataKuliah::get();
        if (isset($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Tidak ada data.',
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil.',
            'data' => $data,
        ]);
    }
}
