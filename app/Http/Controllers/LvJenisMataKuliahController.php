<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LvJenisMataKuliah;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LvJenisMataKuliahController extends Controller
{
    public function index()
    {
        $data = LvJenisMataKuliah::get();
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kodejenis' => 'required',
            'namajenis' => 'required',
            'urutan' => 'required',
            'keterangan' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' =>$validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        };
        try {
            $LvJenisMataKuliah = new LvJenisMataKuliah;
            $LvJenisMataKuliah->kodejenis = $request->get('kodejenis');
            $LvJenisMataKuliah->namajenis = $request->get('namajenis');
            $LvJenisMataKuliah->urutan = $request->get('urutan');
            $LvJenisMataKuliah->keterangan = $request->get('keterangan');
            $LvJenisMataKuliah->save();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data.',
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        } catch (QueryException $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        try {
            $data = LvJenisMataKuliah::where('kodejenis',$id)->first();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil mendapatkan data.',
                'data' => $data,
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        } catch (QueryException $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'kodejenis' => 'required',
            'namajenis' => 'required',
            'urutan' => 'required',
            'keterangan' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' =>$validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        };
        try {
            LvJenisMataKuliah::where('kodejenis',$id)->update([
                'kodejenis' => $request->get('kodejenis'),
                'namajenis' => $request->get('namajenis'),
                'urutan' => $request->get('urutan'),
                'keterangan' => $request->get('keterangan')
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengganti data.',
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        } catch (QueryException $e){
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            LvJenisMataKuliah::where('kodejenis',$id)->delete();
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
