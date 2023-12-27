<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Komponen Awal</h4>

        <div class="row g-2 align-items-center ms-5 mb-2">
            <label class="col-form-label">Kegiatan Pembelajaran</label>
            <textarea name="kp" id="editor">
                {{ session()->has('informasiUmum') == 1 ? session()->get('informasiUmum')['komponenAwal'] : '' }}
            </textarea>
        </div>

        <div class="position-relative bottom-0 start-50 translate-middle-x mt-3" style="width:50%">
            <div class="row">
                <button type="submit" class="btn btn-success col me-3 bi-check-square"> Simpan </button>
                <a href="" class="btn btn-danger col bi-x-square"> Batalkan </a>
            </div>
        </div>

    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

