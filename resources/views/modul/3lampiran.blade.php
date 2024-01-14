@extends('support.layout')

@section('judul','Lampiran')

@section('isi')
    @include('users.navbarUser')
    @include('users.stepbar')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-5 ms-2">

        <div class="position-relative mt-4 mb-5">
            <div class="progress" style="height: 5px;">
                <div class="progress-bar bg-success" role="progressbar" aria-label="Progress" style="width: {{ $res['pos_s'] }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <a href="/modul/buat/lampiran/1" type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $res['pos'] == 0 ? 'primary' : ($res['pos'] > 0 ? 'success' : 'secondary') }} rounded-pill" style="width: 2rem; height:2rem; margin-left:0%;">1</a>
            <a href="/modul/buat/lampiran/2" type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $res['pos'] == 1 ? 'primary' : ($res['pos'] > 1 ? 'success' : 'secondary') }} rounded-pill" style="width: 2rem; height:2rem; margin-left:50%;">2</a>
            <a href="/modul/buat/lampiran/3" type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $res['pos'] == 2 ? 'primary' : ($res['pos'] > 2 ? 'success' : 'secondary') }} rounded-pill" style="width: 2rem; height:2rem; margin-left:100%;">3</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-primary" style="width:50rem">
            <div class="card-body">
                <h4 class="card-title" style="font-weight:bold">Judul Modul : {{ $res['judul'] }}</h4>
                <h6 class="card-subtitle"> Komponen Inti </h6>
                <form action="/modul/buat/{{ $res['aksi'] }}" method="post" {{ $res['s_upload'] }}>
                    @csrf
                    @include($res['view'])
                </form>
            </div>
        </div>

    </div>
@endsection
