@extends('components.front')
@extends('components.navBarAdmin')

@section('title', 'dashboard')
<link rel="stylesheet" href="../css/home.css">
@section('content')
    <div class="container mt-4">
        <h2>Apakah yakin menghapus brand : {{ $brand->name }} </h2>
        <a href="/deletedBrand/{{ $brand->id }}" class="btn btn-danger">Delete</a>
        <a href="listBrands" class="btn btn-primary">Batal</a>
    </div>
@endsection
