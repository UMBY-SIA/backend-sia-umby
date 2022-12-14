<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LsLokasiKampus;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class LsLokasiKampusController extends Controller
{
    public function index()
    {
        $data = new LsLokasiKampus;
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
            'kampus',
            'alamatkmp',
            'telpkmp',
            'faxkmp',
            'kodepmb',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = IdGenerator::generate(['table' => 'lv_lokasikampus','field' => 'kodekampus', 'length' => 10, 'prefix' =>date('m')]);
            $lokasikampus = new LsLokasiKampus;
            $lokasikampus->kodekampus = $id;
            $lokasikampus->kampus = $request->get('kampus');
            $lokasikampus->alamatkmp = $request->get('alamatkmp');
            $lokasikampus->telpkmp = $request->get('telpkmp');
            $lokasikampus->faxkmp = $request->get('faxkmp');
            $lokasikampus->kodepmb = $request->get('kodepmb');
            $lokasikampus->save();
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
            'kampus',
            'alamatkmp',
            'telpkmp',
            'faxkmp',
            'kodepmb',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            LsLokasiKampus::where('kodekampus',$id)->update([
                'kampus' => $request->get('kampus'),
                'alamatkmp' => $request->get('alamatkmp'),
                'telpkmp' => $request->get('telpkmp'),
                'faxkmp' => $request->get('faxkmp'),
                'kodepmb' => $request->get('kodepmb'),
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
            LsLokasiKampus::where('kodekampus',$id)->delete();
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
