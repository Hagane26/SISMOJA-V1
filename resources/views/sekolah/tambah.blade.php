@extends('support.layout')
@section('judul',"Tambah Sekolah")

@section('isi')
<div class="container-fluid">
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 30rem">
            <div class="card-header">
                <h5 class="card-title">Tambah Data Sekolah</h5>
            </div>
            <div class="card-body">

                    <div class="card card-body">
                        <form action="/sekolah/tambah/data" method="POST">
                            @csrf

                             <!-- Kategori -->
                             <div class="input-group mb-3">
                                <label class="input-group-text" for="inputKategori">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori">
                                  <option selected>Pilih...</option>
                                  <option value="TK">TK</option>
                                  <option value="SD">SD</option>
                                  <option value="MI">MI</option>
                                  <option value="SMP">SMP</option>
                                  <option value="MTs">MTs</option>
                                  <option value="SMA">SMA</option>
                                  <option value="SMK">SMK</option>
                                  <option value="MA">MA</option>
                                </select>
                              </div>

                            <!-- Nama Sekolah -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputEmail" class="col-form-label">Nama Sekolah</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="nama" name="nama" class="form-control">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputEmail" class="col-form-label">Email Sekolah</label>
                                </div>
                                <div class="col-auto">
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputEmail" class="col-form-label">Alamat Sekolah</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="alamat" name="alamat" class="form-control">
                                </div>
                            </div>

                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-auto">
                                    <input type="submit" class="btn btn-primary" style="width: 10rem"
                                        value="Tambah Sekolah">
                                </div>
                                <div class="col-auto">
                                    <input type="submit" class="btn btn-danger" style="width: 10rem"
                                        value="Kembali">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection
