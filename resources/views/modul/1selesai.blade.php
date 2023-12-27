@extends('support.layout')

@section('judul','Informasi Umum')

@section('isi')
    @include('users.navbarUser')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-5 ms-5">
        <div class="card border-primary" style="width:60rem">
            <div class="card-body">

                <h4 class="card-title">Informasi Umum Selesai</h4>
                <a href="/modul/buat/inti/1" class="btn btn-success">Buat Komponen Inti</a>
            </div>
        </div>

    </div>
@endsection
