@extends('components.front')
@extends('components.navBarAdmin')

@section('title', 'dashboard')
<link rel="stylesheet" href="../css/home.css">
@section('content')
    <div class="container">
        <h2 class="mt-3">Halaman List Images</h2>

        <div class="container mt-4">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="wrap-btn my-3">
                <a href="/addImage" class="btn btn-primary">Tambah Data</a>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Create</th>
                        <th scope="col">Mobil</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($image as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/name/' . $item->name) }}" style="width: 70px" alt="">
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->car->name }}</td>
                            <td>
                                <a href="" class="text-primary me-3">Edit</a>
                                <a href="/deleteImage/{{ $item->id }}" class="text-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
