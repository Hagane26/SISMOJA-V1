@extends('support.layout')

@section('judul')
    Dashboard
@endsection

@section('isi')
@include('users.navbarUser')

  <div class="container-fluid mt-2">
    <h1>{{ Auth::user()->nama }}</h1>
  </div>

@endsection
