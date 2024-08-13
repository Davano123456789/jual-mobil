@extends('components.front')
@extends('components.navBarClient')
@section('title', 'home')
<link rel="stylesheet" href="../css/home.css">
@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3">
            <a href="{{ route('buyAllCars', $baskets->first()->id) }}" class="btn btn-primary">Beli Semua</a>
        </div>
        <table class="table">
            <tr>
                <th>Mobil</th>
                <th>Harga</th>
                <th>Mesin</th>
                <th>Action</th>
            </tr>
            @php
                $totalMobil = 0;
            @endphp
            @foreach ($baskets as $basket)
                @foreach ($basket->cars as $car)
                    @php
                        $totalMobil++;
                    @endphp
                    <tr>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->brand->name }}</td>
                        <td>{{ 'Rp ' . number_format($car->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('deleteCarFromBasket', ['basketId' => $basket->id, 'carId' => $car->id]) }}"
                                class="text-danger"
                                onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </table>
        <h3>Total mobil dalam keranjang: {{ $totalMobil }}</h3>

    </div>
@endsection
