<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PdGelombangDaftar;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class PdGelombangDaftarController extends Controller
{
    public function index()
    {
        $data = new PdGelombangDaftar;
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
            'jalurpenerimaan' => 'required',
            'kodegelombang' => 'required',
            'periodedaftar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $id = new PdGelombangDaftar;
            if( is_null($id->first())){
                $data = 0;
            }else{
                $data = $id->orderBy('idgelombang','desc')->first()->idgelombang;
            }

            $data_sv = new PdGelombangDaftar;
            $data_sv->idgelombang = $data + 1;
            $data_sv->jalurpenerimaan = $request->get('jalurpenerimaan');
            $data_sv->kodegelombang = $request->get('kodegelombang');
            $data_sv->periodedaftar = $request->get('periodedaftar');
            $data_sv->pengumuman = $request->get('pengumuman');
            $data_sv->tglawaldaftar = $request->get('tglawaldaftar');
            $data_sv->tglakhirdaftar = $request->get('tglakhirdaftar');
            $data_sv->tglujian = $request->get('tglujian');
            $data_sv->tglpengumuman = $request->get('tglpengumuman');
            $data_sv->tglawalregistrasi = $request->get('tglawalregistrasi');
            $data_sv->tglakhirregistrasi = $request->get('tglakhirregistrasi');
            $data_sv->sistemkuliah = $request->get('sistemkuliah');
            $data_sv->aktif = $request->get('aktif');
            $data_sv->kodefrm = $request->get('kodefrm');
            $data_sv->tambahpangkal = $request->get('tambahpangkal');
            $data_sv->gelombang = $request->get('gelombang');
            $data_sv->programpend = $request->get('programpend');

            if($request->file('file_upload')){
                $file_upload    = $request->file('file_upload');
                $fileName       = 'biaya-' . uniqid() . '.' . $file_upload->getClientOriginalExtension();
                $file_upload->move(public_path('/file/'), $fileName);
                $data_sv->filebiaya = $fileName;
            }
            
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
            'jalurpenerimaan' => 'required',
            'kodegelombang' => 'required',
            'periodedaftar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            if($request->file('file_upload')){
                $file_upload    = $request->file('file_upload');
                $fileName       = 'biaya-' . uniqid() . '.' . $file_upload->getClientOriginalExtension();
                $file_upload->move(public_path('/file/'), $fileName);

                PdGelombangDaftar::where('idgelombang',$id)->update([
                    'jalurpenerimaan' => $request->get('jalurpenerimaan'),
                    'kodegelombang' => $request->get('kodegelombang'),
                    'periodedaftar' => $request->get('periodedaftar'),
                    'pengumuman' => $request->get('pengumuman'),
                    'tglawaldaftar' => $request->get('tglawaldaftar'),
                    'tglakhirdaftar' => $request->get('tglakhirdaftar'),
                    'tglujian' => $request->get('tglujian'),
                    'tglpengumuman' => $request->get('tglpengumuman'),
                    'tglawalregistrasi' => $request->get('tglawalregistrasi'),
                    'tglakhirregistrasi' => $request->get('tglakhirregistrasi'),
                    'sistemkuliah' => $request->get('sistemkuliah'),
                    'aktif' => $request->get('aktif'),
                    'kodefrm' => $request->get('kodefrm'),
                    'tambahpangkal' => $request->get('tambahpangkal'),
                    'gelombang' => $request->get('gelombang'),
                    'programpend' => $request->get('programpend'),
                    'filebiaya' => $fileName,
                    't_updateuser' => $request->get('user'),
                    't_updateip' => $request->ip(),
                    't_updatetime' => Carbon::now(),
                ]);
            }else{
                PdGelombangDaftar::where('idgelombang',$id)->update([
                    'jalurpenerimaan' => $request->get('jalurpenerimaan'),
                    'kodegelombang' => $request->get('kodegelombang'),
                    'periodedaftar' => $request->get('periodedaftar'),
                    'pengumuman' => $request->get('pengumuman'),
                    'tglawaldaftar' => $request->get('tglawaldaftar'),
                    'tglakhirdaftar' => $request->get('tglakhirdaftar'),
                    'tglujian' => $request->get('tglujian'),
                    'tglpengumuman' => $request->get('tglpengumuman'),
                    'tglawalregistrasi' => $request->get('tglawalregistrasi'),
                    'tglakhirregistrasi' => $request->get('tglakhirregistrasi'),
                    'sistemkuliah' => $request->get('sistemkuliah'),
                    'aktif' => $request->get('aktif'),
                    'kodefrm' => $request->get('kodefrm'),
                    'tambahpangkal' => $request->get('tambahpangkal'),
                    'gelombang' => $request->get('gelombang'),
                    'programpend' => $request->get('programpend'),
                    't_updateuser' => $request->get('user'),
                    't_updateip' => $request->ip(),
                    't_updatetime' => Carbon::now(),
                ]);
            }

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
            PdGelombangDaftar::where('idgelombang',$id)->delete();
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
