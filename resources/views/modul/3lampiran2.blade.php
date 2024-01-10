<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Tujuan</h4>

        <div class="row g-2 align-items-center ms-5 mb-2">
            <textarea name="tujuan" id="editor">
                {{ session()->has('ki_tujuan') == 1 ? session()->get('ki_tujuan') : '' }}
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

