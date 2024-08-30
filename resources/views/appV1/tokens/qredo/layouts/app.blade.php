<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>{{$token_name}} - {{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="{{config('app.name')}}" />
    <link rel="stylesheet" href="{{asset($asset_path.'css/main.css')}}" type="text/css">
    <!-- Main Stylesheet CSS -->
    <link rel="shortcut icon" href="{{asset('appV1/assets/img/misc/favicon.png')}}" type="image/x-icon">
    <!--Favicon icon-->
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="82">
<div class="site-loader">
    <div class="loader-dots">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>
</div>
@yield('header')
<section class="" id="hero">
    <!-- particles.js container -->

    <!-- stats - count particles -->
    @yield('content')
@yield('footer')
<!-- footer-end -->

<script src="{{asset($asset_path.'js/jquery3.2.1.min.js')}}"></script><!-- JQUERY LIBRARY -->
<script src="{{asset($asset_path.'js/particles.min.js')}}"></script><!-- Particles JS -->
<script src="{{asset($asset_path.'js/bootstrap.min.js')}}"></script><!-- Bootstrap JS -->
<script src="https://www.youtube.com/player_api"></script>
<script src="{{asset($asset_path.'js/main.js')}}"></script><!-- Main JS -->
<script src="{{asset($asset_path.'js/wow.min.js')}}"></script><!-- Main JS -->
</body>
</html>
