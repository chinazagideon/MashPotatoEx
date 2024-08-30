<!DOCTYPE html>
<html>
<head><title>{{config('app.name')}} | @yield('page_title')</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="shortcut icon" href="{{asset('assets/logo-icon.png')}}" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{asset('assets/logo-icon.png')}}">

    <link href="{{asset('appV1/dashboard/fast.fonts.net/cssapi/175a63a1-3f26-476a-ab32-4e21cbdb8be2.css')}}"
          rel="stylesheet" type="text/css">
    <link href="{{asset('appV1/admin/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('appV1/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}"
          rel="stylesheet">
    <link href="{{asset('appV1/admin/bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet">
    <link href="{{asset('appV1/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('appV1/admin/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('appV1/admin/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('appV1/admin/bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('appV1/admin/css/main5739.css?version=4.5.0')}}" rel="stylesheet">
    @yield('page_css')

</head>
{{--color-scheme-dark--}}
<body class="menu-position-side menu-side-left full-screen with-content-panel menu-position-side menu-side-left full-screen color-scheme-dark">
<div class="all-wrapper with-side-panel solid-bg-all">


    <div class="layout-w">
        @yield('sidebar')
        <div class="content-w">
            <!--------------------START - Breadcrumbs
-------------------->
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/">Account</a></li>
                <li class="breadcrumb-item"><span>@yield('page_title')</span></li>
            </ul>
            <!--------------------END - Breadcrumbs-------------------->

            <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
            <br/>
            @if(!empty(session('status')))
                <div class="padding-left container ">
                    <div class="alert alert-success" role="alert"><strong>Well done! </strong>
                        {!! session('status') !!}
                    </div>
                </div>
            @endif
            @if(!empty(session('status2')))
                <div class="padding-left container ">
                    <div class="alert alert-danger" role="alert"><strong>Oh Snap! </strong>
                        {!! session('status2') !!}
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    <div class="display-type"></div>
</div>


<script src="{{asset('appV1/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/moment/moment.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap-validator/dist/validator.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/dropzone/dist/dropzone.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/editable-table/mindmup-editabletable.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/util.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/alert.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/button.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/carousel.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/collapse.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/dropdown.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/modal.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/tab.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/tooltip.js')}}"></script>
<script src="{{asset('appV1/admin/bower_components/bootstrap/js/dist/popover.js')}}"></script>
<script src="{{asset('appV1/admin/js/demo_customizer5739.js?version=4.5.0')}}"></script>
<script src="{{asset('appV1/admin/js/main5739.js?version=4.5.0')}}"></script>


<script>(function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-42863888-9', 'auto');
    ga('send', 'pageview');</script>
@yield('page_js')
</body>
</html>

