@extends('support.layout')
@section('judul',"Tambah Sekolah")

@section('isi')
<div class="container-fluid">
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 30rem">
            <div class="card-header">
                <h5 class="card-title">Tambah Kelas Dari Sekolah {{ $kategori }} {{ $nama }}</h5>
            </div>
            <div class="card-body">

                    <div class="card card-body">
                        <form action="/sekolah/tambah/kelas/{{ $id }}" method="POST">
                            @csrf

                            <div class="col-auto">
                                <input type="hidden" id="sekolah_id" name="sekolah_id" class="form-control" value="{{ $id }}">
                            </div>

                            <!-- kelas -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label class="col-form-label">Kelas</label>
                                </div>
                                <div class="col-auto">
                                    <input type="number" id="kelas" name="kelas" class="form-control">
                                </div>
                            </div>

                            <!-- Jurusan -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label class="col-form-label">Jurusan</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="jurusan" name="jurusan" class="form-control">
                                </div>
                            </div>

                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-auto">
                                    <input type="submit" class="btn btn-primary" style="width: 10rem"
                                        value="Tambah Kelas">
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
