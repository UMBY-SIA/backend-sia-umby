<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MsPengalaman;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class MsPengalamanController extends Controller
{
    public function index()
    {
        $data = new MsPengalaman;
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
            'namapengalaman' => 'required|max:100',
            'judulpengalaman' => 'required|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new MsPengalaman;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('kodekota','desc')->first()->kodekota;
            }
            $pengalaman = new MsPengalaman;
            $pengalaman->idpengalaman = $data + 1;
            $pengalaman->namapengalaman = $request->get('namapengalaman');
            $pengalaman->namapengalamanen = $request->get('namapengalamanen');
            $pengalaman->judulpengalaman = $request->get('judulpengalaman');
            $pengalaman->save();
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
            'namapengalaman' => 'required|max:100',
            'judulpengalaman' => 'required|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsPengalaman::where('idpengalaman',$id)->update([
                'namapengalaman' => $request->get('namapengalaman'),
                'namapengalamanen' => $request->get('namapengalamanen'),
                'judulpengalaman' => $request->get('judulpengalaman'),
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
            MsPengalaman::where('idpengalaman',$id)->delete();
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
