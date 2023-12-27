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
        if($info->modelPembelajaran_id ==''){
            $model = $msg_default;
        }else{
            $model = modelPembelajaran::where('id',$info->modelPembelajaran_id)->get()->first();
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

    public function aksi_buat_modul(Request $req){
        session()->forget('mod_id');
        session()->forget('identitas');
        session()->forget('komponenAwal');
        session()->forget('ppp');
        session()->forget('model');
        session()->forget('sarana');
        session()->forget('prasarana');
        session()->forget('tpd');
        session()->forget('mod_stat');

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
            session(['mod_stat' => 1]);
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
            session(['mod_stat' => 2]);
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
                session(['mod_stat' => 4]);
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
                session(['mod_stat' => 5]);
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
                if($req['i_j'.$i]){
                    $parcel = modelPembelajaran::where('id',session()->get('model')[$i]['id'])->update([
                        'metodePembelajaran' => $req['nj_'.$i],
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
                    $parcel = modelPembelajaran::create([
                        'metodePembelajaran' => $req['nj_'.$i],
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
        session(['model'=>$data]);
        //echo json_encode(session()->get('ppp'));
        session(['mod_stat' => 6]);
        //echo $parcel->id;
        return redirect('/modul/buat/informasi/6');
    }

    public function informasiUmum_Selesai(){
        //echo json_encode(session()->get('ppp'));
        //echo "</br>";
        //echo session()->get('ppp')[0]['id'];
        return view('modul.1selesai');
    }
}
