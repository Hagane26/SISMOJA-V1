@extends('support.layout')

@section('judul','Modul Ajar')

@section('isi')
    @include('users.navbarUser')

    <div class="container-fluid">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 50rem">
                <div class="card-header">
                    <h5 class="card-title">Informasi Umum</h5>
                </div>
                <div class="card-body">

                        <div class="card card-body">
                            <form action="/modul/informasiUmum" method="POST">
                                @csrf
                                <!-- Materi -->
                                <div class="row g-2 align-items-center ms-5 mb-2">
                                    <div class="col-3">
                                        <label class="col-form-label">Judul Materi</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="materi" name="materi" class="form-control">
                                    </div>
                                </div>

                                <!-- Sekolah  -->
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputKategori">Kategori</label>
                                    <select class="form-select" id="kategori" name="kategori">
                                    <option selected>Pilih...</option>
                                    @foreach ($data as $d)
                                    <option value="{{ $d->nama }}">{{ $d->nama  }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="col g-2 align-items-center ms-5 mb-2 mt-3">
                                    <center>
                                        <div class="row-auto mb-2">
                                            <input type="submit" class="btn btn-primary" style="width: 15rem"
                                                value="login">
                                        </div>
                                        <div class="row-auto">
                                            <a href=""> Lupa Password? </a>
                                        </div>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
