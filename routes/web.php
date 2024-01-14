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
    route::get('/modul',[ModulAjar_ctrl::class,'index']);
    Route::get('/modul/buat',[ModulAjar_ctrl::class,'buat_modul']);
    Route::post('/modul/buat-aksi',[ModulAjar_ctrl::class,'aksi_buat_modul']);

    route::get('/modul/buat/informasi/{step}',[ModulAjar_ctrl::class,'informasi_modul']);
    route::post('/modul/buat/informasi/identitas-aksi',[ModulAjar_ctrl::class,'identitas_aksi']);
    route::post('/modul/buat/informasi/komponenAwal-aksi',[ModulAjar_ctrl::class,'komponenAwal_aksi']);
    route::post('/modul/buat/informasi/ppp-aksi',[ModulAjar_ctrl::class,'ppp_aksi']);
    route::post('/modul/buat/informasi/sarana-aksi',[ModulAjar_ctrl::class,'sarana_aksi']);
    route::post('/modul/buat/informasi/target-aksi',[ModulAjar_ctrl::class,'target_aksi']);
    route::post('/modul/buat/informasi/model-aksi',[ModulAjar_ctrl::class,'model_aksi']);
    route::get('/modul/buat/1/selesai',[ModulAjar_ctrl::class,'informasiUmum_Selesai']);

    route::get('/modul/buat/inti/{step}',[ModulAjar_ctrl::class,'inti_modul']);
    route::post('/modul/buat/inti/tujuan-aksi',[ModulAjar_ctrl::class,'tujuan_aksi']);
    route::post('/modul/buat/inti/asesmen-aksi',[ModulAjar_ctrl::class,'asesmen_aksi']);
    route::post('/modul/buat/inti/pemahaman-aksi',[ModulAjar_ctrl::class,'pemahaman_aksi']);
    route::post('/modul/buat/inti/pemantik-aksi',[ModulAjar_ctrl::class,'pemantik_aksi']);
    route::post('/modul/buat/inti/pembukaan-aksi',[ModulAjar_ctrl::class,'pembukaan_aksi']);
    route::post('/modul/buat/inti/kegiatanInti-aksi',[ModulAjar_ctrl::class,'kegiatanInti_aksi']);
    route::post('/modul/buat/inti/penutup-aksi',[ModulAjar_ctrl::class,'penutup_aksi']);
    route::post('/modul/buat/inti/refleksi-aksi',[ModulAjar_ctrl::class,'refleksi_aksi']);
    route::get('/modul/buat/2/selesai',[ModulAjar_ctrl::class,'inti_selesai']);

    route::get('/modul/buat/lampiran/{step}',[ModulAjar_ctrl::class,'lampiran']);
    route::post('/modul/buat/lampiran/lampiran1-aksi',[ModulAjar_ctrl::class,'lampiran1_aksi']);
    route::post('/modul/buat/lampiran/lampiran2-aksi',[ModulAjar_ctrl::class,'lampiran2_aksi']);
    route::post('/modul/buat/lampiran/lampiran3-aksi',[ModulAjar_ctrl::class,'lampiran3_aksi']);
    route::get('/modul/buat/3/selesai',[ModulAjar_ctrl::class,'lampiran_selesai']);

    route::post('/modul/lihat', [ModulAjar_ctrl::class,'lihat_modul']);
    route::post('/modul/hapus', [ModulAjar_ctrl::class,'hapus_modul']);

    route::get('/pdf/{user}/{mod}/{s}',[ModulAjar_ctrl::class,'l_pdf']);
});
