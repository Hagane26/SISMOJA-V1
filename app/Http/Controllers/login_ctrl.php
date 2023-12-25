<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class login_ctrl extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function store(Request $request)
    {
        $data = array(
            'email' => $request->email,
            'password' => $request->password,
        );
        if(Auth::attempt($data)){
            return redirect('/dashboard');
        }else{
            return redirect()->back()->withErrors(['msg'=>'Email atau Password Salah!!']);
        }
    }

}
