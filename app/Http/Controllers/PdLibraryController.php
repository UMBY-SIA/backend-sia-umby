<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PdLibrary;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class PdLibraryController extends Controller
{
    public function index()
    {
        $data = new PdLibrary;
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
            'kodelibrary' => 'required',
            'namafile' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            $data_sv = new PdLibrary;
            $data_sv->kodelibrary = $request->get('kodelibrary');
            $data_sv->url = $request->get('url');
            $data_sv->sistemkuliah = $request->get('sistemkuliah');

            if($request->file('namafile')){
                $file_upload    = $request->file('namafile');
                $fileName       = 'library-' . uniqid() . '.' . $file_upload->getClientOriginalExtension();
                $file_upload->move(public_path('/file/'), $fileName);
                $data_sv->namafile = $fileName;
                $data_sv->filetype = $file_upload->getClientOriginalExtension();
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
            'namafile' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            if($request->file('namafile')){
                $file_upload    = $request->file('namafile');
                $fileName       = 'library-' . uniqid() . '.' . $file_upload->getClientOriginalExtension();
                $file_upload->move(public_path('/file/'), $fileName);

                PdLibrary::where('kodelibrary',$id)->update([
                    'url' => $request->get('url'),
                    'sistemkuliah' => $request->get('sistemkuliah'),
                    'namafile' => $fileName,
                    'filetype' => $file_upload->getClientOriginalExtension(),
                    't_updateuser' => $request->get('user'),
                    't_updateip' => $request->ip(),
                    't_updatetime' => Carbon::now(),
                ]);
            }else{
                PdLibrary::where('kodelibrary',$id)->update([
                    'url' => $request->get('url'),
                    'sistemkuliah' => $request->get('sistemkuliah'),
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
            PdLibrary::where('kodelibrary',$id)->delete();
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
