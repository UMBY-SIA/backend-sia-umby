<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MsSetting;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class MsSettingController extends Controller
{
    public function index()
    {
        $data = new MsSetting;
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
            'idsetting' => 'required',
            'thnkurikulumsekarang' => 'required',
            'periodesekarang' => 'required',
            'batassksdefault' => 'required',
            'nangkatutup' => 'required',
            'periodenilai' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new MsSetting;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('idsetting','desc')->first()->idsetting;
            }
            $data = new MsSetting;
            $data->idsetting = $request->get('idsetting');
            $data->thnkurikulumsekarang = $request->get('thnkurikulumsekarang');
            $data->periodesekarang = $request->get('periodesekarang');
            $data->batassksdefault = $request->get('batassksdefault');
            $data->nangkatutup = $request->get('nangkatutup');
            $data->periodenilai = $request->get('periodenilai');
            $data->pesanpengesahan = $request->get('pesanpengesahan');
            $data->lintaskurikulum = $request->get('lintaskurikulum');
            $data->tglutsmulai = $request->get('tglutsmulai');
            $data->tglutsakhir = $request->get('tglutsakhir');
            $data->tgluasmulai = $request->get('tgluasmulai');
            $data->tgluasakhir = $request->get('tgluasakhir');
            $data->tglsusulanuasmulai = $request->get('tglsusulanuasmulai');
            $data->tglsusulanuasakhir = $request->get('tglsusulanuasakhir');
            $data->tglkuliahmulai = $request->get('tglkuliahmulai');
            $data->tglkuliahakhir = $request->get('tglkuliahakhir');
            $data->tglsusulanutsmulai = $request->get('tglsusulanutsmulai');
            $data->tglsusulanutsakhir = $request->get('tglsusulanutsakhir');
            $data->sistemkuliah = $request->get('sistemkuliah');
            $data->syaratkehadiran = $request->get('syaratkehadiran');
            $data->tglcutimulai = $request->get('tglcutimulai');
            $data->tglcutiakhir = $request->get('tglcutiakhir');
            $data->tglnilaiutsmulai = $request->get('tglnilaiutsmulai');
            $data->tglnilaiutsakhir = $request->get('tglnilaiutsakhir');
            $data->tglnilaiuasmulai = $request->get('tglnilaiuasmulai');
            $data->tglnilaiuasakhir = $request->get('tglnilaiuasakhir');
            $data->periodesp = $request->get('periodesp');
            $data->periodekrsta = $request->get('periodekrsta');
            $data->tglkoreksimulai = $request->get('tglkoreksimulai');
            $data->tglkoreksiakhir = $request->get('tglkoreksiakhir');
            $data->tgluploadsoalmulai = $request->get('tgluploadsoalmulai');
            $data->tgluploadsoalakhir = $request->get('tgluploadsoalakhir');
            $data->tgltransfermulai = $request->get('tgltransfermulai');
            $data->tgltransferakhir = $request->get('tgltransferakhir');
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
        $validator = Validator::make($request->all(),[
            'idsetting' => 'required',
            'thnkurikulumsekarang' => 'required',
            'periodesekarang' => 'required',
            'batassksdefault' => 'required',
            'nangkatutup' => 'required',
            'periodenilai' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            MsSetting::where('idsetting',$id)->update([
                'idsetting' => $request->get('idsetting'),
                'thnkurikulumsekarang' => $request->get('thnkurikulumsekarang'),
                'periodesekarang' => $request->get('periodesekarang'),
                'batassksdefault' => $request->get('batassksdefault'),
                'nangkatutup' => $request->get('nangkatutup'),
                'periodenilai' => $request->get('periodenilai'),
                'pesanpengesahan' => $request->get('pesanpengesahan'),
                'lintaskurikulum' => $request->get('lintaskurikulum'),
                'tglutsmulai' => $request->get('tglutsmulai'),
                'tglutsakhir' => $request->get('tglutsakhir'),
                'tgluasmulai' => $request->get('tgluasmulai'),
                'tgluasakhir' => $request->get('tgluasakhir'),
                'tglsusulanuasmulai' => $request->get('tglsusulanuasmulai'),
                'tglsusulanuasakhir' => $request->get('tglsusulanuasakhir'),
                'tglkuliahmulai' => $request->get('tglkuliahmulai'),
                'tglkuliahakhir' => $request->get('tglkuliahakhir'),
                'tglsusulanutsmulai' => $request->get('tglsusulanutsmulai'),
                'tglsusulanutsakhir' => $request->get('tglsusulanutsakhir'),
                'sistemkuliah' => $request->get('sistemkuliah'),
                'syaratkehadiran' => $request->get('syaratkehadiran'),
                'tglcutimulai' => $request->get('tglcutimulai'),
                'tglcutiakhir' => $request->get('tglcutiakhir'),
                'tglnilaiutsmulai' => $request->get('tglnilaiutsmulai'),
                'tglnilaiutsakhir' => $request->get('tglnilaiutsakhir'),
                'tglnilaiuasmulai' => $request->get('tglnilaiuasmulai'),
                'tglnilaiuasakhir' => $request->get('tglnilaiuasakhir'),
                'periodesp' => $request->get('periodesp'),
                'periodekrsta' => $request->get('periodekrsta'),
                'tglkoreksimulai' => $request->get('tglkoreksimulai'),
                'tglkoreksiakhir' => $request->get('tglkoreksiakhir'),
                'tgluploadsoalmulai' => $request->get('tgluploadsoalmulai'),
                'tgluploadsoalakhir' => $request->get('tgluploadsoalakhir'),
                'tgltransfermulai' => $request->get('tgltransfermulai'),
                'tgltransferakhir' => $request->get('tgltransferakhir'),
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
            MsSetting::where('idsetting',$id)->delete();
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
