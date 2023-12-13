<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\login_ctrl;
use App\Http\Controllers\register_ctrl;

use App\Http\Controllers\ModulAjar_ctrl;
use App\Http\Controllers\sekolah_ctrl;

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

// Main
Route::get('/dashboard',function(){
    return view('dashboard');
});

// Modul
Route::get('/modul',[ModulAjar_ctrl::class,'index']);
Route::get('/modul/buat',[ModulAjar_ctrl::class,'buat']);

// sekolah dan kelas index
Route::get('/sekolah',[sekolah_ctrl::class,'index']);
Route::get('/sekolah/kelas/{id}',[sekolah_ctrl::class,'kelas']);

// tambah sekolah
Route::get('/sekolah/tambah',[sekolah_ctrl::class,'tambahSekolah']);
Route::get('/sekolah/tambah/{id}',[sekolah_ctrl::class,'tambahKelas']);

// aksi tambah
Route::post('/sekolah/tambah/data',[sekolah_ctrl::class,'aksi_tambahSekolah']);
Route::post('/sekolah/tambah/kelas/{id}',[sekolah_ctrl::class,'aksi_tambahKelas']);

// aksi hapus
Route::get('/sekolah/kelas/hapus/{id}',[sekolah_ctrl::class,'hapusKelas']);
Route::get('/sekolah/hapus/{id}',[sekolah_ctrl::class,'hapusSekolah']);

// json realtime
Route::get('/sa',[sekolah_ctrl::class,'sekolahAll']);
Route::get('/ka/{id}',[sekolah_ctrl::class,'kelasAll']);
