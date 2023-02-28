<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AkKrs;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class AkKrsController extends Controller
{
    public function index()
    {
        $data = new AkKrs;
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
            'nim' => 'required',
            'kodekelas' => 'required',
            'lulus' => 'required',
            'dipakai' => 'required',
            'nilaimasuk' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }
        
        try {

            $data_sv = new AkKrs;
            $data_sv->nim = $request->get('nim');
            $data_sv->kodekelas = $request->get('kodekelas');
            $data_sv->kodekrs = $request->get('kodekrs');
            $data_sv->nnumerik = $request->get('nnumerik');
            $data_sv->nangka = $request->get('nangka');
            $data_sv->nhuruf = $request->get('nhuruf');
            $data_sv->lulus = $request->get('lulus');
            $data_sv->dipakai = $request->get('dipakai');
            $data_sv->nilaimasuk = $request->get('nilaimasuk');
            $data_sv->ulang = $request->get('ulang');
            $data_sv->autonilai = $request->get('autonilai');
            $data_sv->no_urut = $request->get('no_urut');
            $data_sv->isuts = $request->get('isuts');
            $data_sv->isuas = $request->get('isuas');
            $data_sv->isuassusulan = $request->get('isuassusulan');
            $data_sv->isutssusulan = $request->get('isutssusulan');
            $data_sv->nasal = $request->get('nasal');
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
            AkKrs::where('nim',$id)->update([
                // 'nim' => $request->get('nim'),
                'kodekelas' => $request->get('kodekelas'),
                'kodekrs' => $request->get('kodekrs'),
                'nnumerik' => $request->get('nnumerik'),
                'nangka' => $request->get('nangka'),
                'nhuruf' => $request->get('nhuruf'),
                'lulus' => $request->get('lulus'),
                'dipakai' => $request->get('dipakai'),
                'nilaimasuk' => $request->get('nilaimasuk'),
                'ulang' => $request->get('ulang'),
                'autonilai' => $request->get('autonilai'),
                'no_urut' => $request->get('no_urut'),
                'isuts' => $request->get('isuts'),
                'isuas' => $request->get('isuas'),
                'isuassusulan' => $request->get('isuassusulan'),
                'isutssusulan' => $request->get('isutssusulan'),
                'nasal' => $request->get('nasal'),
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
            AkKrs::where('nim',$id)->delete();
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
