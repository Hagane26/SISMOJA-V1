<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Pembuka Kegiatan</h4>
        <h6 class="card-subtitle bi-info-circle-fill ms-3 mb-4"> Harus di Isi 7 Kegiatan Tersebut</h6>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label class="form-label">Kegiatan 1 : Salam Pembuka
                        <sup class="bi bi-asterisk" style="color:red"></sup>
                    </label>

                    <textarea name="p_1a" class="form-control">{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[1]['in1'] == 'p_1a' ? session()->get('ki_pembukaan')[1]['isi']:'') : '' }}</textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu
                            <sup class="bi bi-asterisk" style="color:red"></sup>
                        </label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_1b" value="{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[1]['in2'] == 'p_1b' ? session()->get('ki_pembukaan')[1]['waktu']:'') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 2 : Pengkondisian Kelas
                        <sup class="bi bi-asterisk" style="color:red"></sup>
                    </label>

                    <textarea name="p_2a" class="form-control">{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[2]['in1'] == 'p_2a' ? session()->get('ki_pembukaan')[2]['isi']:'') : '' }}</textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu
                            <sup class="bi bi-asterisk" style="color:red"></sup>
                        </label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_2b" value="{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[2]['in2'] == 'p_2b' ? session()->get('ki_pembukaan')[2]['waktu']:'') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 3 : Do'a
                        <sup class="bi bi-asterisk" style="color:red"></sup>
                    </label>

                    <textarea name="p_3a" class="form-control">{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[3]['in1'] == 'p_3a' ? session()->get('ki_pembukaan')[3]['isi']:'') : '' }}</textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu
                            <sup class="bi bi-asterisk" style="color:red"></sup>
                        </label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_3b" value="{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[3]['in2'] == 'p_3b' ? session()->get('ki_pembukaan')[3]['waktu']:'') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 4 : Presensi
                        <sup class="bi bi-asterisk" style="color:red"></sup>
                    </label>

                    <textarea name="p_4a" class="form-control">{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[4]['in1'] == 'p_4a' ? session()->get('ki_pembukaan')[4]['isi']:'') : '' }}</textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu
                            <sup class="bi bi-asterisk" style="color:red"></sup>
                        </label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_4b" value="{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[4]['in2'] == 'p_4b' ? session()->get('ki_pembukaan')[4]['waktu']:'') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 5 : Apersepsi
                        <sup class="bi bi-asterisk" style="color:red"></sup>
                    </label>

                    <textarea name="p_5a" class="form-control">{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[5]['in1'] == 'p_5a' ? session()->get('ki_pembukaan')[5]['isi']:'') : '' }}</textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu
                            <sup class="bi bi-asterisk" style="color:red"></sup>
                        </label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_5b" value="{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[5]['in2'] == 'p_5b' ? session()->get('ki_pembukaan')[5]['waktu']:'') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 6 : Motivasi
                        <sup class="bi bi-asterisk" style="color:red"></sup>
                    </label>
                    <textarea name="p_6a" class="form-control">{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[6]['in1'] == 'p_6a' ? session()->get('ki_pembukaan')[6]['isi']:'') : '' }}</textarea>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu
                            <sup class="bi bi-asterisk" style="color:red"></sup>
                        </label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_6b" value="{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[6]['in2'] == 'p_6b' ? session()->get('ki_pembukaan')[6]['waktu']:'') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 7 : Penyampaian Tujuan Pembelajaran
                        <sup class="bi bi-asterisk" style="color:red"></sup>
                    </label>

                    <textarea name="p_7a" class="form-control">{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[7]['in1'] == 'p_7a' ? session()->get('ki_pembukaan')[7]['isi']:'') : '' }}</textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu
                            <sup class="bi bi-asterisk" style="color:red"></sup>
                        </label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_7b" value="{{ session()->has('ki_pembukaan') == 1 ? (session()->get('ki_pembukaan')[7]['in2'] == 'p_7b' ? session()->get('ki_pembukaan')[7]['waktu']:'') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
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


