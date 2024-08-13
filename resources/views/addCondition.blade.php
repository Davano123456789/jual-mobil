@extends('components.front')
@extends('components.navBarAdmin')

@section('title', 'dashboard')
<link rel="stylesheet" href="../css/home.css">
@section('content')
    <div class="container">
        <h2 class="mt-3">Add Conditions</h2>
        <form action="" method="POST" class="w-50">
            @csrf
            <label for="name" class="form-label mt-5">Name</label>
            <input type="text" name="name" id="name" class="form-control mb-3">
            <button class="btn btn-primary" type="submit">Add Data</button>
        </form>

    </div>
@endsection
