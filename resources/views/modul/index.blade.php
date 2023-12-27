@extends('support.layout')

@section('judul','Informasi Umum')

@section('isi')
    @include('users.navbarUser')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-3 ms-5">

        <div class="card" style="width: 50rem">
            <div class="card-body">
                <h4 class="card-title">Modul Saya</h4>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 30%">Materi</th>
                        <th scope="col">Nama Penyusun</th>
                        <th scope="col">Terakhir Diperbaharui</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($modul as $m)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $m->judul }}</td>
                            <td>{{ $m }}</td>
                            <td>{{ $m->updated_at->format('d F Y') }}</td>
                            <td>
                                <a href="" class="btn btn-primary">Lihat</a>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>
        </div>


    </div>
@endsection
