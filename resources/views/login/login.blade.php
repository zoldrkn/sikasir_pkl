<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Icon Website -->
    <title>Login</title>
    <!-- Library CSS -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
    {{-- <style>
    body {
        background: url("{{ asset('/') }}image/logo/LOGO PT. PEK apk.png") repeat;
        background-size: 250px;
    }
    </style> --}}
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <form action="" method="post" role="form">
                @csrf
                <div class="card-header text-center">
                    <div class="text-center my-3">
                        <img class="img-fluid" alt="Responsive image" width="100"
                            src="{{ asset('/') }}image/logo/LOGO PT. PEK apk.png"
                            alt="User profile picture">
                    </div>
                    <h5><strong>SISTEM INFORMASI KASIR</strong></h5>
                    <h5><strong>PT. PANEN EMBUN KEMAKMURAN</strong></h5>
                </div>
                <div class="card-body">
                    {{-- <?php $this->view('layouts/alert'); ?> --}}
                    @if(($errors->any))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $item)
                            <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="password" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="submit"
                                class="btn btn-block text-white btn-primary"><b>LOGIN</b></button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <!-- Library JS -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
</body>
</html>