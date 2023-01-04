<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AkBidangStudi;
use App\Models\MsJabatan;
use Carbon\Carbon;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class AkBidangStudiController extends Controller
{
    public function index()
    {
        $data = new AkBidangStudi;
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
            'kodeunit' => 'required',
            'namabs' => 'required',
            'namabsen' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            // $id = IdGenerator::generate(['table' => 'ak_bidangstudi','field' => 'kodebs','length' => 5, 'prefix' =>0]);
            $last_id = AkBidangStudi::orderBy('kodebs','DESC')->get();
            if (count($last_id) > 0) {
                $bilangan = AkBidangStudi::orderBy('kodebs','DESC')->first()->kodebs + 1;
                $id = sprintf("%02d", $bilangan);
            }else{
                $id = '01';
            }
            $bidangStudi = new AkBidangStudi;
            $bidangStudi->kodebs = $id;
            $bidangStudi->kodeunit = $request->get('kodeunit');
            $bidangStudi->namabs = $request->get('namabs');
            $bidangStudi->namabsen = $request->get('namabsen');
            $bidangStudi->save();
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
            'kodeunit' => 'required',
            'namabs' => 'required',
            'namabsen' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            AkBidangStudi::where('kodebs',$id)->update([
                'namabs' => $request->get('namabs'),
                'namabsen' => $request->get('namabsen'),
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
            AkBidangStudi::where('kodebs',$id)->delete();
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
