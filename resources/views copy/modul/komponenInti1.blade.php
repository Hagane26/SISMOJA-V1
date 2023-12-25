@extends('support.layout')

@section('judul','Modul Ajar')

@section('isi')
    @include('users.navbarUser')

    <div class="container-fluid mt-4">

            <div class="card" style="width: 50rem; margin-left:20%">
                <div class="card-header">
                    <h5 class="card-title">Komponen Inti </h5>
                </div>
                <div class="card-body">

                        <div class="card card-body">
                            <form action="/modul/buat/komponeninti" method="POST">
                                @csrf
                                @if (session('idKI'))
                                    <input type="hidden" id="ki_id" name="ki_id" value="{{ session('idKI') }}">
                                @endif

                                <!-- Tujuan Pembelajaran -->
                                <div class="row g-2 align-items-center ms-5 mb-2">
                                    <label class="col-form-label">Tujuan Pembelajaran</label>
                                    <textarea name="TP" id="editor">

                                    </textarea>
                                </div>

                                <!-- Asesmen -->
                                <div class="row g-2 align-items-center ms-5 mb-2">
                                    <label class="col-form-label">Asesmen</label>
                                    <textarea name="asesmen" id="editor2">

                                    </textarea>
                                </div>

                                <!-- Pemahaman Bermakna -->
                                <div class="row g-2 align-items-center ms-5 mb-2">
                                    <label class="col-form-label">Pemahaman Bermakna</label>
                                    <textarea name="PB" id="editor3">

                                    </textarea>
                                </div>

                                <!-- Pertanyaan Pemantik -->
                                <div class="row g-2 align-items-center ms-5 mb-2">
                                    <label class="col-form-label">Pertanyaan Pemantik</label>
                                    <textarea name="PP" id="editor4">

                                    </textarea>
                                </div>

                                <!-- Kegiatan Pembelajaran -->
                                <div class="row g-2 align-items-center ms-5 mb-2">
                                    <label class="col-form-label">Kegiatan Pembelajaran</label>
                                    <textarea name="KP" id="editor5">

                                    </textarea>
                                </div>

                                <!-- Refleksi Peserta Didik dan Pendidik -->
                                <div class="row g-2 align-items-center ms-5 mb-2">
                                    <label class="col-form-label">Refleksi Peserta Didik dan Pendidik</label>
                                    <textarea name="refleksi" id="editor6">

                                    </textarea>
                                </div>

                                <div class="fixed-bottom mb-3">
                                    <div class="col g-2 align-items-center ms-5 mb-2 mt-3">

                                            <div class="row-auto mb-2">
                                                <input type="submit" class="btn btn-success" style="width: 8rem"
                                                    value="Simpan">
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

            ClassicEditor
            .create( document.querySelector( '#editor6' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
