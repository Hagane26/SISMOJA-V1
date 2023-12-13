<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class profile_ctrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.profile');
    }

    public function aksi_update(Request $request){
        $data = User::where('id',$request->id)->get()->first();
        if($data){
            $parcel = array([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tglLahir,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'whatsapp' => $request->whatsapp,
            ]);
            $new = User::where('id',$request->id)->update($parcel[0]);
            if($new){
                Auth::logout();
                return Redirect::to('login');
            }
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
