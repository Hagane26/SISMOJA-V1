<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Model Pembelajaran </h4>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <label class="form-label fw-bold">Pendekatan : </label>

            <div class="row">
                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Berdiferensiasi" id="pe-1" name="pe-1" {{ session()->has('model') == 1 ? (session()->get('model')[1]['id_tl'] == 'pe-1' ? 'checked' : '') : '' }}>
                    <label class="form-check-label">
                        Berdiferensiasi
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Genre-Based Approach" id="pe-2" name="pe-2" {{ session()->has('model') == 1 ? (session()->get('model')[2]['id_tl'] == 'pe-2' ? 'checked' : '') : '' }} >
                    <label class="form-check-label">
                        Genre-Based Approach
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Saintifik" id="pe-3" name="pe-3">
                    <label class="form-check-label">
                        Saintifik
                    </label>
                </div>
            </div>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <label class="form-label fw-bold">Model : </label>
            <div class="row">
                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="PBL" id="mo-1" name="mo-1">
                    <label class="form-check-label">
                        PBL
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="PBJL" id="mo-2" name="mo-2">
                    <label class="form-check-label">
                        PBJL
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Inquiry" id="mo-3" name="mo-3">
                    <label class="form-check-label">
                        Inquiry
                    </label>
                </div>
            </div>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <label class="form-label fw-bold">Metode : </label>
            <div class="row">
                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Demonstrasi" id="me-1" name="me-1">
                    <label class="form-check-label">
                        Demonstrasi
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Think, Pair, Share" id="me-2" name="me-2">
                    <label class="form-check-label">
                        Think, Pair, Share
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Jigsaw" id="me-3" name="me-3">
                    <label class="form-check-label">
                        Jigsaw
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Presentasi" id="me-4" name="me-4">
                    <label class="form-check-label">
                        Presentasi
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Penugasan" id="me-5" name="me-5">
                    <label class="form-check-label">
                        Penugasan
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Tutor sebaya" id="me-6" name="me-6">
                    <label class="form-check-label">
                        Tutor sebaya
                    </label>
                </div>
            </div>
        </div>

        <div class="row g-2 align-items-center ms-5 mb-2 mt-3">
            <label class="form-label fw-bold">Teknik : </label>
            <div class="row">
                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Games Presentation (presentasi berbasis game)" id="te-1" name="te-1">
                    <label class="form-check-label">
                        Games Presentation (presentasi berbasis game)
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Focus Group Discussion" id="te-2" name="te-2">
                    <label class="form-check-label">
                        Focus Group Discussion
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Presentasi kelompok kecil" id="te-3" name="te-3">
                    <label class="form-check-label">
                        Presentasi kelompok kecil
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Presentasi panel" id="te-4" name="te-4">
                    <label class="form-check-label">
                        Presentasi panel
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Penugasan terstruktur" id="te-5" name="te-5">
                    <label class="form-check-label">
                        Penugasan terstruktur
                    </label>
                </div>

                <div class="form-check col-3 mb-3">
                    <input class="form-check-input" type="checkbox" value="Penugasan Kelompok kecil" id="te-6" name="te-6">
                    <label class="form-check-label">
                        Penugasan Kelompok kecil
                    </label>
                </div>
            </div>
        </div>

        <div class="position-relative bottom-0 start-50 translate-middle-x mt-3" style="width:50%">
            <div class="row">
                <button type="submit" class="btn btn-success col me-3 bi-check-square"> Simpan </button>
                <a href="" class="btn btn-danger col bi-x-square"> Batalkan </a>
            </div>
        </div>

    </div>
</div>
{{ session()->has('model') == 1 ? (session()->has('model.1') == 1 ? 'checked' : '') : '' }}
