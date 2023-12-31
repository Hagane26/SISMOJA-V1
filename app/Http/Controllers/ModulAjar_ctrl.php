<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\dataModulAjar;
use App\Models\identitas;
use App\Models\informasiUmum;
use App\Models\ppp;
use App\Models\modelPembelajaran;

use App\Models\komponenInti;
use App\Models\lampiran;

use App\Models\User;

class ModulAjar_ctrl extends Controller
{
    public function cek_status_user(){
        if(Auth::user()->status_info == 0){
            return true;
        }else{
            return false;
        }
    }

    public function index()
    {
        $identitas = "";
        $data_modul = dataModulAjar::where('users_id',Auth::user()->id)->get()->all();
        for($i=0;$i<(count($data_modul));$i++){
            $identitas = identitas::where('id',$data_modul[$i]->id)->get()->first();
            $data_modul[$i]['identitas'] = $identitas;
        }
        //echo json_encode($data_modul[0]);
        //echo $data_modul[0]->identitas->nama;
        return view('modul.index',['modul'=>$data_modul]);
    }

    public function lihat_modul(Request $req){
        $mod = dataModulAjar::where('id',$req->mod_id)->get()->first();
        $msg_default = "Data Belum Dibuat";
        $info = "";
        $identitas = "";
        $model = "";

        $ppp = "";
        $ki = "";
        $lam = "";

        // informasi umum
        if($mod->informasi_id == ''){
            $info = $msg_default;
        }else{
            $info = informasiUmum::where('id',$mod->informasi_id)->get()->first();
        }
            // identitas
        if($info->identitas_id == ''){
            $identitas = $msg_default;
        }else{
            $identitas = identitas::where('id',$info->identitas_id)->get()->first();
        }

            // model
        $model = modelPembelajaran::where('informasi_id',$info->id)->get();
        if(count($model) == 0){
            $ppp = $msg_default;
        }

        // profil pelajar pancasila
        $ppp = ppp::where('informasi_id',$info->id)->get();
        if(count($ppp) == 0){
            $ppp = $msg_default;
        }

        // komponen inti
        if($mod->komponen_id == ''){
            $ki = $msg_default;
        }else{
            $ki = komponenInti::where('id',$mod->komponen_id)->get()->first();
        }

        $info['identitas'] = $identitas;
        $info['model'] = $model;
        $mod['data_informasi'] = $info;
        $mod['data_ppp'] = $ppp;
        $mod['data_komponen_inti'] = $ki;

        //echo json_encode($mod);
        return view('modul.modulLihat',['res'=>$mod]);
    }

    public function buat_modul(){
        if($this->cek_status_user()){
            return view('modul.1buat')->with(['error'=>1,'msg'=>'Lengkapi Biodata Terlebih Dahulu.','btn'=>'disabled','alert'=>'alert-info']);
        }else{
            return view('modul.1buat')->with(['error'=>0,'msg'=>'','btn'=>'','alert'=>'']);
        }
    }

    public function hapus_modul(Request $req){
        $modul = dataModulAjar::where('id',$req->mod_id)->get()->first();
        $info_id = informasiUmum::where('id',$modul->informasi_id)->get()->first();
        $identitas_id = identitas::where('id',$info_id->identitas_id)->get()->first();

        //hapus

        ppp::where('informasi_id',$info_id->id)->delete();
        modelPembelajaran::where('informasi_id',$info_id->id)->delete();
        informasiUmum::where('id',$info_id->id)->delete();
        identitas::where('id',$identitas_id->id)->delete();
        dataModulAjar::where('id',$modul->id)->delete();
    }

    public function flush_session(){
        session()->forget('mod_id');

        session()->forget('identitas');
        session()->forget('komponenAwal');
        session()->forget('ppp');
        session()->forget('model');
        session()->forget('sarana');
        session()->forget('prasarana');
        session()->forget('tpd');
        session()->forget('mod_stat');

    }

    public function aksi_buat_modul(Request $req){
        $this->flush_session();

        $req->validate([
            'materi' => 'required',
        ]);

        if($req){
            $parcel = dataModulAjar::create([
                'judul'=>$req->materi,
                'users_id'=>Auth::user()->id,
                'status' => 0,
            ]);
            if($parcel){
                session(['mod_id' => $parcel->id]);
                session(['mod_stat' => 0]);
                //echo $this->mod_id;
                return redirect('/modul/buat/informasi/1');
            }else{
                return view('modul.1buat')->with(['error'=>1,'msg'=>'Terjadi Kesalahan Input Data.','btn'=>'disabled','alert'=>'alert-danger']);
            }
        }
    }

