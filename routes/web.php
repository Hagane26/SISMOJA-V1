<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\login_ctrl;
use App\Http\Controllers\register_ctrl;


use App\Http\Controllers\profile_ctrl;
use App\Http\Controllers\ModulAjar_ctrl;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

// Auth
Route::get('/login',[login_ctrl::class,'index'])->name('login');
Route::post('/loginAction',[login_ctrl::class,'store']);

// Register
Route::get('/register',[register_ctrl::class,'index']);
Route::post('/regisAction',[register_ctrl::class,'store']);

Route::get('/logout',[login_ctrl::class,'logout']);

Route::middleware('auth')->group(function(){
    // Main
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->middleware('auth');

    // profile
    Route::get('/profil',[profile_ctrl::class,'index']);
    Route::post('/profil/update',[profile_ctrl::class,'aksi_update']);

    // Modul Ajar
    Route::get('/modul/buat',[ModulAjar_ctrl::class,'buat_modul']);
    Route::post('/modul/buat-aksi',[ModulAjar_ctrl::class,'aksi_buat_modul']);
});
