@extends('support.layout')

@section('judul')
    login
@endsection

@section('isi')
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 30rem">
            <div class="card-header">
                <h5 class="card-title">Login Sismoja</h5>
            </div>
            <div class="card-body">

                    <div class="card card-body">
                        <form action="/loginAction" method="POST">
                            @csrf
                            <!-- Email -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputEmail" class="col-form-label">Email</label>
                                </div>
                                <div class="col-auto">
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="row g-2 align-items-center ms-5 mb-2">
                                <div class="col-3">
                                    <label for="inputPassword" class="col-form-label">Password</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" id="inputPassword" class="form-control" name="password"
                                        aria-describedby="passwordHelpInline">
                                </div>
                            </div>
                            <div class="col g-2 align-items-center ms-5 mb-2 mt-3">
                                <center>
                                    <div class="row-auto mb-2">
                                        <input type="submit" class="btn btn-primary" style="width: 15rem"
                                            value="login">
                                    </div>
                                    <div class="row-auto">
                                        <a href=""> Lupa Password? </a>
                                    </div>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </div>

@endsection
