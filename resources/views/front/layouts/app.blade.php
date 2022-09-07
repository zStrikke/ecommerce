<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
</head>

<body class="home-page home-01 ">

    <!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

    <!--header-->
    <header id="header" class="header header-style-1">
        <div class="container-fluid">
            <div class="row">
                <!-- Top Bar Menu -->
                @include('front.components.top-bar')
                <!-- END Top Bar Menu -->

                <div class="container">
                    <!-- Navbar with logo + SearchBar + Wishlist + Cart -->
                    @include('front.components.logo-bar')
                    <!-- END Navbar with logo + SearchBar + Wishlist + Cart -->
                </div>

                <div class="nav-section header-sticky">
                    <!-- Hot Section TODO: ver como referenciarlo en la BBDD--> 
                    @include('front.components.hot-bar')
                    <!-- END Hot Section --> 
                    <!-- Sticky Header -->
                    @include('front.components.nav-bar')
                    <!-- END Sticky Header -->
                </div>
            </div>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>



    <footer id="footer">
        <div class="wrap-footer-content footer-style-1">
            <!-- Shipping + Guarantee + Payment + Support -->
            @include('front.components.online-info')
            <!--END Shipping + Guarantee + Payment + Support-->

            <div class="main-footer-content">
                <!-- INFO FOOTER -->
                @include('front.components.info-footer')
                <!-- END Info Footer -->
                <!-- Quick Links -->
                @include('front.components.quick-links')
                <!-- END Quick Links -->
            </div>
            <!-- Copyright footer -->
            @include('front.components.copyright-footer')
            <!-- END Copiright footer -->
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
</body>

</html>