<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AkJenisKurikulum;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AkJenisKurikulumController extends Controller
{
    public function index()
    {
        $data = new AkJenisKurikulum;
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
            'thnkurikulum' => 'required',
            'namakurikulum' => 'required',
            'tglberlaku' => 'required',
            'is_aktif' => 'required',
            'pendidikanasal' => 'required',
            'pendidikantempuh' => 'required',
            'sistemkuliah' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = IdGenerator::generate(['table' => 'ak_jeniskurikulum','field' => 'kodekurikulum','length' => 10, 'prefix' =>date('m')]);

            $JenisKurikulum = new AkJenisKurikulum;
            $JenisKurikulum->kodekurikulum = $id;
            $JenisKurikulum->kodeunit = $request->get('kodeunit');
            $JenisKurikulum->thnkurikulum = $request->get('thnkurikulum');
            $JenisKurikulum->namakurikulum = $request->get('namakurikulum');
            $JenisKurikulum->tglberlaku = $request->get('tglberlaku');
            $JenisKurikulum->is_aktif = $request->get('is_aktif');
            $JenisKurikulum->pendidikanasal = $request->get('pendidikanasal');
            $JenisKurikulum->pendidikantempuh = $request->get('pendidikantempuh');
            $JenisKurikulum->sistemkuliah = $request->get('sistemkuliah');
            $JenisKurikulum->save();
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
            'thnkurikulum' => 'required',
            'namakurikulum' => 'required',
            'tglberlaku' => 'required',
            'is_aktif' => 'required',
            'pendidikanasal' => 'required',
            'pendidikantempuh' => 'required',
            'sistemkuliah' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            AkJenisKurikulum::where('kodekurikulum',$id)->update([
                'kodeunit' => $request->get('kodeunit'),
                'thnkurikulum' => $request->get('thnkurikulum'),
                'namakurikulum' => $request->get('namakurikulum'),
                'tglberlaku' => $request->get('tglberlaku'),
                'is_aktif' => $request->get('is_aktif'),
                'pendidikanasal' => $request->get('pendidikanasal'),
                'pendidikantempuh' => $request->get('pendidikantempuh'),
                'sistemkuliah' => $request->get('sistemkuliah'),
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
            AkJenisKurikulum::where('kodekurikulum',$id)->delete();
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
