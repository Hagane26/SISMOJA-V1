@extends('support.layout')

@section('judul','Modul Ajar')

@section('isi')
    @include('users.navbarUser')

    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">Informasi Umum</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
@endsection
