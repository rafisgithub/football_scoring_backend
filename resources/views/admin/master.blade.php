<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('admin-assets') }}/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('admin-assets') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin-assets') }}/plugins/fontawesome/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="{{ asset('admin-assets') }}/css/style.css">

</head>

<body>

    <div class="main-wrapper">

        @include('admin.include.header')

        @include('admin.include.left-side-bar')

        @yield('content')

    </div>


    <script src="{{ asset('admin-assets') }}/js/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('admin-assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('admin-assets') }}/js/bootstrap.min.js"></script>

    <script src="{{ asset('admin-assets') }}/js/feather.min.js"></script>

    <script src="{{ asset('admin-assets') }}/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="{{ asset('admin-assets') }}/plugins/apexchart/apexcharts.min.js"></script>
    <script src="{{ asset('admin-assets') }}/plugins/apexchart/chart-data.js"></script>

    <script src="{{ asset('admin-assets') }}/js/script.js"></script>
</body>

</html>