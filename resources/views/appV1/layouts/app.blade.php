<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Trade, CBD, CFD,  Cryptocurrency, Real Estate"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#3ed2a7">
    <link rel="shortcut icon" href="{{asset('appV1/assets/img/misc/favicon.png')}}"/>
    <title>{{config('app.name')}} - @yield('page_title')</title>
    <link rel="stylesheet" href="{{asset('appV1/use.typekit.net/dcf1bki.css')}}">
    <link rel="stylesheet" href="{{asset('appV1/assets/vendors/liquid-icon/liquid-icon.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('appV1/assets/vendors/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('appV1/assets/css/theme-vendors.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('appV1/assets/css/theme.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('appV1/assets/css/themes/crypto.css')}}"/>

    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
    <meta name="title" content="@yield('page_title') | {{config('app.name')}}">

<meta content="{{asset('appV1/assets/img/misc/meta-bg.png')}}" property='og:image'>
    <meta name="description"
          content="{{config('app.name')}} is the leading Cryptocurrency platform in the world where you can buy new tokens, store, secure, swap volatile assets and stake for long term benefits.">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{config('app.name')}} - @yield('page_title')">
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta name="twitter:title" content="{{config('app.name')}} - @yield('page_title')">

    <meta name="twitter:image" content="{{asset('appV1/assets/img/misc/meta-bg.png')}}"/>

    <meta name="twitter:card" content="summary"/>

<meta content="{{asset('appV1/assets/img/misc/meta-bg.png')}}" name='twitter:image:src'>
    <meta name="twitter:site" content="{{config('app.name')}}">
    <meta name="twitter:title"
          content="@yield('page_title') | {{config('app.name')}}"/>
    <meta name="twitter:description"
          content="{{config('app.name')}} is the leading Cryptocurrency platform in the world where you can buy new tokens, store, secure, swap volatile assets and stake for long term benefits."/>


    <script async src="{{asset('appV1/assets/vendors/modernizr.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('appV1/assets/css/themes/seo.css')}}" />
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="13bd3a65-60e9-4fa4-8197-188e30a16420";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
@yield('page_css')
</head>
<script type='application/ld+json'>
        {
          "@context": "http://www.schema.org",
          "@type": "WebSite",
          "name": "{{config('app.name')}}",
          "description": "{{config('app.name')}} is the leading Cryptocurrency platform in the world where you can buy new tokens, store, secure, swap volatile assets and stake for long term benefits.",
          "url": "{{env('APP_URL')}}",

        }


    </script>
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="minimal"
      data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
<div id="wrap">
  @yield('header')


    <main id="content" class="content">
    @yield('content')
    </main>

    @yield('footer')
</div>
<script src="{{asset('appV1/assets/vendors/jquery.min.js')}}"></script>
{{--<script src="{{asset('appV1/assets/js/jquery-3.6.3.min.js')}}"></script>--}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
@yield('page_js')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUnWOSK2b5WtvMOAI8j55OHhS_sNv2VfA"></script>


<script src="{{asset('appV1/assets/js/theme-vendors.js')}}"></script>
<script src="{{asset('appV1/assets/js/theme.min.js')}}"></script>
<script src="{{asset('appV1/assets/js/liquidAjaxContactForm.min.js')}}"></script>
<script src="{{asset('appV1/assets/js/liquidAjaxMailchimp.min.js')}}"></script>


</body>
</html>
