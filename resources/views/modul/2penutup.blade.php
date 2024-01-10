<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title">Penutup</h4>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label class="form-label">Kegiatan 1 : Kesimpulan</label>

                    <textarea name="p_1a" class="form-control"></textarea>

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
                    <label class="form-label">Kegiatan 2 : Evaluasi</label>

                    <textarea name="p_2a" class="form-control"></textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_2b" value="{{ session()->has('ki_p_1b') == 1 ? session()->get('ki_p_1b') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label class="form-label">Kegiatan 3 : Refleksi</label>

                    <textarea name="p_3a" class="form-control"></textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_3b" value="{{ session()->has('ki_p_1b') == 1 ? session()->get('ki_p_1b') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label class="form-label">Kegiatan 4 : Penyampaian Tujuan Pembelajaran Pertemuan Selanjutnya</label>

                    <textarea name="p_4a" class="form-control"></textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_4b" value="{{ session()->has('ki_p_1b') == 1 ? session()->get('ki_p_1b') : '' }}">
                        </div>
                        <label class="col-sm-2 col-form-label">Menit</label>
                      </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="row g-2 align-items-center ms-5 mb-4">
                    <label class="form-label">Kegiatan 5 : Salam Penutup</label>

                    <textarea name="p_5a" class="form-control"></textarea>

                    <div class="mb-3 row mt-2">
                        <label class="col-sm-3 col-form-label">Alokasi Waktu</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" name="p_5b" value="{{ session()->has('ki_p_1b') == 1 ? session()->get('ki_p_1b') : '' }}">
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

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

