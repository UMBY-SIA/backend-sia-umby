<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class AturanCutiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    public function index()
    {
        $results = app('db')->select("SELECT * FROM ak_aturancuti");
        $data = DB::table('ak_aturancuti')->get();
        var_dump($results);
    }
}
