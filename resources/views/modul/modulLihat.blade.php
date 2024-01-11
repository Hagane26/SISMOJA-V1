@extends('support.layout')

@section('judul', $res->judul)

@section('isi')
    @include('users.navbarUser')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-5 ms-5">

        <div class="card mb-5" style="width: 55rem">
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
                                <input type="text" class="form-control" readonly value="{{ $res->data_informasi->identitas->nama }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Institusi</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" readonly value="{{ $res->data_informasi->identitas->institusi }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" readonly value="{{ $res->data_informasi->identitas->TAawal . $res->data_informasi->identitas->TAkhir }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Mata Pelajaran</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" readonly value="{{ $res->data_informasi->identitas->mapel }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Kelas/Fase</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" readonly value="{{ $res->data_informasi->identitas->kelas }} / {{ $res->data_informasi->identitas->fase }}">
                            </div>
                        </div>

                        <div class="mb-1 row mx-lg-5">
                            <label class="col-sm-4 col-form-label">Alokasi Waktu</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <div class="col">
                                <input type="text" class="form-control" readonly value="{{ $res->data_informasi->identitas->alokasi_waktu }}">
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

                        <div class="mb-4 row mx-lg-5">
                            <label class="form-label fw-bold">Pendekatan</label>
                            <ol class="list-group list-group-numbered">
                                @foreach ($res->data_informasi->model as $del)
                                    @if ($del->kategori == "pe" )
                                        <li class="list-group-item">{{ $del->metode }}</li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>

                        <div class="mb-4 row mx-lg-5">
                            <label class="form-label fw-bold">Model</label>
                            <ol class="list-group list-group-numbered">
                                @foreach ($res->data_informasi->model as $del)
                                    @if ($del->kategori == "mo" )
                                        <li class="list-group-item">{{ $del->metode }}</li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>

                        <div class="mb-4 row mx-lg-5">
                            <label class="form-label fw-bold">Metode</label>
                            <ol class="list-group list-group-numbered">
                                @foreach ($res->data_informasi->model as $del)
                                    @if ($del->kategori == "me" )
                                        <li class="list-group-item">{{ $del->metode }}</li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>

                        <div class="mb-4 row mx-lg-5">
                            <label class="form-label fw-bold">Teknik</label>
                            <ol class="list-group list-group-numbered">
                                @foreach ($res->data_informasi->model as $del)
                                    @if ($del->kategori == "te" )
                                        <li class="list-group-item">{{ $del->metode }}</li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>

                    </div>
                </div>

                <!-- -->
                <div class="card mt-2">
                    <div class="card-header fw-bold">
                        F. TUJUAN PEMBELAJARAN
                    </div>
                    <div class="card-body">

                        @if ($res->data_komponen_inti->Tujuan == '')
                        <div class="mb-1 mx-lg-5">
                            <label class="form-label fw-bold">Tidak Ada Data</label>
                        </div>
                        @else
                        <div class="mb-3 row mx-lg-5">
                            <div class="form-control">
                                @php
                                    echo $res->data_komponen_inti->Tujuan;
                                @endphp
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

                <!-- -->
                <div class="card mt-2">
                    <div class="card-header fw-bold">
                        G. Asasmen
                    </div>
                    <div class="card-body">

                        @if ($res->data_komponen_inti->asasmen_diagnostik != '')
                        <div class="mb-3 row mx-lg-5">
                            <label class="form-label fw-bold">Asasmen Diagnostik</label>
                            <div class="form-control">
                                @php
                                    echo $res->data_komponen_inti->asasmen_diagnostik;
                                @endphp
                            </div>
                        </div>
                        @endif

                        @if ($res->data_komponen_inti->asasmen_formatif != '')
                        <div class="mb-3 row mx-lg-5">
                            <label class="form-label fw-bold">Asasmen Formatif</label>
                            <div class="form-control">
                                @php
                                    echo $res->data_komponen_inti->asasmen_formatif;
                                @endphp
                            </div>
                        </div>
                        @endif

                        @if ($res->data_komponen_inti->asasmen_sumatif != '')
                        <div class="mb-3 row mx-lg-5">
                            <label class="form-label fw-bold">Asasmen Sumatif</label>
                            <div class="form-control">
                                @php
                                    echo $res->data_komponen_inti->asasmen_sumatif;
                                @endphp
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

                <!-- -->
                <div class="card mt-2">
                    <div class="card-header fw-bold">
                        H. Pemahaman Bermakna
                    </div>
                    <div class="card-body">

                        @if ($res->data_komponen_inti->pemahaman_bermakna != '')
                        <div class="mb-3 row mx-lg-5">

                            <div class="form-control">
                                @php
                                    echo $res->data_komponen_inti->pemahaman_bermakna;
                                @endphp
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

                <!-- -->
                <div class="card mt-2">
                    <div class="card-header fw-bold">
                        I. Pertanyaan Pemantik
                    </div>
                    <div class="card-body">

                        @if ($res->data_komponen_inti->pemahaman_pemantik != '')
                        <div class="mb-3 row mx-lg-5">

                            <div class="form-control">
                                @php
                                    echo $res->data_komponen_inti->pemahaman_pemantik;
                                @endphp
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

                <!-- -->
                <div class="card mt-2">
                    <div class="card-header fw-bold">
                        J. Kegiatan Pembelajaran
                    </div>
                    <div class="card-body">

                        <div class="card mb-2 border-2 border-primary">
                            <div class="card-body">
                                <center><h5 class="card-title">Pembukaan</h5></center>
                                @foreach ($res->ki_pembukaan as $buka)
                                <label class="form-label fw-bold">{{ $buka->langkah }}</label>
                                <div class="mb-3 row mx-lg-5">
                                    <div class="form-control">
                                        {{ $buka->isi }}
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="card mb-2 border-2 border-primary">
                            <div class="card-body">
                                <center><h5 class="card-title">Kegiatan Inti</h5></center>
                                @foreach ($res->ki_kegiatan as $k)
                                <label class="form-label fw-bold">{{ $k->metode }}</label>
                                <div class="mb-3 row mx-lg-5">
                                    <div class="form-control">
                                        @php
                                            echo $k->isi
                                        @endphp
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="card mb-2 border-2 border-primary">
                            <div class="card-body">
                                <center><h5 class="card-title">Penutup</h5></center>
                                @foreach ($res->ki_penutup as $pp)
                                <label class="form-label fw-bold">{{ $pp->langkah }}</label>
                                <div class="mb-3 row mx-lg-5">
                                    <div class="form-control">
                                        @php
                                            echo $pp->isi
                                        @endphp
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
