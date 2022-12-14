<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsUnit;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MsUnitController extends Controller
{
    public function index()
    {
        $data = new MsUnit;
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
            'namaunit' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new MsUnit;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('kodeunit','desc')->first()->kodepropinsi;
            }
            MsUnit::create([
                'kodeunit' => $request->get('kodeunit'),
                'kodeunitparent' => $request->get('kodeunitparent'),
                'namaunit' => $request->get('namaunit'),
                'namasingkat' => $request->get('namasingkat'),
                'levels' => $request->get('levels'),
                'gelar' => $request->get('gelar'),
                'programpend' => $request->get('programpend'),
                'kodekampus' => $request->get('kodekampus'),
                'bebanstudi' => $request->get('bebanstudi'),
                'batasip' => $request->get('batasip'),
                'prosentasecmax' => $request->get('prosentasecmax'),
                'toeflmin' => $request->get('toeflmin'),
                'cutimax' => $request->get('cutimax'),
                'keterangan' => $request->get('keterangan'),
                'urutan' => $request->get('urutan'),
                'infoleft' => $request->get('infoleft'),
                'inforight' => $request->get('inforight'),
                'isaktif' => $request->get('isaktif'),
                'nipketua' => $request->get('nipketua'),
                'namauniten' => $request->get('namauniten'),
                'gelaren' => $request->get('gelaren'),
                'noskdikti' => $request->get('noskdikti'),
                'tglskdikti' => $request->get('tglskdikti'),
                'noskbanpt' => $request->get('noskbanpt'),
                'tglskbanpt' => $request->get('tglskbanpt'),
                'kodeakreditasi' => $request->get('kodeakreditasi'),
                'telp' => $request->get('telp'),
                'email' => $request->get('email'),
                'kodenim' => $request->get('kodenim'),
                'kodedikti' => $request->get('kodedikti'),
                't_updateuser' => $request->get('t_updateuser'),
                't_updateip' => $request->get('t_updateip'),
                't_updatetime' => $request->get('t_updatetime'),
                't_updateact' => $request->get('t_updateact'),
                'kodefakultas' => $request->get('kodefakultas'),
            ]);

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
            'namapropinsi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsUnit::where('kodeunit',$id)->update([
                'namaunit' => $request->get('namaunit'),
                'updated_at' => Carbon::now(),
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
            MsUnit::where('kodeunit',$id)->delete();
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