<link rel="stylesheet" href="../css/dashboard.css">
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
            <ul class="navbar-nav" style="margin-left: 20rem">
                <li class="nav-item">
                    <a class="nav-link @if (request()->route()->uri == 'list-car') aktiv @endif" style="color: white"
                        aria-current="page" href="list-car">List Car</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (request()->route()->uri == 'listBrands') aktiv @endif" style="color: white"
                        aria-current="page" href="listBrands">List Brands </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (request()->route()->uri == 'list-images') aktiv @endif" style="color: white"
                        aria-current="page" href="list-images">List Images</a>
                </li>
                <li class="nav-item @if (request()->route()->uri == 'list-conditions') aktiv @endif">
                    <a class="nav-link " style="color: white" aria-current="page" href="list-conditions">List
                        Conditions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" aria-current="page" href="logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
