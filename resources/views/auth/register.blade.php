<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="/custom.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet" />
    <style>
        @import url('https://fonts.cdnfonts.com/css/montserrat');
    </style>
    <link rel="icon" href="{{ asset('logo_web.jpeg') }}" type="image/x-icon">
</head>

<body>
    <form method="POST" action="/register">
        @csrf
        <div class="login-custom">
            <div class="card login-card-custom">
                @if (session('Success'))
                    <div class="alert alert-success">
                        {{ session('Success') }}
                    </div>
                @elseif (session('Failed'))
                    <div class="alert alert-danger">
                        {{ session('Failed') }}
                    </div>
                @elseif (session('Error'))
                    <div class="alert alert-danger">
                        {{ session('Error') }}
                    </div>
                @else
                @endif
                <div class="card-body">
                    <div class="login-content-custom">
                        <div class="content-logo text-center">
                           <a href="/beranda" style="text-decoration:none;"> News Tech </a>
                        </div>
                        <div class="content-title text-center">
                            Daftar
                        </div>
                        <div class="content-subtitle text-center mb-4">
                            Masukan nama, email dan password untuk mendaftar.
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-custom" id="name"
                                placeholder="Masukkan nama" name="name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-custom" id="email"
                                placeholder="Masukkan email" name="email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-custom" id="password"
                                placeholder="Masukkan password" name="password">
                        </div>
                        <div class="mt-4">
                            <input type="submit" class="btn btn-outline-primary-custom btn-lg" style="width: 100%"
                                value="Daftar" id="submit" name="submit">
                        </div>
                        <div class="text-center mt-4">
                            Sudah punya akun ? <a href="/login" class="text-primary">Login disini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

<script src="https://kit.fontawesome.com/8b3979d85e.js" crossorigin="anonymous"></script>

</html>
