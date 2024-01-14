<div class="card mt-3">
    <div class="card-body">
        <h4 class="card-title text-center">Kegiatan Inti</h4>
        
        @php
            $x = 0;
        @endphp
        @foreach ($res['model'] as $m)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $m->metode }}</h5>
                    <textarea name="i_{{ $x }}" id="editor{{ $x }}">
                    </textarea>
                    <input type="hidden" name="metode_{{ $x++ }}" value="{{ $m->metode }}">
                </div>
            </div>

        @endforeach

        <div class="position-relative bottom-0 start-50 translate-middle-x mt-3" style="width:50%">
            <div class="row">
                <button type="submit" class="btn btn-success col me-3 bi-check-square"> Simpan </button>
                <a href="" class="btn btn-danger col bi-x-square"> Batalkan </a>
            </div>
        </div>

    </div>
</div>


<script>
@php
    $i = 0;
@endphp
@foreach ($res['model'] as $m)
ClassicEditor
        .create( document.querySelector( '#editor{{ $i++ }}' ) )
        .catch( error => {
            console.error( error );
        } );
@endforeach
</script>

