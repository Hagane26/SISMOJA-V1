@extends('support.layout')

@section('judul', $materi)

@section('isi')

@include('users.navbarUser')

<div class="card mt-3" style="width: 60rem; margin-left:15%">
    <div class="card-header">
        <h5 class="card-title"> Materi : {{ $materi }}</h5>
        <h6 class="card-title"> Status : {{ $status }}</h6>
    </div>

    <div class="card-body">
        <div class="card-header">
            <h5 class="card-title"> Informasi Umum</h5>
        </div>
        <div class="card-body ms-5">

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Identitas Penulis</b></p>
                </div>
                <div class="col">
                  <p>{{ $user }}</p>
                  <p>{{ $email }}</p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Sekolah</b></p>
                </div>
                <div class="col">
                  <p> {{$kategori_sekolah}} {{ $sekolah }}</p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Tahun Ajaran</b></p>
                </div>
                <div class="col">
                  <p> {{ $TA }}</p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Jenjang</b></p>
                </div>
                <div class="col">
                  <p> {{$kategori_sekolah}}</p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Mata Pelajaran</b></p>
                </div>
                <div class="col">
                  <p> {{$mapel}}</p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Kelas</b></p>
                </div>
                <div class="col">
                  <p> {{$kelas}} {{ $jurusan }}</p>
                </div>
            </div>


            <!-- isi informasi umum -->
            <hr>
            <div class="row align-items-start mt-3">
                <div class="col">
                  <p><b>Kompetensi Awal</b></p>
                </div>
                <div class="col">
                  <p> @php
                      echo $kompetensiAwal;
                      @endphp </p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Profil Pelajar Pancasila</b></p>
                </div>
                <div class="col">
                  <p> @php
                      echo $profilPelajarPancasila;
                      @endphp </p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Sarana dan Prasarana</b></p>
                </div>
                <div class="col">
                  <p> @php
                      echo $sarana;
                      @endphp </p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Target Peserta Didik</b></p>
                </div>
                <div class="col">
                  <p> @php
                      echo $target;
                      @endphp </p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                  <p><b>Model Pembelajaran yang Digunakan</b></p>
                </div>
                <div class="col">
                  <p> @php
                      echo $modelPembelajaran;
                      @endphp </p>
                </div>
            </div>
        </div>

        <!-- Komponen Inti -->
        <div class="card-header mt-5">
            <h5 class="card-title"> Komponen Inti</h5>
        </div>
        <div class="card-body ms-5">
            <div class="row align-items-start">
                <div class="col">
                  <p><b>Tujuan Pembelajaran</b></p>
                </div>
                <div class="col">
                  <p> @php
                      echo $tujuan;
                      @endphp </p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                <p><b>Asesmen</b></p>
                </div>
                <div class="col">
                <p> @php
                        echo $asesmen;
                        @endphp </p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                <p><b>Pemahaman Bermakna</b></p>
                </div>
                <div class="col">
                <p> @php
                        echo $pemahaman;
                        @endphp </p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                <p><b>Pertanyaan Pemantik</b></p>
                </div>
                <div class="col">
                <p> @php
                        echo $pertanyaan;
                        @endphp </p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                <p><b>Kegiatan Pembelajaran</b></p>
                </div>
                <div class="col">
                <p> @php
                        echo $kegiatan;
                        @endphp </p>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                <p><b>Refleksi Peserta Didik dan Pendidik</b></p>
                </div>
                <div class="col">
                <p> @php
                        echo $refleksi;
                        @endphp </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
