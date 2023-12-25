@extends('support.layout')

@section('judul','Informasi Umum')

@section('isi')
    @include('users.navbarUser')

    <div class="position-absolute top-0 start-50 translate-middle-x mt-3">
        <div
            class="card border-primary"
        >
            <img class="card-img-top" src="holder.js/100px180/" alt="Title" />
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>

    </div>
@endsection
