<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{$token_name}} - {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="{{config('app.name')}}">
    <link rel="shortcut icon" href="{{asset('appV1/assets/img/misc/favicon.png')}}"/>


    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset($asset_path.'css/bootstrap-grid.css')}}" />
    <link rel="stylesheet" href="{{asset($asset_path.'css/icons.css')}}">
    <link rel="stylesheet" href="{{asset($asset_path.'css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset($asset_path.'css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset($asset_path.'css/responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset($asset_path.'css/bootstrap.css')}}" />

</head>
<body class="lines" id="scrollup">

<img src="{{asset($asset_path.'images/p3.png')}}" class="vx" alt="" data-enllax-ratio="-0.1" data-enllax-type="foreground" />

<div class="page-loading">
    <img src="{{asset($asset_path.'images/loader.gif')}}" alt="" />
    <span>Skip Loader</span>
</div>

<div class="theme-layout">

  @yield('header')
    @yield('content')
    @yield('footer')
</div>


<script src="{{asset($asset_path.'js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/script.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/scrolly.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/countdown.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/mouse.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/3d.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/enllax.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/poptrox.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/scrollnav.js')}}" type="text/javascript"></script>
<script src="{{asset($asset_path.'js/scrollup.js')}}" type="text/javascript"></script>

</body>
</html>

