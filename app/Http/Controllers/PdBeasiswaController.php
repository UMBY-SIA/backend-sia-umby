<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PdBeasiswa;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class PdBeasiswaController extends Controller
{
    public function index()
    {
        $data = new PdBeasiswa;
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
        $validator = Validator::make($request->all(),[
            'jalurpenerimaan' => 'required',
            'sistemkuliah' => 'required',
            'periode' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new PdBeasiswa;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('idpdbeasiswa','desc')->first()->idpdbeasiswa;
            }
            $data_sv = new PdBeasiswa;
            $data_sv->idpdbeasiswa = $data + 1;
            $data_sv->jalurpenerimaan = $request->get('jalurpenerimaan');
            $data_sv->sistemkuliah = $request->get('sistemkuliah');
            $data_sv->periode = $request->get('periode');
            $data_sv->pdpotongan = $request->get('pdpotongan');
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
        $validator = Validator::make($request->all(),[
            'batal' => 'required',
            'periode' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            PdBeasiswa::where('idpdbeasiswa',$id)->update([
                'jalurpenerimaan' => $request->get('jalurpenerimaan'),
                'sistemkuliah' => $request->get('sistemkuliah'),
                'periode' => $request->get('periode'),
                'pdpotongan' => $request->get('pdpotongan'),
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
            PdBeasiswa::where('idpdbeasiswa',$id)->delete();
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