    public function informasi_modul($step){
        if(session()->has('mod_id') == 0){
            return redirect()->back();
        }

        $mod_id = session('mod_id');
        $judul = dataModulAjar::where('id',$mod_id)->get()->first();

        if(!is_numeric($step)){
            return redirect()->back();
        }

        $pos = $step - 1;
        $go = "";

        switch($step){
            case 1:
                $go = "identitas";
                break;
            case 2:
                $go = "komponenAwal";
                break;
            case 3:
                $go = "ppp";
                break;
            case 4:
                $go = "sarana";
                break;
            case 5:
                $go = "target";
                break;
            case 6:
                $go = "model";
                break;
            case 'selesai':
                $go = "selesai";
                break;
        }

        $data = [
            'judul' => $judul->judul,
            'view' => "modul.1". $go,
            'go' => $go,
            'pos' => $pos,
            'aksi' => 'informasi/' . $go . '-aksi',
            'pos_s' => $pos * 20,
        ];

        //echo session('mod_id') . " - w";
        return view('modul.1informasiUmum',['res' => $data]);
        //echo json_encode(session()->get('identitas'));
    }

    public function identitas_aksi(Request $req){
        $data = $req->validate([
            'penyusun'=>'required',
            'institusi'=>'required',
            'mapel'=>'required',
            'fase'=>'required',
            'kelas'=>'required',
            'TA_awal'=>'required',
            'TA_akhir'=>'required',
            'waktu'=>'required'
        ],[
            //untuk custom pesan gagal nya
            'penyusun.required' => "Nama Penyusun Kosong",
        ]);
        if ($req->mapel == 0){
            return redirect()->back()->withErrors('Mapel Kosong');
        }

        if(session()->has('identitas') == 1 ){
            $parcel = identitas::where('id',session()->get('identitas')['id'])->update([
                'nama' => $req->penyusun,
                'institusi' => $req->institusi,
                'mapel' => $req->mapel,
                'fase' => $req->fase,
                'kelas' => $req->kelas,
                'TA' => $req->TA_awal . "/" . $req->TA_akhir ,
                'alokasi_waktu' => $req->waktu,
            ]);
            $nparcel = identitas::where('id',session()->get('identitas')['id'])->get()->first();
            session(['identitas'=>$nparcel]);
        }else{
            $parcel = identitas::create([
                'nama' => $req->penyusun,
                'institusi' => $req->institusi,
                'mapel' => $req->mapel,
                'fase' => $req->fase,
                'kelas' => $req->kelas,
                'TA' => $req->Ta_awal . "/" . $req->TA_akhir,
                'alokasi_waktu' => $req->waktu,
            ]);
            $informasi_umum = informasiUmum::create(['identitas_id'=>$parcel->id]);
            dataModulAjar::where('id',session()->get('mod_id'))->update([
                'informasi_id' => $informasi_umum->id,
            ]);
            session(['informasiUmum'=>$informasi_umum]);
            session(['identitas'=>$parcel]);
        }

        if($parcel){
            $stat = session()->get('mod_stat')+1;
            session(['mod_stat' => $stat]);
            return redirect('/modul/buat/informasi/2');
        }else{
            return redirect()->back()->withErrors('Terjadi Kesalahan Input');
        }
    }

    public function komponenAwal_aksi(Request $req){
        $data = $req->validate([
            'kp' => 'required',
        ]);

        $parcel = informasiUmum::where('id',session()->get('informasiUmum')['id'])->update(['komponenAwal'=>$req->kp]);

        if($parcel){
            $nparcel = informasiUmum::where('id',session()->get('informasiUmum')['id'])->get()->first();
            session(['informasiUmum'=>$nparcel]);
            $stat = session()->get('mod_stat')+1;
            session(['mod_stat' => $stat]);
            return redirect('/modul/buat/informasi/3');
        }else{
            return redirect()->back()->withErrors('Terjadi Kesalahan Input');
        }
    }

