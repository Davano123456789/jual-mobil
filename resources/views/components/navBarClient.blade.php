<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../images/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="margin-left: 15rem">
                <li class="nav-item">
                    <a class="nav-link  @if (request()->route()->uri == 'home') aktif-red @endif" style="color: white"
                        aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->route()->uri == 'showCarBekas') aktif-red @endif" style="color: white"
                        aria-current="page" href="/showCarBekas">Mobil bekas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link @if (request()->route()->uri == 'showCarBaruBekas') aktif-red @endif" style="color: white"
                        aria-current="page" href="/showCarBaruBekas">Mobil bekas
                        bagus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (request()->route()->uri == 'showAllCar') aktif-red @endif" style="color: white"
                        aria-current="page" href="showAllCar">Semua mobil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (request()->route()->uri == 'basketUser') aktif-red @endif" style="color: white"
                        aria-current="page" href="/basketUser">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" aria-current="page" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
