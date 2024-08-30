<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title') - {{config('app.name')}}</title>
    <link rel="shortcut icon" href="{{asset('appV1/assets/img/misc/favicon.png')}}"/>

    <link rel="stylesheet" href="{{asset('appV2/assets/css/style.css')}}">

    @yield('page_css')

</head>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<body>
@yield('header')
<div class="" id="">
    @yield('content')
</div>


<script src="{{asset('appV2/assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('appV2/assets/js/popper.min.js')}}"></script>
<script src="{{asset('appV2/assets/js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('appV2/assets/js/amcharts-core.min.js')}}"></script>--}}
{{--<script src="{{asset('appV2/assets/js/amcharts.min.js')}}"></script>--}}
{{--<script src="{{asset('appV2/assets/js/jquery.mCustomScrollbar.js')}}"></script>--}}
{{--<script src="{{asset('appV2/assets/js/custom.js')}}"></script>--}}
{{--<script>--}}
{{--    // $('tbody, .market-news ul').mCustomScrollbar({--}}
{{--    //     theme: 'minimal',--}}
{{--    // });--}}
{{--</script>--}}
@yield('page_js')
</body>

</html>
