<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Pembuka Kegiatan</h4>
        <h6 class="card-subtitle bi-info-circle-fill ms-3 mb-4"> Harus di Isi 7 Kegiatan Tersebut</h6>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label class="form-label">Kegiatan 1 : Salam Pembuka</label>
                    <textarea name="p_1a" class="form-control">
                        {{ session()->has('ki_p_1a') == 1 ? session()->get('ki_p_1a') : '' }}
                    </textarea>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_1b" value="{{ session()->has('ki_p_1b') == 1 ? session()->get('ki_p_1b') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 2 : Pengkondisian Kelas</label>
                    <textarea name="p_2a" class="form-control">
                        {{ session()->has('ki_p_2a') == 1 ? session()->get('ki_p_2a') : '' }}
                    </textarea>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_2b" value="{{ session()->has('ki_p_2b') == 1 ? session()->get('ki_p_2b') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 3 : Do'a</label>
                    <textarea name="p_3a" class="form-control">
                        {{ session()->has('ki_p_3a') == 1 ? session()->get('ki_p_3a') : '' }}
                    </textarea>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_3b" value="{{ session()->has('ki_p_3b') == 1 ? session()->get('ki_p_3b') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 4 : Presensi</label>
                    <textarea name="p_4a" class="form-control">
                        {{ session()->has('ki_p_4a') == 1 ? session()->get('ki_p_4a') : '' }}
                    </textarea>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_4b" value="{{ session()->has('ki_p_4b') == 1 ? session()->get('ki_p_4b') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 5 : Apersepsi</label>
                    <textarea name="p_5a" class="form-control">
                        {{ session()->has('ki_p_5a') == 1 ? session()->get('ki_p_5a') : '' }}
                    </textarea>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_5b" value="{{ session()->has('ki_p_5b') == 1 ? session()->get('ki_p_5b') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 6 : Motivasi</label>
                    <textarea name="p_6a" class="form-control">
                        {{ session()->has('ki_p_6a') == 1 ? session()->get('ki_p_6a') : '' }}
                    </textarea>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_6b" value="{{ session()->has('ki_p_6b') == 1 ? session()->get('ki_p_6b') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Kegiatan 7 : Penyampaian Tujuan Pembelajaran</label>
                    <textarea name="p_7a" class="form-control">
                        {{ session()->has('ki_p_7a') == 1 ? session()->get('ki_p_7a') : '' }}
                    </textarea>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_7b" value="{{ session()->has('ki_p_7b') == 1 ? session()->get('ki_p_7b') : '' }}">
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


