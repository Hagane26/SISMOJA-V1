@extends('support.layout')

@section('judul','Informasi Umum')

@section('isi')
    @include('users.navbarUser')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-3 ms-5">

        <div class="position-relative mt-4 mb-5">
            <div class="progress" style="height: 5px;">
                <div class="progress-bar bg-success" role="progressbar" aria-label="Progress" style="width: {{ $res['pos_s'] }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <a href="/modul/buat/informasi/1" type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $res['pos'] == 0 ? 'primary' : ($res['pos'] > 0 ? 'success' : 'secondary') }} rounded-pill" style="width: 2rem; height:2rem; margin-left:0%;">1</a>
            <a href="/modul/buat/informasi/2" type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $res['pos'] == 1 ? 'primary' : ($res['pos'] > 1 ? 'success' : 'secondary') }} rounded-pill" style="width: 2rem; height:2rem; margin-left:20%;">2</a>
            <a href="/modul/buat/informasi/3" type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $res['pos'] == 2 ? 'primary' : ($res['pos'] > 2 ? 'success' : 'secondary') }} rounded-pill" style="width: 2rem; height:2rem; margin-left:40%;">3</a>
            <a href="/modul/buat/informasi/4" type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $res['pos'] == 3 ? 'primary' : ($res['pos'] > 3 ? 'success' : 'secondary') }} rounded-pill" style="width: 2rem; height:2rem; margin-left:60%;">4</a>
            <a href="/modul/buat/informasi/5" type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $res['pos'] == 4 ? 'primary' : ($res['pos'] > 4 ? 'success' : 'secondary') }} rounded-pill" style="width: 2rem; height:2rem; margin-left:80%;">5</a>
            <a href="/modul/buat/informasi/6" type="button" class="position-absolute top-0 translate-middle btn btn-sm btn-{{ $res['pos'] == 5 ? 'primary' : ($res['pos'] > 5 ? 'success' : 'secondary') }} rounded-pill" style="width: 2rem; height:2rem; margin-left:100%">6</a>
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
                <h4 class="card-title" style="font-weight:bold">Judul Materi : {{ $res['judul'] }}</h4>
                <h6 class="card-subtitle"> Informasi Umum </h6>
                <form action="/modul/buat/{{ $res['aksi'] }}" method="post">
                    @csrf
                    @include($res['view'])
                </form>
            </div>
        </div>

    </div>
@endsection
