@extends('components.front')
@extends('components.navBarAdmin')

@section('title', 'dashboard')
<link rel="stylesheet" href="../css/home.css">
@section('content')
    <div class="container">
        <h2 class="mt-3">Halaman List Conditions</h2>

        <div class="container mt-4">
            @if ($errors->any())
                <div class="alert alert-danger  d-flex justify-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            <div class="wrap-btn my-3">
                <a href="/add-condition" class="btn btn-primary">Tambah Data</a>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Create</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($condition as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            @if ($item->created_at == null)
                                <td>-</td>
                            @else
                                <td>{{ $item->created_at }}</td>
                            @endif
                            <td>
                                <a href="/deleteCondition{{ $item->id }}" class="text-danger me-4"
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
