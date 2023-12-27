<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Model Pembelajaran </h4>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('model') == 1 ? (session()->get('model')[1]['isi'] == '' ? '' : 'checked') : '' }} value="Pendekatan" id="nj_1" name="nj_1">
                <label class="form-check-label">
                    Pendekatan
                </label>
            </div>

            <textarea name="i_j1" id="editor1">
                {{ session()->has('model') == 1 ? session()->get('model')[1]['isi'] : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('model') == 1 ? (session()->get('model')[2]['isi'] == '' ? '' : 'checked') : '' }} value="Model" id="nj_2" name="nj_2">
                <label class="form-check-label">
                    Model
                </label>
            </div>

            <textarea name="i_j2" id="editor2">
                {{ session()->has('model') == 1 ? session()->get('model')[2]['isi'] : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('model') == 1 ? (session()->get('model')[3]['isi'] == '' ? '' : 'checked') : '' }} value="Metode" id="nj_3" name="nj_3">
                <label class="form-check-label">
                    Metode
                </label>
            </div>

            <textarea name="i_j3" id="editor3">
                {{ session()->has('model') == 1 ? session()->get('model')[3]['isi'] : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('model') == 1 ? (session()->get('model')[4]['isi'] == '' ? '' : 'checked') : '' }} value="Teknik" id="nj_4" name="nj_4">
                <label class="form-check-label">
                    Teknik
                </label>
            </div>

            <textarea name="i_j4" id="editor4">
                {{ session()->has('model') == 1 ? session()->get('model')[4]['isi'] : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('model') == 1 ? (session()->get('model')[5]['isi'] == '' ? '' : 'checked') : '' }} value="Lainnya" id="nj_5" name="nj_5">
                <label class="form-check-label">
                    Lainnya
                </label>
            </div>

            <textarea name="lainnya" id="editor5">
                {{ session()->has('model') == 1 ? session()->get('model')[5]['isi'] : '' }}
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
        .create( document.querySelector( '#editor1' ) )
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

    ClassicEditor
        .create( document.querySelector( '#editor4' ) )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#editor5' ) )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#editor6' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

