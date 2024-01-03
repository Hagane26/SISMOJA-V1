@extends('support.layout')

@section('judul','Buat Modul')

@section('isi')
    @include('users.navbarUser')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-5 ms-5">
        <div class="card border-primary" style="width:60rem">
            <div class="card-body">
                @if ($error == 1)
                    <div
                        class="alert {{ $alert }}"
                        role="alert"
                    >
                        <strong class="bi bi-info-square"> {{ $msg }} </strong>
                    </div>

                @endif
                <h4 class="card-title">Masukan Judul Materi</h4>
                <form action="/modul/buat-aksi" method="post">
                    @csrf
                    <input type="text" class="form-control mb-3" name="materi" id="materi">
                    <button type="submit" class="btn btn-success bi-pencil-square" style="width: 100%"> Mulai Buat Modul </button>
                </form>
            </div>
        </div>

    </div>
@endsection
