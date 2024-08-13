@extends('components.front')
@extends('components.navBarAdmin')

@section('title', 'dashboard')
<link rel="stylesheet" href="../css/home.css">
@section('content')
    <div class="container">
        <h2 class="mt-3">Halaman List Conditions</h2>

        <div class="container mt-4">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="wrap-btn my-3">
                <a href="/add-brand" class="btn btn-primary">Tambah Data</a>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Create</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brand as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            @if ($item->created_at == null)
                                <td>-</td>
                            @else
                                <td>{{ $item->created_at }}</td>
                            @endif
                            <td>
                                @if ($item->cover)
                                    <img src="{{ asset('storage/cover/' . $item->cover) }}" alt="{{ $item->name }}"
                                        style="max-width: 70px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>
                                <a href="/deleteBrand/{{ $item->id }}" class="text-danger me-4"
                                    style="text-decoration: none">Delete</a>
                                <a href="" class="text-primary" style="text-decoration: none">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
