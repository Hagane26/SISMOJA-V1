@extends('support.layout')

@section('judul','Modul Ajar')

@section('isi')
    @include('users.navbarUser')

    <div class="container-fluid">
        <a href="/modul/buat" class="btn btn-primary">Buat Modul</a>
    </div>
@endsection