    public function ppp_aksi(Request $req){
        $j = count($req->all());
        $data = array();
        $parcel = "";
        if(session()->has('ppp')==1){
            for($i = 1;$i<$j;$i++){
                if($req['i_j'.$i]){
                    $parcel = ppp::where('id',session()->get('ppp')[$i]['id'])->update([
                        'subjudul' => $req['nj_'.$i],
                        'isi' => $req['i_j'.$i],
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                }
                $data[$i] = [
                    'id_tl' => 'nj_'.$i,
                    'id_tx' => 'i_j'.$i,
                    'judul' => $req['nj_'.$i],
                    'isi' => $req['i_j'.$i],
                ];
            }
        }else{
            for($i = 1;$i<$j;$i++){
                if($req['i_j'.$i]){
                    $parcel = ppp::create([
                        'subjudul' => $req['nj_'.$i],
                        'isi' => $req['i_j'.$i],
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                }
                $data[$i] = [
                    'id' => $parcel->id,
                    'id_tl' => 'nj_'.$i,
                    'id_tx' => 'i_j'.$i,
                    'judul' => $req['nj_'.$i],
                    'isi' => $req['i_j'.$i],
                ];
            }
        }
        session(['ppp'=>$data]);
        //echo json_encode(session()->get('ppp'));
        session(['mod_stat' => 3]);
        //echo $parcel->id;
        return redirect('/modul/buat/informasi/4');
    }

    public function sarana_aksi(Request $req){
        if($req->sarana == '' || $req->prasarana == ''){
            return redirect()->back()->withErrors('Isi Salah Satu');
        }else{

            $parcel = informasiUmum::where('id',session()->get('informasiUmum')['id'])->update(
            [
                'sarana'=> $req->sarana,
                'prasarana' => $req->prasarana,
            ]);
            if($parcel){
                $nparcel = informasiUmum::where('id',session()->get('informasiUmum')['id'])->get()->first();
                session(['sarana' => $req->sarana]);
                session(['prasarana' => $req->prasarana]);
                session(['informasiUmum'=>$nparcel]);
                $stat = session()->get('mod_stat')+1;
                session(['mod_stat' => $stat]);
                return redirect('/modul/buat/informasi/5');
            }else{
                return redirect()->back()->withErrors('Terjadi Kesalahan Input');
            }
        }
    }

    public function target_aksi(Request $req){
        if($req->tpd == ''){
            return redirect()->back()->withErrors('Silahkan Diisi!');
        }else{
            $parcel = informasiUmum::where('id',session()->get('informasiUmum')['id'])->update([
                'target'=> $req->tpd
            ]);
            if($parcel){
                $nparcel = informasiUmum::where('id',session()->get('informasiUmum')['id'])->get()->first();
                session(['tpd'=> $req->tpd]);
                session(['informasiUmum'=>$nparcel]);
                $stat = session()->get('mod_stat')+1;
                session(['mod_stat' => $stat]);
                return redirect('/modul/buat/informasi/6');
            }else{
                return redirect()->back()->withErrors('Terjadi Kesalahan Input');
            }
        }
    }

    public function model_aksi(Request $req){
        $j = count($req->all());
        $data = array();
        $parcel = "";
        if(session()->has('model')==1){
            for($i = 1;$i<$j;$i++){
                $s = 'pe-';
                if($req[$s.$i]){
                    $parcel = modelPembelajaran::where('id',session()->get('model')[$i]['id'])->update([
                        'metodePembelajaran' => $req[$s.$i],
                        'kategori' => substr($s,0,2),
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                    $nparcel = modelPembelajaran::where('id',session()->get('model')[$i]['id'])->get()->first();
                }
                $s = 'mo-';
                if($req[$s.$i]){
                    $parcel = modelPembelajaran::where('id',session()->get('model')[$i]['id'])->update([
                        'metodePembelajaran' => $req[$s.$i],
                        'kategori' => substr($s,0,2),
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                    $nparcel = modelPembelajaran::where('id',session()->get('model')[$i]['id'])->get()->first();
                }
                $s = 'me-';
                if($req[$s.$i]){
                    $parcel = modelPembelajaran::where('id',session()->get('model')[$i]['id'])->update([
                        'metodePembelajaran' => $req[$s.$i],
                        'kategori' => substr($s,0,2),
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                    $nparcel = modelPembelajaran::where('id',session()->get('model')[$i]['id'])->get()->first();
                }
                $s = 'te-';
                if($req[$s.$i]){
                    $parcel = modelPembelajaran::where('id',session()->get('model')[$i]['id'])->update([
                        'metodePembelajaran' => $req[$s.$i],
                        'kategori' => substr($s,0,2),
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                    $nparcel = modelPembelajaran::where('id',session()->get('model')[$i]['id'])->get()->first();
                }
                $data[$i] = [
                    'id' => $nparcel->id,
                    'id_tl' => $s.$i,
                    'isi' => $req[$s.$i],
                    'kat' => $nparcel->kategori,
                ];
            }
        }else{
            for($i = 1;$i<$j;$i++){
                $s = 'pe-';
                if($req[$s.$i]){
                    $parcel = modelPembelajaran::create([
                        'metodePembelajaran' => $req[$s.$i],
                        'kategori' => substr($s,0,2),
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                }
                $s = 'mo-';
                if($req[$s.$i]){
                    $parcel = modelPembelajaran::create([
                        'metodePembelajaran' => $req[$s.$i],
                        'kategori' => substr($s,0,2),
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                }
                $s = 'me-';
                if($req[$s.$i]){
                    $parcel = modelPembelajaran::create([
                        'metodePembelajaran' => $req[$s.$i],
                        'kategori' => substr($s,0,2),
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                }
                $s = 'te-';
                if($req[$s.$i]){
                    $parcel = modelPembelajaran::create([
                        'metodePembelajaran' => $req[$s.$i],
                        'kategori' => substr($s,0,2),
                        'informasi_id' => session()->get('informasiUmum')['id'],
                    ]);
                }
                $data[$i] = [
                    'id' => $parcel->id,
                    'id_tl' => $s.$i,
                    'isi' => $req[$s.$i],
                    'kat' => $parcel->kategori,
                ];
            }
        }
        session(['model'=>$data]);
        //echo json_encode(session()->get('ppp'));
        $stat = session()->get('mod_stat')+1;
        session(['mod_stat' => $stat]);
        //echo $parcel->id;
        return redirect('/modul/buat/informasi/6');
    }

    public function informasiUmum_Selesai(){
        //echo json_encode(session()->get('ppp'));
        //echo "</br>";
        //echo session()->get('ppp')[0]['id'];
        $parcel = komponenInti::create();
        $mod_id = session()->get('mod_id');
        dataModulAjar::where('id',$mod_id)->update(['komponen_id'=>$parcel->id]);
        return view('modul.1selesai');
    }

// =============================================================================

    // Komponen Inti
    public function inti_modul($step){
        if(session()->has('mod_id') == 0){
            return redirect()->back();
        }

        $mod_id = session()->get('mod_id');
        $judul = dataModulAjar::where('id',$mod_id)->get()->first();

        if(!is_numeric($step)){
            return redirect()->back();
        }

        $pos = $step - 1;
        $go = "";

        switch($step){
            case 1:
                $go = "tujuan";
                break;
            case 2:
                $go = "asesmen";
                break;
            case 3:
                $go = "pemahaman";
                break;
            case 4:
                $go = "pemantik";
                break;
            case 5:
                $go = "pembukaan";
                break;
            case 6:
                $go = "kegiatanInti";
                break;
            case 7:
                $go = "penutup";
                break;
            case 8:
                $go = "refleksi";
                break;
            case 'selesai':
                $go = "selesai";
                break;
        }

        $data = [
            'judul' => $judul->judul,
            'view' => "modul.2". $go,
            'go' => $go,
            'pos' => $pos,
            'aksi' => 'inti/' . $go . '-aksi',
            'pos_s' => $pos * 14.3,
        ];

        //echo session('mod_id') . " - w";
        return view('modul.2komponenInti',['res' => $data]);
        //echo json_encode(session()->get('identitas'));
    }

    public function tujuan_aksi(Request $req){
        $data = $req->validate([
            'tujuan' => 'required',
        ]);

        $data = dataModulAjar::where('id',session()->get('mod_id'))->first();
        $ki_id = $data->komponen_id;
        $parcel = komponenInti::where('id',$ki_id)->update(['tujuan'=>$req->tujuan]);
        session(['ki_tujuan'=>$req->tujuan]);
        return redirect('/modul/buat/inti/2');
    }

    public function asesmen_aksi(Request $req){
        $data = $req->validate([
            'a_d' => 'required',
            'a_f' => 'required',
            'a_s' => 'required',
        ]);

        $data = dataModulAjar::where('id',session()->get('mod_id'))->first();
        $ki_id = $data->komponen_id;
        $parcel = komponenInti::where('id',$ki_id)->update([
            'asasmen_diagnostik'=>$req->a_d,
            'asasmen_formatif'=>$req->a_f,
            'asasmen_sumatif'=>$req->a_s,
        ]);
        session(['ki_a_d'=>$req->a_d]);
        session(['ki_a_f'=>$req->a_f]);
        session(['ki_a_s'=>$req->a_s]);
        return redirect('/modul/buat/inti/3');
    }

    public function pemahaman_aksi(Request $req){
        $data = $req->validate([
            'pemahaman' => 'required',
        ]);

        $data = dataModulAjar::where('id',session()->get('mod_id'))->first();
        $ki_id = $data->komponen_id;
        $parcel = komponenInti::where('id',$ki_id)->update([
            'pemahaman_bermakna'=>$req->pemahaman,
        ]);
        session(['ki_pemahaman'=>$req->pemahaman]);
        return redirect('/modul/buat/inti/4');
    }

    public function pemantik_aksi(Request $req){
        $data = $req->validate([
            'pemantik' => 'required',
        ]);

        $data = dataModulAjar::where('id',session()->get('mod_id'))->first();
        $ki_id = $data->komponen_id;
        $parcel = komponenInti::where('id',$ki_id)->update([
            'pemahaman_pemantik'=>$req->pemantik,
        ]);
        session(['ki_pemantik'=>$req->pemahaman]);
        return redirect('/modul/buat/inti/5');
    }

    public function pembukaan_aksi(Request $req){
        $data = $req->validate([
            'p_1a' => 'required',
            'p_2a' => 'required',
            'p_3a' => 'required',
            'p_4a' => 'required',
            'p_5a' => 'required',
            'p_6a' => 'required',
            'p_7a' => 'required',

            'p_1b' => 'required',
            'p_2b' => 'required',
            'p_3b' => 'required',
            'p_4b' => 'required',
            'p_5b' => 'required',
            'p_6b' => 'required',
            'p_7b' => 'required',
        ]);

        $data = dataModulAjar::where('id',session()->get('mod_id'))->first();
        $ki_id = $data->komponen_id;
        //$parcel = komponenInti::where('id',$ki_id)->update([
        //    'pemahaman_pemantik'=>$req->pemantik,
        //]);
        //session(['ki_pemantik'=>$req->pemahaman]);
        return redirect('/modul/buat/inti/6');
    }

    public function kegiatanInti_aksi(Request $req){
        $data = $req->validate([

        ]);

        $data = dataModulAjar::where('id',session()->get('mod_id'))->first();
        $ki_id = $data->komponen_id;
        //$parcel = komponenInti::where('id',$ki_id)->update([
        //    'pemahaman_pemantik'=>$req->pemantik,
        //]);
        //session(['ki_pemantik'=>$req->pemahaman]);
        return redirect('/modul/buat/inti/7');
    }

    public function penutup_aksi(Request $req){
        $data = $req->validate([

        ]);

        $data = dataModulAjar::where('id',session()->get('mod_id'))->first();
        $ki_id = $data->komponen_id;
        //$parcel = komponenInti::where('id',$ki_id)->update([
        //    'pemahaman_pemantik'=>$req->pemantik,
        //]);
        //session(['ki_pemantik'=>$req->pemahaman]);
        return redirect('/modul/buat/inti/8');
    }

    public function refleksi_aksi(Request $req){
        $data = $req->validate([

        ]);

        $data = dataModulAjar::where('id',session()->get('mod_id'))->first();
        $ki_id = $data->komponen_id;
        //$parcel = komponenInti::where('id',$ki_id)->update([
        //    'pemahaman_pemantik'=>$req->pemantik,
        //]);
        //session(['ki_pemantik'=>$req->pemahaman]);
        return redirect('/modul/buat/inti/selesai');
        //echo "y";
    }

    public function inti_selesai(Request $req){
        $data = $req->validate([

        ]);

        $data = dataModulAjar::where('id',session()->get('mod_id'))->first();
        $ki_id = $data->komponen_id;
        //$parcel = komponenInti::where('id',$ki_id)->update([
        //    'pemahaman_pemantik'=>$req->pemantik,
        //]);
        //session(['ki_pemantik'=>$req->pemahaman]);
        $this->flush_session();
        return view('modul.2selesai');
    }

}
