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
            $data_sv = new MsSetting;
            $data_sv->idsetting = $data + 1;
            $data_sv->thnkurikulumsekarang = $request->get('thnkurikulumsekarang');
            $data_sv->periodesekarang = $request->get('periodesekarang');
            $data_sv->batassksdefault = $request->get('batassksdefault');
            $data_sv->nangkatutup = $request->get('nangkatutup');
            $data_sv->periodenilai = $request->get('periodenilai');
            $data_sv->pesanpengesahan = $request->get('pesanpengesahan');
            $data_sv->lintaskurikulum = $request->get('lintaskurikulum');
            $data_sv->tglutsmulai = $request->get('tglutsmulai');
            $data_sv->tglutsakhir = $request->get('tglutsakhir');
            $data_sv->tgluasmulai = $request->get('tgluasmulai');
            $data_sv->tgluasakhir = $request->get('tgluasakhir');
            $data_sv->tglsusulanuasmulai = $request->get('tglsusulanuasmulai');
            $data_sv->tglsusulanuasakhir = $request->get('tglsusulanuasakhir');
            $data_sv->tglkuliahmulai = $request->get('tglkuliahmulai');
            $data_sv->tglkuliahakhir = $request->get('tglkuliahakhir');
            $data_sv->tglsusulanutsmulai = $request->get('tglsusulanutsmulai');
            $data_sv->tglsusulanutsakhir = $request->get('tglsusulanutsakhir');
            $data_sv->sistemkuliah = $request->get('sistemkuliah');
            $data_sv->syaratkehadiran = $request->get('syaratkehadiran');
            $data_sv->tglcutimulai = $request->get('tglcutimulai');
            $data_sv->tglcutiakhir = $request->get('tglcutiakhir');
            $data_sv->tglnilaiutsmulai = $request->get('tglnilaiutsmulai');
            $data_sv->tglnilaiutsakhir = $request->get('tglnilaiutsakhir');
            $data_sv->tglnilaiuasmulai = $request->get('tglnilaiuasmulai');
            $data_sv->tglnilaiuasakhir = $request->get('tglnilaiuasakhir');
            $data_sv->periodesp = $request->get('periodesp');
            $data_sv->periodekrsta = $request->get('periodekrsta');
            $data_sv->tglkoreksimulai = $request->get('tglkoreksimulai');
            $data_sv->tglkoreksiakhir = $request->get('tglkoreksiakhir');
            $data_sv->tgluploadsoalmulai = $request->get('tgluploadsoalmulai');
            $data_sv->tgluploadsoalakhir = $request->get('tgluploadsoalakhir');
            $data_sv->tgltransfermulai = $request->get('tgltransfermulai');
            $data_sv->tgltransferakhir = $request->get('tgltransferakhir');
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
