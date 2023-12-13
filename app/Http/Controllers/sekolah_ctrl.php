<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolahData;
use App\Models\sekolahKelas;

class sekolah_ctrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sekolah.index');
    }

    public function kelas($id){
        $data = sekolahData::where('id',$id)->get()->first();
        return view('sekolah.kelas',$data);
    }

    public function tambahSekolah(){
        return view('sekolah.tambah');
    }

    public function tambahKelas($id){
        $data = sekolahData::where('id',$id)->get()->first();
        if($data){
            return view('sekolah.tambahKelas',$data);
        }
    }

    public function aksi_tambahSekolah(Request $request){
        $nama = $request->nama;
        $kategori = $request->kategori;
        $cek = sekolahData::where(['kategori'=>$kategori,'nama'=>$nama])->get()->first();
        if($cek){
            return back()->withErrors(['stat' => 0,'msg'=>'Sekolah Telah Ada']);
        }else{
            $data = [
                'nama' => $nama,
                'kategori' => $kategori,
                'email' => $request->email,
                'alamat' => $request->alamat,
            ];
            $send = sekolahData::create($data);
            if($send){
                return redirect('/sekolah');
            }else{
                return back()->withErrors([]);
            }
        }
    }

    public function aksi_tambahKelas(Request $request){
        $sekolah = $request->sekolah_id;
        $kelas = $request->kelas;
        $cek = sekolahKelas::where(['sekolah_id'=>$sekolah,'kelas'=>$kelas])->get()->first();
        if($cek){
            return back()->withErrors(['stat' => 0,'msg'=>'Sekolah Telah Ada']);
        }else{
            $data = [
                'sekolah_id' => $sekolah,
                'kelas' => $kelas,
                'jurusan' => $request->jurusan,
            ];
            $send = sekolahKelas::create($data);
            if($send){
               return redirect('/sekolah');
            }else{
                return back()->withErrors([]);
            }
        }
    }

    public function hapusKelas($id){
        $data = sekolahKelas::where('id',$id)->delete();
        $status = 0;
        $msg = "none";
        if($data){
            $status = 1;
            $msg = "Kelas Berhasil Dihapus";
        }else{
            $status = 0;
            $msg = "Kelas Gagal Dihapus";
        }
        return back()->with(['status'=>$status,'msg'=>$msg]);
    }

    public function hapusSekolah($id){
        $data = sekolahData::where('id',$id)->delete();
        $status = 0;
        $msg = "none";
        if($data){
            $status = 1;
            $msg = "Sekolah Berhasil Dihapus";
        }else{
            $status = 0;
            $msg = "Sekolah Gagal Dihapus";
        }
        return back()->with(['status'=>$status,'msg'=>$msg]);
    }

    public function sekolahAll(){
        $data = sekolahData::get();
        $count = sekolahData::get()->count();
        $parcel = array();
        for($i = 0; $i < $count;$i++){
            $kelas = sekolahKelas::where('sekolah_id',$data[$i]->id)->count();
            array_push($parcel,[
                'id'=>$data[$i]->id,
                'nama'=>$data[$i]->nama,
                'kategori'=>$data[$i]->kategori,
                'email'=>$data[$i]->email,
                'alamat'=>$data[$i]->alamat,
                'jumlah'=>$kelas,
                'created_at'=>$data[$i]->created_at,
                'updated_at'=>$data[$i]->updated_at,
            ]);
        }
        echo json_encode(array("result" => $parcel));
    }

    public function kelasAll($id){
        $data = sekolahKelas::where('sekolah_id',$id)->get();
        echo json_encode(array("result" => $data));
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
