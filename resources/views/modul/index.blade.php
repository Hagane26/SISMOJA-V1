@extends('support.layout')

@section('judul','Informasi Umum')

@section('isi')
    @include('users.navbarUser')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-5 ms-2">

        <div class="card" style="width: 55rem">
            <div class="card-body">
                <h4 class="card-title">Modul Saya</h4>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 30%">Materi</th>
                        <th scope="col" style="width: 25%">Nama Penyusun</th>
                        <th scope="col">Terakhir Diperbaharui</th>
                        <th scope="col" style="width: 20%">Aksi</th>
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
                            <td>{{ $m->identitas->nama }}</td>
                            <td>{{ $m->updated_at->format('d F Y') }}</td>
                            <td>
                                <form action="{{ config('app.url') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="mod_id" value="{{ $m->id }}">
                                    <button type="submit" formaction="/modul/lihat" class="btn btn-primary">
                                        Lihat
                                    </button>

                                    <button type="submit" formaction="/modul/hapus" class="btn btn-danger bi-trash3">
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>
        </div>


    </div>
@endsection
