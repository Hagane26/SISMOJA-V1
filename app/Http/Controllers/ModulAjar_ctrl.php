<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;

use App\Models\sekolahData;
use App\Models\sekolahKelas;

use App\Models\modulAjar;
use App\Models\modulKomponenInti;
use App\Models\modulLampiran;

class ModulAjar_ctrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modul.index');
    }

    public function buat()
    {
        $data = sekolahData::get();
        //dd($data);
        return view('modul.informasiUmum',array('data'=>$data));
    }

    public function komponenInti(){
        return view('modul.komponenInti1');
    }

    public function aksi_InformasiUmum(Request $request){
        $ki = modulKomponenInti::create(['tujuan'=>'temp']);
        $ki_id = modulKomponenInti::where('tujuan','temp')->get()->first();

        $data = array(
            'materi'=>$request->materi,
            'mata_pelajaran'=>$request->mapel,
            'tahun_ajaran'=>$request->ta,
            'kompetensiAwal'=>$request->ka,
            'profilPelajarPancasila'=>$request->pp,
            'sarana'=>$request->sarana,
            'target'=>$request->target,
            'modelPembelajaran'=>$request->mp,
            'users_id'=>$request->user_id,
            'sekolah_id'=>$request->sekolah,
            'kelas_id'=>$request->kelas,
            'komponenInti_id'=>$ki_id->id,
            'status' => 'temp',
        );
        $send = modulAjar::updateOrCreate($data);
        if($send){
            return redirect('/modul/buat/komponeninti')->with('idKI',$ki_id->id);
        }else{
            return back();
        }
    }

    public function aksi_komponenInti(Request $request){
        $ki_id = $request->ki_id;
        $data = array(
            'tujuan'=>$request->TP,
            'asesmen'=>$request->asesmen,
            'pemahaman'=>$request->PB,
            'pertanyaan'=>$request->PP,
            'kegiatan'=>$request->KP,
            'refleksi'=>$request->refleksi,
        );
        $send = modulKomponenInti::where('id',$ki_id)->update($data);
        if($send){
            return redirect('/modul');
        }else{
            return back();
        }
    }

    public function lihat($id){
        $data = modulAjar::where('id',$id)->get()->first();
        $count = modulAjar::get()->count();


            $user = User::where('id',$data->users_id)->get()->first();
            $kelas = sekolahKelas::where('id',$data->kelas_id)->get()->first();
            $sekolah = sekolahData::where('id',$data->sekolah_id)->get()->first();
            $komponenInti = modulKomponenInti::where('id',$data->komponenInti_id)->get()->first();

           $parcel = array(
                'id'=>$data->id,
                'materi'=>$data->materi,
                'mapel'=>$data->mata_pelajaran,
                'TA'=>$data->tahun_ajaran,

                'kompetensiAwal'=>$data->kompetensiAwal,
                'profilPelajarPancasila'=>$data->profilPelajarPancasila,
                'sarana'=>$data->sarana,
                'target'=>$data->target,
                'modelPembelajaran'=>$data->modelPembelajaran,

                'user'=>$user->nama,
                'email'=>$user->email,

                'tujuan'=>$komponenInti->tujuan,
                'asesmen'=>$komponenInti->asesmen,
                'pemahaman'=>$komponenInti->pemahaman,
                'pertanyaan'=>$komponenInti->pertanyaan,
                'kegiatan'=>$komponenInti->kegiatan,
                'refleksi'=>$komponenInti->refleksi,

                'kelas' => $kelas->kelas,
                'jurusan' => $kelas->jurusan,

                'sekolah' => $sekolah->nama,
                'kategori_sekolah' => $sekolah->kategori,

                'status' => $data->status,

                'created_at'=>$data->created_at,
                'updated_at'=>$data->updated_at,
            );

        //echo json_encode($parcel);
        return view('modul.lihat',$parcel);
    }

    public function hapus($id){
        $data = modulAjar::where('id',$id)->get()->first();
        $id_KI = modulKomponenInti::where('id',$data->komponenInti_id)->delete();
        $hapus = modulAjar::where('id',$id)->delete();
        if($hapus){
            return back();
        }
    }

    public function modulAll(){
        $data = modulAjar::get();
        $count = modulAjar::get()->count();
        if($count != 0){
            $parcel = array();
            for($i = 0; $i < $count;$i++){
                $user = User::where('id',$data[$i]->users_id)->get()->first();
                array_push($parcel,[
                    'id'=>$data[$i]->id,
                    'materi'=>$data[$i]->materi,
                    'mapel'=>$data[$i]->mata_pelajaran,
                    'TA'=>$data[$i]->tahun_ajaran,
                    'user'=>$user->nama,
                    'created_at'=>$data[$i]->created_at,
                    'updated_at'=>$data[$i]->updated_at,
                ]);
            }
            echo json_encode(array("result" => $parcel));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
