<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class MahasiswaController extends Controller
{
    public function index()
    {

    }

    public function get_data()
    {
        $data = DB::table('ms_mahasiswa')
                ->get();
        dd($data);
        return response()->json($data);
    }
}