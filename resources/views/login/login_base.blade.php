<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <title>Propulse4U- @yield('title') </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Sites meta Data -->
    <meta name="application-name"
          content="Propulse4U - Crypto, BitCoin, Etheruim">
    <meta name="author" content="Propulse4U">
    <meta name="keywords" content="Propulse4U- Propulse4U, Propulse4U, Propulse4U">
    <meta name="description"
          content="">

    <!-- OG meta data -->
    <meta property="og:title"
          content="">
    <meta property="og:site_name" content=Propulse4U>
    <meta property="og:url" content="https://Propulse4U.com/">
    <meta property="og:description"
          content="Welcome to Infinix,">
    <meta property="og:type" content="website">
    <meta property="og:image" content="assets/images/og.png">

    <link rel="shortcut icon" href="{{asset('images/preview.svg')}}" type="image/x-icon">

    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!--Macnific Popup Css-->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <!--Owl Carousel min Css-->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!--Owl theme Default Css-->
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
    <!--nice select Css-->
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <!--Glyphter Css-->
    <link rel="stylesheet" href="{{asset('glyphter-font/css/Glyphter.css')}}">
    <!--animation Css-->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!--Fontawsome all min Css-->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!--Main custom Css-->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- main css for template -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

<body>
<div class="main-wrapper">
    @include('_partials._header')
    <div class="page-content">
        @yield('content')
    </div>

</div>



@include('_partials._modal')


<!-- vendor plugins -->
@stack('scripts')
<!--Jquery min js-->
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<!--Bootstrap bundle min js-->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!--Magnific Popup js-->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<!--Owl Carousel min js-->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!--nice select min js-->
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<!--Wow min js-->
<script src="{{asset('js/wow.min.js')}}"></script>
<!--jquery ui min-->
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<!--Main js-->
<script src="{{asset('js/main.js')}}"></script>


</body>

</html>
