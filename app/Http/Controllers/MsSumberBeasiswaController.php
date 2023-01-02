<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MsSumberBeasiswa;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
class MsSumberBeasiswaController extends Controller
{
    public function index()
    {
        $data = new MsSumberBeasiswa;
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
            'kodesumber' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $data = new MsSumberBeasiswa;
            $data->kodesumber = $request->get('kodesumber');
            $data->namasumber = $request->get('namasumber');
            $data->alamat = $request->get('alamat');
            $data->kodekota = $request->get('kodekota');
            $data->telp4 = $request->get('telp4');
            $data->fax2 = $request->get('fax2');
            $data->email = $request->get('email');
            $data->homepage = $request->get('homepage');
            $data->contactperson = $request->get('contactperson');
            $data->keterangansem = $request->get('keterangansem');
            $data->save();
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
            MsSumberBeasiswa::where('kodesumber',$id)->update([
                'namasumber' => $request->get('namasumber'),
                'alamat' => $request->get('alamat'),
                'telp4' => $request->get('telp4'),
                'fax2' => $request->get('fax2'),
                'email' => $request->get('email'),
                'homepage' => $request->get('homepage'),
                'contactperson' => $request->get('contactperson'),
                'keterangansem' => $request->get('keterangansem'),
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
            MsSumberBeasiswa::where('kodesumber',$id)->delete();
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
