@extends('support.layout')

@section('judul','Modul Ajar')

@section('isi')

<div class="row" style="width:90%;">
    <div class="col-2">
        @include('users.navbarUser')
    </div>

    <div class="col">
        <div class="card" style="width: 50rem; margin-left:0%;">
            <div class="card-header">
                <h5 class="card-title">Informasi Umum</h5>
            </div>
            <div class="card-body">
                 <div class="card card-body">
                    <form action="/modul/buat/informasiumum" method="POST">
                        @csrf

                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

                        <!-- Materi -->
                        <div class="row g-2 align-items-center ms-5 mb-2">
                            <div class="col-2">
                                <label class="col-form-label">Judul Materi</label>
                            </div>
                            <div class="col-3" style="width: 75%">
                                <input type="text" id="materi" name="materi" class="form-control">
                            </div>
                        </div>

                        <!-- Mata Pelajaran -->
                        <div class="row g-4 align-items-center ms-5 mb-2">
                            <div class="col-1 me-4">
                                <label for="inputEmail" class="col-form-label">Mata Pelajaran</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="mapel" name="mapel" class="form-control">
                            </div>

                            <!-- Tahun Ajaran -->
                            <div class="col-1 me-4">
                                <label for="inputEmail" class="col-form-label">Tahun Ajaran</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="ta" name="ta" class="form-control">
                            </div>
                        </div>

                        <!-- Sekolah  -->
                        <div class="row g-2 align-items-center ms-5 mb-2">
                            <div class="input-group mb-3" style="width: 92%">
                                <label class="input-group-text">Sekolah</label>
                                <select class="form-select" id="sekolah" name="sekolah">
                                <option selected>Pilih...</option>
                                @foreach ($data as $d)
                                <option value="{{ $d->id }}"> {{ $d->kategori }} {{ $d->nama  }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Kelas -->
                        <div class="row g-2 align-items-center ms-5 mb-2">
                            <div class="col-2">
                                <label class="col-form-label">Kelas id</label>
                            </div>
                            <div class="col-3" style="width: 75%">
                                <input type="number" id="kelas" name="kelas" class="form-control">
                            </div>
                        </div>

                        <!-- Kompetensi Awal -->
                        <div class="row g-2 align-items-center ms-5 mb-2">
                            <label class="col-form-label">Kompetensi Awal</label>
                            <textarea name="ka" id="editor">

                            </textarea>
                        </div>

                        <!-- Profil Pelajar Pancasila -->
                        <div class="row g-2 align-items-center ms-5 mb-2">
                            <label class="col-form-label">Profil Pelajar Pancasila</label>
                            <textarea name="pp" id="editor2">

                            </textarea>
                        </div>

                        <!-- Sarana dan prasarana -->
                        <div class="row g-2 align-items-center ms-5 mb-2">
                            <label class="col-form-label">Sarana dan PraSarana</label>
                            <textarea name="sarana" id="editor3">

                            </textarea>
                        </div>

                        <!-- Target Peserta Didik -->
                        <div class="row g-2 align-items-center ms-5 mb-2">
                            <label class="col-form-label">Target Peserta Didik</label>
                            <textarea name="target" id="editor4">

                            </textarea>
                        </div>

                        <!-- Model Pembelajaran -->
                        <div class="row g-2 align-items-center ms-5 mb-2">
                            <label class="col-form-label">Model Pembelajaran Yang Digunakan</label>
                            <textarea name="mp" id="editor5">

                            </textarea>
                        </div>

                        <!-- tombol -->
                        <div class="fixed-bottom mb-3">
                            <div class="col g-2 align-items-center ms-5 mb-2 mt-3">
                                <div class="row-auto mb-2">
                                    <input type="submit" class="btn btn-success" style="width: 8rem" value="Simpan">
                                </div>
                                <div class="row-auto">
                                    <a class="btn btn-danger" style="width: 8rem" href="/modul"> Batalkan </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#editor3' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#editor4' ) )
            .catch( error => {
                console.error( error );
            } );

            ClassicEditor
            .create( document.querySelector( '#editor5' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
