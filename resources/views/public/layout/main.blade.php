<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('/assets/public/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fontawesome/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fontawesome/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fontawesome/css/regular.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/public/css/style.css') }}">
</head>

<body>
    @include('public.layout.navbar')

    <main>
        @yield('content')
    </main>

    @include('public.layout.footer')

    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('js')
</body>

</html>
