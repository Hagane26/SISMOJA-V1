<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Profil Pelajar Pancasila </h4>
        <h6 class="card-subtitle bi-info-circle-fill ms-3"> Pilih Minimal 1, Maksimal 6</h6>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" onclick="ck(1)" {{ session()->has('ppp') == 1 ? (session()->get('ppp')[1]['isi'] == '' ? '' : 'checked') : '' }} value="Beriman, Bertakwa kepada Tuhan Yang Maha Esa dan Berakhlak Mulia" id="nj_1" name="nj_1">
                <label class="form-check-label">
                    Beriman, Bertakwa kepada Tuhan Yang Maha Esa dan Berakhlak Mulia
                </label>
            </div>

            <textarea name="i_j1" id="editor1">
                {{ session()->has('ppp') == 1 ? session()->get('ppp')[1]['isi'] : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('ppp') == 1 ? (session()->get('ppp')[2]['isi'] == '' ? '' : 'checked') : '' }} value="Berkebhinekaan Global" id="nj_2" name="nj_2">
                <label class="form-check-label">
                    Berkebhinekaan Global
                </label>
            </div>

            <textarea name="i_j2" id="editor2">{{ session()->has('ppp') == 1 ? session()->get('ppp')[2]['isi'] : '' }}</textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('ppp') == 1 ? (session()->get('ppp')[3]['isi'] == '' ? '' : 'checked') : '' }} value="Bergotong Royong" id="nj_3" name="nj_3">
                <label class="form-check-label">
                    Bergotong Royong
                </label>
            </div>

            <textarea name="i_j3" id="editor3">
                {{ session()->has('ppp') == 1 ? session()->get('ppp')[3]['isi'] : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('ppp') == 1 ? (session()->get('ppp')[4]['isi'] == '' ? '' : 'checked') : '' }} value="Mandiri" id="nj_4" name="nj_4">
                <label class="form-check-label">
                    Mandiri
                </label>
            </div>

            <textarea name="i_j4" id="editor4">
                {{ session()->has('ppp') == 1 ? session()->get('ppp')[4]['isi'] : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('ppp') == 1 ? (session()->get('ppp')[5]['isi'] == '' ? '' : 'checked') : '' }} value="Bernalar Kritis" id="nj_5" name="nj_5">
                <label class="form-check-label">
                    Bernalar Kritis
                </label>
            </div>

            <textarea name="i_j5" id="editor5">
                {{ session()->has('ppp') == 1 ? session()->get('ppp')[5]['isi'] : '' }}
            </textarea>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ session()->has('ppp') == 1 ? (session()->get('ppp')[6]['isi'] == '' ? '' : 'checked') : '' }} value="Kreatif" id="nj_6" name="nj_6">
                <label class="form-check-label">
                    Kreatif
                </label>
            </div>

            <textarea name="i_j6" id="editor6">
                {{ session()->has('ppp') == 1 ? session()->get('ppp')[6 ]['isi'] : '' }}
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

