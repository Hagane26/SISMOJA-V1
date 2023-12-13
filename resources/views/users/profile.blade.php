@extends('support.layout')

@section('judul')
    Profil {{ Auth::user()->nama }}
@endsection

@section('isi')
@include('users.navbarUser')

<div class="position-absolute top-50 start-50 translate-middle">
    <div class="card" style="width: 60rem">
        <div class="card-header">
            <h5 class="card-title">Detail Profil</h5>
        </div>
        <div class="card-body">

                <div class="card card-body">
                    <form action="/profil/update" method="POST" style="margin-left:5%">
                        @csrf
                        <div class="col-auto">
                            <input type="hidden" id="id" name="id" class="form-control" value="{{ Auth::user()->id }}">
                        </div>
                        <!-- Email field -->
                        <div class="row g-4 align-items-center ms-5 mb-2">
                            <div class="col-1 me-4">
                                <label for="inputEmail" class="col-form-label">Email</label>
                            </div>
                            <div class="col-auto">
                                <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>

                        <!-- Nama field -->

                            <div class="col-1 me-4">
                                <label for="inputNama" class="col-form-label">Nama</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="nama" name="nama" class="form-control" value="{{ Auth::user()->nama }}">
                            </div>
                        </div>

                        <!-- NIK Field -->
                        <div class="row g-4 align-items-center ms-5 mb-2">
                            <div class="col-1 me-4">
                                <label for="inputNik" class="col-form-label">NIK</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" id="nik" name="nik" class="form-control" value="{{ Auth::user()->nik }}">
                            </div>

                        <!-- Tanggal Lahir field -->

                            <div class="col-1 me-4">
                                <label for="inputTanggal" class="col-form-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-auto me-5">
                                <input type="date" id="tglLahir" name="tglLahir" class="form-control" value="{{ Auth::user()->tanggal_lahir }}">
                            </div>
                        </div>


                        <!-- gender field -->
                        <div class="row g-4 align-items-center ms-5 mb-2">
                            <div class="col-1 me-4">
                                <label for="inputNama" class="col-form-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-auto me-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender"
                                        value="pria">
                                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender"
                                        value="wanita">
                                    <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                </div>
                            </div>

                        <!-- Alamat -->
                            <div class="col-1 me-4">
                                <label class="col-form-label">Alamat</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="alamat" name="alamat" class="form-control" value="{{ Auth::user()->alamat }}">
                            </div>
                        </div>

                        <!-- telepon -->
                        <div class="row g-4 align-items-center ms-5 mb-2">
                            <div class="col-1 me-4">
                                <label for="inputNik" class="col-form-label">No. Telepon</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" id="telepon" name="telepon" class="form-control" value="{{ Auth::user()->telepon }}">
                            </div>

                        <!-- whatsapp -->

                            <div class="col-1 me-4">
                                <label for="inputTanggal" class="col-form-label">No. WhatsApp</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" id="whatsapp" name="whatsapp" class="form-control" value="{{ Auth::user()->whatsapp }}">
                            </div>
                        </div>

                        <!-- Password Confirm field -->
                        <div class="row g-4 align-items-center ms-5 mb-2">
                            <div class="col-1 me-4">
                                <label for="inputPassword" class="col-form-label">Password</label>
                            </div>
                            <div class="col-auto">
                                <input type="password" id="inputPassword" name="password" class="form-control"
                                    aria-describedby="passwordHelpInline">
                            </div>

                            <div class="col-1 me-4">
                                <label for="inputPasswordC" class="col-form-label">Confirm Password</label>
                            </div>
                            <div class="col-auto">
                                <input type="password" id="inputPasswordC" name="passwordC" class="form-control"
                                    aria-describedby="passwordHelpInline">
                            </div>
                        </div>


                        <div class="col g-2 align-items-center ms-5 mb-2 mt-3">
                            <center>
                                <div class="row-auto mb-2">
                                    <input type="submit" class="btn btn-success" style="width: 15rem"
                                        value="Simpan Data Profile">
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>
@endsection
