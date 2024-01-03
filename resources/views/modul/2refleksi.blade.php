<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Refleksi</h4>

        <h5>Belum Selesai Lewati terlebih dahulu</h5>

        <div class="position-relative bottom-0 start-50 translate-middle-x mt-3" style="width:50%">
            <div class="row">
                <button type="submit" class="btn btn-success col me-3 bi-check-square"> Simpan </button>
                <a href="" class="btn btn-danger col bi-x-square"> Batalkan </a>
            </div>
        </div>
        <a href="/modul/buat/2/selesai" class="btn btn-primary mt-2 mb-5" style="width: 100%">Komponen Inti Selesai</a>
    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

