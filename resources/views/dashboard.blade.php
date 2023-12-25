@extends('support.layout')

@section('judul')
    Dashboard
@endsection

@section('isi')

@include('users.navbarUser')

<div class="position-absolute top-0 start-50 translate-middle-x mt-3">
    <h3 class="mt-5">Selamat datang {{ Auth::user()->nama }} Di {{ config('app.name') }}</h3>
</div>

@endsection
