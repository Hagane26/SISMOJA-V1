<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class register_ctrl extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $pass = $request->password;
        $cpass = $request->passwordC;
        $email = $request->email;
        $ce = count(user::where('email',$email)->get());

        if ($ce < 1){
            if($pass != $cpass){
                return Redirect::back()->withErrors(['msg'=>'Password Tidak Sama!!','bx1'=>'border']);
            }else{
                $parcel = [
                    'email' => $request->email,
                    'status_info' => 0,
                    'password'=>password_hash($pass,PASSWORD_DEFAULT)
                ];
                $send = User::create($parcel);
                if($send){
                    return redirect('/dashboard');
                }else{
                    return Redirect::back()->withErrors(['msg'=>'Register Error!!']);
                }
            }
        }else{
            return redirect()->back()->withErrors(['msg'=>'Email Telah Ada!']);
        }

    }
}
