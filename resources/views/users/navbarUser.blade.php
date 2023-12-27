<div class="position-fixed top-0 start-0 mt-3" style="width: 15%">
    <div class="card">
        <img src="https://www.kemdikbud.go.id/main/files/large/83790f2b43f00be" class="card-img-top" alt="...">
        <div class="btn-group-vertical" role="group">

            <h3 style="margin-left: 15%">
                <div class="badge bg-primary text-wrap">
                    {{ config('app.name') }}
                </div>
            </h3>

            <a href="/modul/buat" class="btn btn-outline-success mt-5 mb-3"> <i class="bi bi-plus-circle"></i> Buat Modul </a>

            <a href="/dashboard" class="btn btn-primary">Dashboard</a>
            <a href="/modul" class="btn btn-primary">Modul Saya</a>
            <a href="/profil" class="btn btn-primary">Profile</a>

        </div>
    </div>

    <div class="position-sticky bottom-0">
        <a href="/logout" class="btn btn-danger" style="width:80%; margin:10%"> <i class="bi bi-box-arrow-left"></i> Logout</a>
    </div>

</div>
