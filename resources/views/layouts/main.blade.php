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
    @include('layouts.navbar')

    @yield('body')

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

<script src="https://kit.fontawesome.com/8b3979d85e.js" crossorigin="anonymous"></script>

</html>
