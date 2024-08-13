<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <title>Login</title>
</head>

<body>
    <div class="wrap-login">
        <div class="row">
            <div class="col-6">
                <div class="wrap-logo">
                    <img src="../images/logo.png" alt="">
                </div>
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
                <div class="tilte">
                    <h2>Log in immediately using your account to enter Jualcar </h2>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="tes">

                        <div class="wrap-input">
                            <label for="username" class="form-label d-block">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="tes">

                        <div class="wrap-input">
                            <label for="password" class="form-label d-block">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <button class="btn btn-primary w-50" type="submit">Login Now</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div class="bg-img">

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
