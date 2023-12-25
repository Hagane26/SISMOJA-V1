@extends('support.layout')

@section('judul', "Data Sekolah")

@section('isi')

@include('users.navbarUser')

<div class="fixed-bottom ms-3 mb-3">
    <a href="/sekolah/tambah/{{ $id }}" class="btn btn-primary">Tambah</a>
</div>

    <div class="position-absolute top-50 start-50 translate-middle">
        <h2>Data Kelas dari Sekolah {{ $kategori }} {{ $nama }}</h2>

        <table class="table" style="width: 50rem">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody id="tb-data">

            </tbody>
          </table>
    </div>

    <script>
        $(document).ready(function() {
            update();
        });

        function selesai() {
            setTimeout(function() {
                update();
                selesai();
            }, 200);
        }

        function update() {
            $.getJSON("/ka/{{ $id }}", function(data) {
                $("#tb-data").empty();
                var num = 0;

                $.each(data.result, function() {
                    num+=1;
                    $("#tb-data").append(
                        "<tr> <th scope='row'>" + num +
                        "</th> <td style='width:20%'>" + this['kelas'] +
                        "</td> <td style='width:40%'>" + this['jurusan'] +
                        "</td> <td>" + "<a href='/sekolah/kelas/hapus/" + this['id'] +"' class='btn btn-danger'> Hapus Kelas </a>" +
                        "</td> </tr>"
                    );
                });
            });
        }
    </script>
@endsection
