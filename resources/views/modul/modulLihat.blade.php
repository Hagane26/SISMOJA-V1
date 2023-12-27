@extends('support.layout')

@section('judul', $res->judul)

@section('isi')
    @include('users.navbarUser')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-3 ms-5">

        <div class="card mb-5" style="width: 40rem">
            <h3 class="card-header">MODUL AJAR : <b>{{ $res->judul }}</b></h3>
            <div class="card-body">

                <!-- -->
                <div class="card">
                    <div class="card-header fw-bold">
                      A. IDENTITAS MODUL
                    </div>
                    <div class="card-body">

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Nama Penyusun</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" value="{{ $res->data_informasi->identitas->nama }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Institusi</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" value="{{ $res->data_informasi->identitas->institusi }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" value="{{ $res->data_informasi->identitas->institusi }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Mata Pelajaran</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" value="{{ $res->data_informasi->identitas->mapel }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Kelas/Fase</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" value="{{ $res->data_informasi->identitas->kelas }} / {{ $res->data_informasi->identitas->fase }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Alokasi Waktu</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" value="{{ $res->data_informasi->identitas->alokasi_waktu }}">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- -->
                <div class="card mt-2">
                    <div class="card-header fw-bold">
                      B. PROFIL PELAJAR PANCASILA
                    </div>
                    <div class="card-body">

                        @if ($res->data_ppp == 'Data Belum Dibuat')
                        <div class="mb-1 mx-lg-5">
                            <label class="form-label fw-bold">{{ $res->data_ppp }}</label>
                        </div>
                        @else
                            @foreach ($res->data_ppp as $dp)
                                <div class="mb-4 mx-lg-5">
                                    <label class="form-label fw-bold">{{ $dp->subjudul }}</label>
                                    <!--
                                    <input type="text" class="form-control" value="{{ $res->data_informasi->identitas->nama }}">
                                    -->
                                    <div class="form-control">
                                        @php
                                            echo $dp->isi;
                                        @endphp
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>

                <!-- -->
                <div class="card mt-2">
                    <div class="card-header fw-bold">
                    C. SARANA DAN PRASARANA
                    </div>
                    <div class="card-body">

                        <div class="mb-4 row mx-lg-5">
                            <label class="form-label fw-bold">Sarana</label>
                            <div class="form-control">
                                @php
                                    echo $res->data_informasi->sarana;
                                @endphp
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="form-label fw-bold">Prasarana</label>
                            <div class="form-control">
                                @php
                                    echo $res->data_informasi->prasarana;
                                @endphp
                            </div>
                        </div>

                    </div>
                </div>

                <!-- -->
                <div class="card mt-2">
                    <div class="card-header fw-bold">
                    D. TARGET PESERTA DIDIK
                    </div>
                    <div class="card-body">

                        <div class="form-control">
                            @php
                                echo $res->data_informasi->target;
                            @endphp
                        </div>

                    </div>
                </div>

                <!-- -->
                <div class="card mt-2">
                    <div class="card-header fw-bold">
                    E. PENDEKATAN, MODEL, METODE, DAN TEKNIK PEMBELAJARAN
                    </div>
                    <div class="card-body">

                        <div class="form-control">
                            @php
                                echo $res->data_informasi->target;
                            @endphp
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
