@extends('components.front')
@extends('components.navBarClient')
@section('title', 'home')
<link rel="stylesheet" href="../css/home.css">
@section('content')

    <div class="wrap-carausel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../images/carausel-1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../images/carausel-2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../images/carausel-3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container">
        <h3 class="mt-5 mb-4">Model Dengan Kondisi Baru</h3>
        <div class="wrap-kartu">
            @foreach ($cars as $car)
                <div class="kartu">
                    <div class="gambar-kartu">
                        @if ($car->image->isNotEmpty())
                            <!-- Mengambil gambar pertama dari koleksi -->
                            <img src="{{ asset('storage/name/' . $car->image->first()->name) }}"
                                alt="{{ $car->image->first()->name }}" class="img-fluid">
                        @else
                            <!-- Tampilkan gambar default jika mobil tidak memiliki gambar -->
                            <img src="{{ asset('storage/default.jpg') }}" alt="Default Image">
                        @endif
                    </div>
                    <div class="title-car p-4 ">
                        <h4>{{ $car->name }}</h4>
                        <p>Rp.{{ number_format($car->harga, 0, ',', '.') }}</p>
                        <a href="showCar/{{ $car->id }}" class="btn btn-primary w-100">Lihat Mobil</a>
                    </div>
                </div>
            @endforeach
        </div>
        <h3 class="mt-5 mb-4">Model Dengan Kondisi Bekas</h3>
        <div class="wrap-kartu">
            @foreach ($carBekas as $car)
                <div class="kartu">
                    <div class="gambar-kartu">
                        @if ($car->image->isNotEmpty())
                            <!-- Mengambil gambar pertama dari koleksi -->
                            <img src="{{ asset('storage/name/' . $car->image->first()->name) }}"
                                alt="{{ $car->image->first()->name }}" class="img-fluid">
                        @else
                            <!-- Tampilkan gambar default jika mobil tidak memiliki gambar -->
                            <img src="{{ asset('storage/default.jpg') }}" alt="Default Image">
                        @endif
                    </div>
                    <div class="title-car p-4 ">
                        <h4>{{ $car->name }}</h4>
                        <p>Rp.{{ number_format($car->harga, 0, ',', '.') }}</p>
                        <a href="showCar/{{ $car->id }}" class="btn btn-primary w-100">Lihat Mobil</a>
                    </div>
                </div>
            @endforeach


        </div>
        <h3 class="mt-5 mb-4">Model Dengan Kondisi Bekas Bagus</h3>
        <div class="wrap-kartu">
            @foreach ($carBekasBagus as $car)
                <div class="kartu">
                    <div class="gambar-kartu">
                        @if ($car->image->isNotEmpty())
                            <!-- Mengambil gambar pertama dari koleksi -->
                            <img src="{{ asset('storage/name/' . $car->image->first()->name) }}"
                                alt="{{ $car->image->first()->name }}" class="img-fluid">
                        @else
                            <!-- Tampilkan gambar default jika mobil tidak memiliki gambar -->
                            <img src="{{ asset('storage/default.jpg') }}" alt="Default Image">
                        @endif
                    </div>
                    <div class="title-car p-4 ">
                        <h4>{{ $car->name }}</h4>
                        <p>Rp.{{ number_format($car->harga, 0, ',', '.') }}</p>
                        <a href="showCar/{{ $car->id }}" class="btn btn-primary w-100">Lihat Mobil</a>
                    </div>
                </div>
            @endforeach


        </div>
        <h3 class="mt-5 mb-4">Cari Mobil Berdasarkan Brands</h3>
        <div class="row">
            @foreach ($brand as $item)
                <div class="col-2 kartu-brand mb-3">
                    <a href="showCarBrand/{{ $item->id }}">
                        <div class="wrap-brand-img">
                            <img src="{{ asset('storage/cover/' . $item->cover) }}" alt="{{ $item->cover }}"
                                class="img-fluid">
                        </div>
                        <div class="title-brand">
                            <p>{{ $item->name }}</p>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
