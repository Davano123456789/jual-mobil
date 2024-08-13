@extends('components.front')
@extends('components.navBarAdmin')

@section('title', 'dashboard')
<link rel="stylesheet" href="../css/home.css">
@section('content')
    <div class="container mt-4">
        <h2>
            Halaman List car
        </h2>
        <div class="container mt-4">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="wrap-btn my-3">
                <a href="/addCar" class="btn btn-primary">Tambah Data</a>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Name car</th>
                        <th scope="col">Mesin</th>
                        <th scope="col">Bahan bakar</th>
                        <th scope="col">Transmisi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->brand->name }}</td>
                            <td>{{ $item->condition->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->mesin }}</td>
                            <td>{{ $item->bahan_bakar }}</td>
                            <td>{{ $item->transmisi }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>
                                <a href="" class="text-danger">Delete</a>
                                <a href=""class="text-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
