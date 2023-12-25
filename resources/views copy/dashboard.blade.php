@extends('support.layout')

@section('judul')
    Dashboard
@endsection

@section('isi')

<div class="row">
    <div class="col-2">
        @include('users.navbarUser')
    </div>

    <div class="col-8">

        <div class="container-fluid"  data-bs-smooth-scroll="true" >
            <center> <h3>Selamat datang {{ Auth::user()->nama }} Di {{ config('app.name') }}</h3></center>
        </div>
    </div>
</div>


@endsection
