@extends('support.layout')

@section('judul')
    login
@endsection

@section('isi')
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 30rem">
            <div class="card-header">
                <center>
                    <h5 class="card-title">Register Sismoja</h5>
                </center>
            </div>
            <div class="card-body">

                    <div class="card card-body">

                        <form action="/regisAction" method="POST">
                            @csrf
                            <!-- Email field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputEmail" class="col-form-label">Email</label>
                                </div>
                                <div class="col-auto">
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>

                            <!-- Nama field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputNama" class="col-form-label">Nama</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="nama" name="nama" class="form-control">
                                </div>
                            </div>

                            <!-- NIK Field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputNik" class="col-form-label">NIK</label>
                                </div>
                                <div class="col-auto">
                                    <input type="number" id="nik" name="nik" class="form-control">
                                </div>
                            </div>

                            <!-- Tanggal Lahir field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputTanggal" class="col-form-label">Tanggal Lahir</label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" id="tglLahir" name="tglLahir" class="form-control">
                                </div>
                            </div>

                            <!-- gender field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputNama" class="col-form-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-auto">
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
                            </div>

                            <!-- Password field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputPassword" class="col-form-label">Password</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" id="inputPassword" name="password" class="form-control"
                                        aria-describedby="passwordHelpInline">
                                </div>
                            </div>

                            <!-- Password Confirm field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
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
                                        <input type="submit" class="btn btn-primary" style="width: 15rem"
                                            value="Register">
                                    </div>
                                </center>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
@endsection
