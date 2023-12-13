<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\User;

class register_ctrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
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
        $pass = $request->password;
        $cpass = $request->passwordC;

        if($pass != $cpass){
            return redirect()->back();
        }else{
            $parcel = [
                'nama'=>$request->nama,
                'email' => $request->email,
                'nik'=>$request->nik,
                'tanggal_lahir'=>$request->tglLahir,
                'gender'=>$request->gender,

                'alamat' => "",
                'telepon' => 0,
                'whatsapp' => 0,

                'password'=>password_hash($pass,PASSWORD_DEFAULT)
            ];
            $send = User::create($parcel);
            if($send){
                return redirect('dashboard');
            }else{
                return redirect()->back();
            }
        }
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
