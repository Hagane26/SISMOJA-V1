@extends('support.layout')

@section('judul')
    Dashboard
@endsection

@section('isi')
@include('users.navbarUser')

  <div class="container-fluid mt-2">
    <center> <h3>Selamat datang {{ Auth::user()->nama }} Di {{ config('app.name') }}</h3></center>
  </div>

@endsection
