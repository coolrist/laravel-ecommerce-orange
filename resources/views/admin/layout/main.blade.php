<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">

<head>
    @php($disableNavBar = isset($disableNavigation))
    <title>@yield('title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('/assets/admin/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fontawesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fontawesome/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fontawesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/w3schools.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/style.css') }}">
</head>

<body class="w3-light-grey">
    @include('admin.layout.navigation')

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" {!! !$disableNavBar ? "style='margin-left:300px;margin-top:43px;'" : '' !!}>

        <div class="container-fluid">
            @yield('content')
        </div>

        @include('admin.layout.footer')
        <!-- End page content -->
    </div>

    @include('admin.layout.global_js')
    @yield('js')
</body>

</html>
