@extends('components.front')
@extends('components.navBarClient')
@section('title', 'home')
<link rel="stylesheet" href="../css/home.css">
<style>
    .carousel-inner {
        margin-top: 2rem;
        height: 400px;
        /* Adjust this value to your desired height */
    }

    /* Ensure the images fit within the carousel height */
    .carousel-inner img {
        height: 100%;
        object-fit: cover;
        /* This will crop the image to fit the container */
    }

    .wrap-show-detail {
        padding: 1.5rem;
        margin-top: 2rem;
        height: 20vh;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;

    }

    .icon img {
        width: 80px;
    }
</style>
@section('content')

    <div class="container">
        <div class="wrap-show-car">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="show-car-name">
                <div class="text-center">
                    <h3>{{ $cars->name }}</h3>
                </div>
                <h1>{{ 'Rp ' . number_format($cars->harga, 0, ',', '.') }}</h1>
                <p>{{ $cars->condition->name }}</p>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($cars->image as $index => $image)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($cars->image as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/name/' . $image->name) }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="mt-4 ">
                <form action="{{ route('basket.add', $cars->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                </form>
            </div>

        </div>
        <div class="wrap-show-detail">
            <div class="row">
                <div class="col-4 d-flex justify-content-around" style="border-right: 1px solid black">
                    <div class="icon">
                        <img class="img-fluid" src="../images/icon-1.png" alt="">
                    </div>
                    <div class="detail">
                        <b>
                            <p>{{ $cars->transmisi }}</p>
                        </b>
                        <p>Transmisi</p>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-around" style="border-right: 1px solid black">
                    <div class="icon">
                        <img class="img-fluid" src="../images/icon-2.png" alt="">
                    </div>
                    <div class="detail">
                        <b>
                            <p>{{ $cars->bahan_bakar }}</p>
                        </b>
                        <p>Bahan bakar</p>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-around" style="border-right: 1px solid black">
                    <div class="icon">
                        <img class="img-fluid" src="../images/icon-3.png" alt="">
                    </div>
                    <div class="detail">
                        <b>
                            <p>{{ $cars->mesin }}</p>
                        </b>
                        <p>Mesin</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
