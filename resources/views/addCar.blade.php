@extends('components.front')
@extends('components.navBarAdmin')

@section('title', 'dashboard')
<link rel="stylesheet" href="../css/home.css">
@section('content')
    <div class="container">
        <h2 class="mt-3">Add Car</h2>
        @if ($errors->any())
            <div class="alert alert-danger  d-flex justify-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="rilAddCar" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="brand_id" class="form-label mt-3">Brand</label>
                    <select name="brand_id" id="brand_id" class="form-control mb-4">
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-6">
                    <label for="condition_id" class="form-label mt-3">Condition</label>
                    <select name="condition_id" id="condition_id" class="form-control mb-4">
                        @foreach ($conditions as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-6">
                    <label for="name" class="form-label mt-3">Name</label>
                    <input type="text" name="name" id="name" class="form-control mb-3">
                </div>
                <div class="col-6">
                    <label for="mesin" class="form-label mt-3">Mesin</label>
                    <input type="text" name="mesin" id="mesin" class="form-control mb-3">
                </div>
                <div class="col-6">
                    <label for="bahan_bakar" class="form-label mt-3">Bahan Bakar</label>
                    <input type="text" name="bahan_bakar" id="bahan_bakar" class="form-control mb-3">
                </div>
                <div class="col-6">
                    <label for="transmisi" class="form-label mt-3">Transmisi</label>
                    <input type="text" name="transmisi" id="transmisi" class="form-control mb-3">
                </div>
                <div class="col-6">
                    <label for="harga" class="form-label mt-3">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control mb-3">
                </div>
                <button class="btn btn-primary" type="submit">Add Data</button>
            </div>

        </form>

    </div>
@endsection
