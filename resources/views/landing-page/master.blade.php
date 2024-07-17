<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('landing-page-assets')}}/css/style.css">



</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        @include('landing-page.include.header')

        @yield('content')

        @include('landing-page.include.footer')



    </div>
    <!-- .site-wrap -->

    <script src="{{asset('landing-page-assets')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/jquery-ui.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/popper.min.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/jquery.stellar.min.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/jquery.easing.1.3.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/aos.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/jquery.fancybox.min.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/jquery.sticky.js"></script>
    <script src="{{asset('landing-page-assets')}}/js/jquery.mb.YTPlayer.min.js"></script>


    <script src="{{asset('landing-page-assets')}}/js/main.js"></script>

</body>

</html>