<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Asesmen</h4>

        <div class="row g-2 align-items-center ms-5 mb-2">
            <label class="col-form-label">Asasmen Diagnostik</label>
            <textarea name="a_d" id="editor">
                {{ session()->has('ki_a_d') == 1 ? session()->get('ki_a_d') : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2">
            <label class="col-form-label">Asasmen Formatif</label>
            <textarea name="a_f" id="editor2">
                {{ session()->has('ki_a_f') == 1 ? session()->get('ki_a_f') : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2">
            <label class="col-form-label">Asasmen Sumatif</label>
            <textarea name="a_s" id="editor3">
                {{ session()->has('ki_a_s') == 1 ? session()->get('ki_a_s') : '' }}
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

        ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

