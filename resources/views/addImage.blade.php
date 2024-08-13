@extends('components.front')
@extends('components.navBarAdmin')

@section('title', 'addImage')
<link rel="stylesheet" href="../css/home.css">
@section('content')
    <div class="container">
        <h2 class="mt-3">Add Image</h2>
        @if ($errors->any())
            <div class="alert alert-danger  d-flex justify-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="rilAddImage" method="POST" class="w-50" enctype="multipart/form-data">
            @csrf
            <label for="gender" class="form-label">Car</label>
            <select name="car_id" id="car_id" class="form-control mb-4">
                @foreach ($cars as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control mb-4">
            <button class="btn btn-primary" type="submit">Add Data</button>
        </form>


    </div>
@endsection
