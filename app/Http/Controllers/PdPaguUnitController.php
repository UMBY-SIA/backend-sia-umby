<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PdPaguUnit;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class PdPaguUnitController extends Controller
{
    public function index()
    {
        $data = new PdPaguUnit;
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
        try {

            $data_sv = new PdPaguUnit;
            $data_sv->kodepaguunit = $request->get('kodepaguunit');
            $data_sv->periodedaftar = $request->get('periodedaftar');
            $data_sv->paguunit = $request->get('paguunit');
            $data_sv->jalurpenerimaan = $request->get('jalurpenerimaan');
            $data_sv->sistemkuliah = $request->get('sistemkuliah');
            $data_sv->kodekampus = $request->get('kodekampus');
            $data_sv->save();
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
        try {
            PdPaguUnit::where('kodepaguunit',$id)->update([
                'periodedaftar' => $request->get('periodedaftar'),
                'paguunit' => $request->get('paguunit'),
                'jalurpenerimaan' => $request->get('jalurpenerimaan'),
                'sistemkuliah' => $request->get('sistemkuliah'),
                'kodekampus' => $request->get('kodekampus'),
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
            PdPaguUnit::where('kodepaguunit',$id)->delete();
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
