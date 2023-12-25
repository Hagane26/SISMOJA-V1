<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\dataModulAjar;

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
        //
    }

    public function buat_modul(){
        if($this->cek_status_user()){
            return view('modul.buat')->with(['error'=>1,'msg'=>'Lengkapi Biodata Terlebih Dahulu.','btn'=>'disabled','alert'=>'alert-info']);
        }else{
            return view('modul.buat')->with(['error'=>0,'msg'=>'','btn'=>'','alert'=>'']);
        }
    }

    public function aksi_buat_modul(Request $req){
        $req->validate([
            'materi' => 'required',
        ]);

        if($req){
            $parcel = dataModulAjar::create([
                'judul'=>$req->materi,
                'users_id'=>Auth::user()->id,
            ]);
            if($parcel){
                return redirect('/modul/buat/informasi-umum');
            }else{ 
                return view('modul.buat')->with(['error'=>1,'msg'=>'Terjadi Kesalahan Input Data.','btn'=>'disabled','alert'=>'alert-danger']);
            }
        }
    }
}
