<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PdPendaftar;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class PdPendaftarController extends Controller
{
    public function index()
    {
        $data = new PdPendaftar;
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
        try {

            $data_sv = new PdPendaftar;
            // $data_sv->kodepaguunit = $request->get('kodepaguunit');
            // $data_sv->periodedaftar = $request->get('periodedaftar');
            // $data_sv->paguunit = $request->get('paguunit');
            // $data_sv->jalurpenerimaan = $request->get('jalurpenerimaan');
            // $data_sv->sistemkuliah = $request->get('sistemkuliah');
            // $data_sv->kodekampus = $request->get('kodekampus');
            $data_sv->nopendaftar = $request->get('nopendaftar');
            $data_sv->pdsistemkuliah = $request->get('pdsistemkuliah');
            $data_sv->pdkodekampus = $request->get('pdkodekampus');
            $data_sv->pdnama = $request->get('pdnama');
            $data_sv->sex = $request->get('sex');
            $data_sv->tmplahir = $request->get('tmplahir');
            $data_sv->pdkodeagama = $request->get('pdkodeagama');
            $data_sv->tgllahir = $request->get('tgllahir');
            $data_sv->pdgoldarah = $request->get('pdgoldarah');
            $data_sv->pdalamat = $request->get('pdalamat');
            $data_sv->pdkodepos = $request->get('pdkodepos');
            $data_sv->pdkelurahan = $request->get('pdkelurahan');
            $data_sv->pdkecamatan = $request->get('pdkecamatan');
            $data_sv->pdkodekota = $request->get('pdkodekota');
            $data_sv->telp = $request->get('telp');
            $data_sv->telp2 = $request->get('telp2');
            $data_sv->hp = $request->get('hp');
            $data_sv->pdhp2 = $request->get('pdhp2');
            $data_sv->email = $request->get('email');
            $data_sv->pdemail2 = $request->get('pdemail2');
            $data_sv->pdnoktp = $request->get('pdnoktp');
            $data_sv->pdstatuslulus = $request->get('pdstatuslulus');
            $data_sv->pdstatusnikah = $request->get('pdstatusnikah');
            $data_sv->pdtokenpendaftaran = $request->get('pdtokenpendaftaran');
            $data_sv->pdkodependapatan = $request->get('pdkodependapatan');
            $data_sv->pdpilihanunit1 = $request->get('pdpilihanunit1');
            $data_sv->pdpilihanunit2 = $request->get('pdpilihanunit2');
            $data_sv->pdpilihanunit3 = $request->get('pdpilihanunit3');
            $data_sv->pdunitditerima = $request->get('pdunitditerima');
            $data_sv->pdkodewn = $request->get('pdkodewn');
            $data_sv->pdpasswordpendaftar = $request->get('pdpasswordpendaftar');
            $data_sv->kerjastatuskerja = $request->get('kerjastatuskerja');
            $data_sv->kerjanamaperusahaan = $request->get('kerjanamaperusahaan');
            $data_sv->kerjaalamatperusahaan = $request->get('kerjaalamatperusahaan');
            $data_sv->kerjajabatandiperusahaan = $request->get('kerjajabatandiperusahaan');
            $data_sv->kerjatelpperusahaan = $request->get('kerjatelpperusahaan');
            $data_sv->smuidsmu = $request->get('smuidsmu');
            $data_sv->smualamat = $request->get('smualamat');
            $data_sv->smutelp = $request->get('smutelp');
            $data_sv->smukodekota = $request->get('smukodekota');
            $data_sv->smunemsmu = $request->get('smunemsmu');
            $data_sv->ptmhstransfer = $request->get('ptmhstransfer');
            $data_sv->ptnamaasal = $request->get('ptnamaasal');
            $data_sv->ptalamatasal = $request->get('ptalamatasal');
            $data_sv->ptjurusan = $request->get('ptjurusan');
            $data_sv->ptipk = $request->get('ptipk');
            $data_sv->ptthnlulus = $request->get('ptthnlulus');
            $data_sv->ptsksasal = $request->get('ptsksasal');
            $data_sv->ptsksdiakui = $request->get('ptsksdiakui');
            $data_sv->ortunamaayah = $request->get('ortunamaayah');
            $data_sv->ortunamaibu = $request->get('ortunamaibu');
            $data_sv->ortukodepekerjayah = $request->get('ortukodepekerjayah');
            $data_sv->ortukodepekerjibu = $request->get('ortukodepekerjibu');
            $data_sv->idgelombang = $request->get('idgelombang');
            $data_sv->ptidptasal = $request->get('ptidptasal');
            $data_sv->ortualamat = $request->get('ortualamat');
            $data_sv->ortukodepos = $request->get('ortukodepos');
            $data_sv->ortutelp = $request->get('ortutelp');
            $data_sv->pmbketerangan = $request->get('pmbketerangan');
            $data_sv->pmbnopesertaspmb = $request->get('pmbnopesertaspmb');
            $data_sv->pmbtglregistrasi = $request->get('pmbtglregistrasi');
            $data_sv->pmbnilaispmb = $request->get('pmbnilaispmb');
            $data_sv->pmbnomorujian = $request->get('pmbnomorujian');
            $data_sv->pmbnilaiujian = $request->get('pmbnilaiujian');
            $data_sv->pmblulusujian = $request->get('pmblulusujian');
            $data_sv->pmbnimpendaftar = $request->get('pmbnimpendaftar');
            $data_sv->pmblokasiujian = $request->get('pmblokasiujian');
            $data_sv->pmbhasilwawancara = $request->get('pmbhasilwawancara');
            $data_sv->pdnamasmu = $request->get('pdnamasmu');
            $data_sv->pdperiode = $request->get('pdperiode');
            $data_sv->pdjenisidentitas = $request->get('pdjenisidentitas');
            $data_sv->pdnoidentitas = $request->get('pdnoidentitas');
            $data_sv->pdtipepertemuan = $request->get('pdtipepertemuan');
            $data_sv->pdukuranjaket = $request->get('pdukuranjaket');
            $data_sv->smustatus = $request->get('smustatus');
            $data_sv->smuthnmasuk = $request->get('smuthnmasuk');
            $data_sv->smujurusan = $request->get('smujurusan');
            $data_sv->ptfakultas = $request->get('ptfakultas');
            $data_sv->ptthnmasuk = $request->get('ptthnmasuk');
            $data_sv->smuthnlulus = $request->get('smuthnlulus');
            $data_sv->smunilaisttb = $request->get('smunilaisttb');
            $data_sv->ptstatus = $request->get('ptstatus');
            $data_sv->ortukodepekerjaan = $request->get('ortukodepekerjaan');
            $data_sv->pdnamapanggilan = $request->get('pdnamapanggilan');
            $data_sv->pdbhsasing = $request->get('pdbhsasing');
            $data_sv->pdbhsmembaca = $request->get('pdbhsmembaca');
            $data_sv->pdbhsmenulis = $request->get('pdbhsmenulis');
            $data_sv->pdbhsbicara = $request->get('pdbhsbicara');
            $data_sv->pdbayarsumbangan = $request->get('pdbayarsumbangan');
            $data_sv->pdbayarspp = $request->get('pdbayarspp');
            $data_sv->pdinformasidari = $request->get('pdinformasidari');
            $data_sv->pdinformasilain = $request->get('pdinformasilain');
            $data_sv->ptkodekota = $request->get('ptkodekota');
            $data_sv->smujenis = $request->get('smujenis');
            $data_sv->pdbiayastudi = $request->get('pdbiayastudi');
            $data_sv->jmltanggunganortu = $request->get('jmltanggunganortu');
            $data_sv->ptnimasal = $request->get('ptnimasal');
            $data_sv->pdrt = $request->get('pdrt');
            $data_sv->pdrw = $request->get('pdrw');
            $data_sv->isjurusanasalsama = $request->get('isjurusanasalsama');
            $data_sv->tgldaftar = $request->get('tgldaftar');
            $data_sv->tglujiantulis = $request->get('tglujiantulis');
            $data_sv->idpdbeasiswa = $request->get('idpdbeasiswa');
            $data_sv->jamujiantulismulai = $request->get('jamujiantulismulai');
            $data_sv->jamujiantulisselesai = $request->get('jamujiantulisselesai');
            $data_sv->pdjmlsemester = $request->get('pdjmlsemester');
            $data_sv->kerjabidang = $request->get('kerjabidang');
            $data_sv->nopendaftarparent = $request->get('nopendaftarparent');
            $data_sv->ispindahjurusan = $request->get('ispindahjurusan');
            $data_sv->isalumni = $request->get('isalumni');
            $data_sv->ptkodeprodi = $request->get('ptkodeprodi');
            $data_sv->ortunamaayahkandung = $request->get('ortunamaayahkandung');
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
        try {

            $data_update = 
                'nopendaftar' => $request->get('nopendaftar'),
                'pdsistemkuliah' => $request->get('pdsistemkuliah'),
                'pdkodekampus' => $request->get('pdkodekampus'),
                'pdnama' => $request->get('pdnama'),
                'sex' => $request->get('sex'),
                'tmplahir' => $request->get('tmplahir'),
                'pdkodeagama' => $request->get('pdkodeagama'),
                'tgllahir' => $request->get('tgllahir'),
                'pdgoldarah' => $request->get('pdgoldarah'),
                'pdalamat' => $request->get('pdalamat'),
                'pdkodepos' => $request->get('pdkodepos'),
                'pdkelurahan' => $request->get('pdkelurahan'),
                'pdkecamatan' => $request->get('pdkecamatan'),
                'pdkodekota' => $request->get('pdkodekota'),
                'telp' => $request->get('telp'),
                'telp2' => $request->get('telp2'),
                'hp' => $request->get('hp'),
                'pdhp2' => $request->get('pdhp2'),
                'email' => $request->get('email'),
                'pdemail2' => $request->get('pdemail2'),
                'pdnoktp' => $request->get('pdnoktp'),
                'pdstatuslulus' => $request->get('pdstatuslulus'),
                'pdstatusnikah' => $request->get('pdstatusnikah'),
                'pdtokenpendaftaran' => $request->get('pdtokenpendaftaran'),
                'pdkodependapatan' => $request->get('pdkodependapatan'),
                'pdpilihanunit1' => $request->get('pdpilihanunit1'),
                'pdpilihanunit2' => $request->get('pdpilihanunit2'),
                'pdpilihanunit3' => $request->get('pdpilihanunit3'),
                'pdunitditerima' => $request->get('pdunitditerima'),
                'pdkodewn' => $request->get('pdkodewn'),
                'pdpasswordpendaftar' => $request->get('pdpasswordpendaftar'),
                'kerjastatuskerja' => $request->get('kerjastatuskerja'),
                'kerjanamaperusahaan' => $request->get('kerjanamaperusahaan'),
                'kerjaalamatperusahaan' => $request->get('kerjaalamatperusahaan'),
                'kerjajabatandiperusahaan' => $request->get('kerjajabatandiperusahaan'),
                'kerjatelpperusahaan' => $request->get('kerjatelpperusahaan'),
                'smuidsmu' => $request->get('smuidsmu'),
                'smualamat' => $request->get('smualamat'),
                'smutelp' => $request->get('smutelp'),
                'smukodekota' => $request->get('smukodekota'),
                'smunemsmu' => $request->get('smunemsmu'),
                'ptmhstransfer' => $request->get('ptmhstransfer'),
                'ptnamaasal' => $request->get('ptnamaasal'),
                'ptalamatasal' => $request->get('ptalamatasal'),
                'ptjurusan' => $request->get('ptjurusan'),
                'ptipk' => $request->get('ptipk'),
                'ptthnlulus' => $request->get('ptthnlulus'),
                'ptsksasal' => $request->get('ptsksasal'),
                'ptsksdiakui' => $request->get('ptsksdiakui'),
                'ortunamaayah' => $request->get('ortunamaayah'),
                'ortunamaibu' => $request->get('ortunamaibu'),
                'ortukodepekerjayah' => $request->get('ortukodepekerjayah'),
                'ortukodepekerjibu' => $request->get('ortukodepekerjibu'),
                'idgelombang' => $request->get('idgelombang'),
                'ptidptasal' => $request->get('ptidptasal'),
                'ortualamat' => $request->get('ortualamat'),
                'ortukodepos' => $request->get('ortukodepos'),
                'ortutelp' => $request->get('ortutelp'),
                'pmbketerangan' => $request->get('pmbketerangan'),
                'pmbnopesertaspmb' => $request->get('pmbnopesertaspmb'),
                'pmbtglregistrasi' => $request->get('pmbtglregistrasi'),
                'pmbnilaispmb' => $request->get('pmbnilaispmb'),
                'pmbnomorujian' => $request->get('pmbnomorujian'),
                'pmbnilaiujian' => $request->get('pmbnilaiujian'),
                'pmblulusujian' => $request->get('pmblulusujian'),
                'pmbnimpendaftar' => $request->get('pmbnimpendaftar'),
                'pmblokasiujian' => $request->get('pmblokasiujian'),
                'pmbhasilwawancara' => $request->get('pmbhasilwawancara'),
                'pdnamasmu' => $request->get('pdnamasmu'),
                'pdperiode' => $request->get('pdperiode'),
                'pdjenisidentitas' => $request->get('pdjenisidentitas'),
                'pdnoidentitas' => $request->get('pdnoidentitas'),
                'pdtipepertemuan' => $request->get('pdtipepertemuan'),
                'pdukuranjaket' => $request->get('pdukuranjaket'),
                'smustatus' => $request->get('smustatus'),
                'smuthnmasuk' => $request->get('smuthnmasuk'),
                'smujurusan' => $request->get('smujurusan'),
                'ptfakultas' => $request->get('ptfakultas'),
                'ptthnmasuk' => $request->get('ptthnmasuk'),
                'smuthnlulus' => $request->get('smuthnlulus'),
                'smunilaisttb' => $request->get('smunilaisttb'),
                'ptstatus' => $request->get('ptstatus'),
                'ortukodepekerjaan' => $request->get('ortukodepekerjaan'),
                'pdnamapanggilan' => $request->get('pdnamapanggilan'),
                'pdbhsasing' => $request->get('pdbhsasing'),
                'pdbhsmembaca' => $request->get('pdbhsmembaca'),
                'pdbhsmenulis' => $request->get('pdbhsmenulis'),
                'pdbhsbicara' => $request->get('pdbhsbicara'),
                'pdbayarsumbangan' => $request->get('pdbayarsumbangan'),
                'pdbayarspp' => $request->get('pdbayarspp'),
                'pdinformasidari' => $request->get('pdinformasidari'),
                'pdinformasilain' => $request->get('pdinformasilain'),
                'ptkodekota' => $request->get('ptkodekota'),
                'smujenis' => $request->get('smujenis'),
                'pdbiayastudi' => $request->get('pdbiayastudi'),
                'jmltanggunganortu' => $request->get('jmltanggunganortu'),
                'ptnimasal' => $request->get('ptnimasal'),
                'pdrt' => $request->get('pdrt'),
                'pdrw' => $request->get('pdrw'),
                'isjurusanasalsama' => $request->get('isjurusanasalsama'),
                'tgldaftar' => $request->get('tgldaftar'),
                'tglujiantulis' => $request->get('tglujiantulis'),
                'idpdbeasiswa' => $request->get('idpdbeasiswa'),
                'jamujiantulismulai' => $request->get('jamujiantulismulai'),
                'jamujiantulisselesai' => $request->get('jamujiantulisselesai'),
                'pdjmlsemester' => $request->get('pdjmlsemester'),
                'kerjabidang' => $request->get('kerjabidang'),
                'nopendaftarparent' => $request->get('nopendaftarparent'),
                'ispindahjurusan' => $request->get('ispindahjurusan'),
                'isalumni' => $request->get('isalumni'),
                'ptkodeprodi' => $request->get('ptkodeprodi'),
                'ortunamaayahkandung' => $request->get('ortunamaayahkandung'),
                't_updateuser' => $request->get('user'),
                't_updateip' => $request->ip(),
                't_updatetime' => Carbon::now(),

            PdPendaftar::where('kodepaguunit',$id)->update([$data_update]);

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
            PdPendaftar::where('kodepaguunit',$id)->delete();
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
