@extends('support.layout')

@section('judul', "Data Sekolah")

@section('isi')

@include('users.navbarUser')

<div class="fixed-bottom ms-3 mb-3">
    <a href="/sekolah/tambah" class="btn btn-primary">Tambah</a>
</div>

    <div class="position-absolute top-50 start-50 translate-middle">
        <h2>Data Sekolah</h2>

        <table class="table" style="width: 70rem">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Sekolah</th>
                <th scope="col">Kategori</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jumlah Kelas</th>
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
            $.getJSON("/sa", function(data) {
                $("#tb-data").empty();
                var num = 0;

                $.each(data.result, function() {
                    num += 1;
                    $("#tb-data").append(
                        "<tr> <th scope='row'>" + num +
                        "</th> <td>" + this['nama'] +
                        "</td> <td>" + this['kategori'] +
                        "</td> <td>" + this['email'] +
                        "</td> <td>" + this['alamat'] +
                            "</td> <td>" + this['jumlah'] +
                        "</td> <td>" + "<a href='sekolah/kelas/" + this['id'] +"' class='btn btn-primary me-3'> Lihat Kelas </a>" +
                        "<a href='/sekolah/hapus/" + this['id'] +"' class='btn btn-danger'> Hapus Sekolah </a>" +
                        "</td> </tr>"
                    );
                });
            });
        }
    </script>

@endsection
