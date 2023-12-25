@extends('support.layout')

@section('judul', "Modul Ajar")

@section('isi')

@include('users.navbarUser')

<div class="fixed-bottom ms-3 mb-3">
    <a href="/modul/buat" class="btn btn-primary">Buat Modul</a>
</div>
<label for="customRange3" class="form-label">Example range</label>
<input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3">

    <div class="position-absolute top-0 start-50 translate-middle-x>
        <h2>Data Modul</h2>

        <table class="table" style="width: 50rem">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Mapel</th>
                <th scope="col">Tahun</th>
                <th scope="col">Author</th>
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
            $.getJSON("/ma", function(data) {
                $("#tb-data").empty();
                var num = 0;

                $.each(data.result, function() {
                    num += 1;
                    $("#tb-data").append(
                        "<tr> <th scope='row'>" + num +
                        "</th> <td>" + this['materi'] +
                        "</td> <td>" + this['mapel'] +
                        "</td> <td>" + this['TA'] +
                        "</td> <td>" + this['user'] +
                        "</td> <td>" + "<a href='modul/lihat/" + this['id'] +"' class='btn btn-primary me-3'> Lihat </a>" +
                        "<a href='/modul/hapus/" + this['id'] +"' class='btn btn-danger'> Hapus </a>" +
                        "</td> </tr>"
                    );
                });
            });
        }
    </script>

@endsection

