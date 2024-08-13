@extends('components.front')
@section('title', 'home')
@extends('components.navBarClient')
<link rel="stylesheet" href="../css/home.css">
@section('content')


    <div class="container">
        <h3 class="mt-5 mb-4">Model Dengan Kondisi Baru</h3>
        <!-- Formulir Pencarian -->
        <form action="{{ route('carsNew.search') }}" method="GET" class="w-50">
            <div class="input-group mb-4">
                <input type="text" name="query" class="form-control" placeholder="Cari nama mobil"
                    value="{{ request()->query('query') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
        <div class="wrap-kartu-carnew">
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-4 mb-4" style="">
                        <div class="card h-100" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <div class="card-img-top">
                                @if ($car->image->isNotEmpty())
                                    <!-- Mengambil gambar pertama dari koleksi -->
                                    <img src="{{ asset('storage/name/' . $car->image->first()->name) }}"
                                        alt="{{ $car->image->first()->name }}" class="img-fluid">
                                @else
                                    <!-- Tampilkan gambar default jika mobil tidak memiliki gambar -->
                                    <img src="{{ asset('storage/default.jpg') }}" alt="Default Image">
                                @endif
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">{{ $car->name }}</h4>
                                <p class="card-text">Rp.{{ number_format($car->harga, 0, ',', '.') }}</p>
                                <a href="" class="btn btn-primary mt-auto">Lihat Mobil</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
