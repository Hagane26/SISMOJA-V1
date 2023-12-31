@extends('support.layout')

@section('judul','Register')

@section('isi')

    <div class="position-absolute top-0 end-0 mt-3 me-5">
        @if ($errors->any())
        <div class="alert alert-danger text-center" role="alert">
            <i class="bi bi-info"></i> {{ $errors->first() }}
        </div>
        @endif
    </div>

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 30rem">
            <div class="card-header">
                <center>
                    <h4 class="card-title" style="font-weight: bold">Register {{ config('app.name') }}</h4>
                </center>
            </div>
            <div class="card-body">

                    <div class="card card-body">

                        <form action="/regisAction" method="POST">
                            @csrf
                            <!-- Email field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputEmail" class="col-form-label">Email</label>
                                </div>
                                <div class="col-auto">
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>

                            <!-- Password field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputPassword" class="col-form-label">Password</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" id="inputPassword" name="password" class="form-control"
                                        aria-describedby="passwordHelpInline">
                                </div>
                            </div>

                            <!-- Password Confirm field -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputPasswordC" class="col-form-label">Confirm Password</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" id="inputPasswordC" name="passwordC" class="form-control"
                                        aria-describedby="passwordHelpInline">
                                </div>
                            </div>

                            <div class="col g-2 align-items-center ms-5 mb-2 mt-3">
                                <center>
                                    <div class="row-auto mb-2">
                                        <input type="submit" class="btn btn-primary" style="width: 15rem"
                                            value="Register">
                                    </div>
                                </center>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <div class="fixed-bottom ms-3 mb-3">
        <a href="/login" class="btn btn-success">Login</a>
    </div>
@endsection
