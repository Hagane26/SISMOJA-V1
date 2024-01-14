@extends('support.layout')

@section('judul','Komponen Inti')

@section('isi')
    @include('users.navbarUser')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-5 ms-5">
        <div class="card border-primary" style="width:60rem">
            <div class="card-body">

                <h4 class="card-title">Anda Telah Menyelesaikan Pembuatan Modul!</h4>
                <a href="/modul" class="btn btn-success">Lihat Modul</a>
            </div>
        </div>

    </div>
@endsection