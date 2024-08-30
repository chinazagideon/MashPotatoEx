@extends('appV1.layouts.front')
@section('page_title', 'Sales')
@section('content')
    <section class="vc_row py-5 d-flex flex-wrap align-items-center bg-cover"
             style="background-image:  linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);"></section>

    <section class="vc_row  d-flex flex-wrap align-items-center bg-cover"
             style="background: #F3E8F9">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-6 col-md-offset-1 col-md-7" data-custom-animations="true"
                     data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","delay":"150","easing":"easeOutQuint","direction":"forward","initValues":{"translateY":50,"opacity":1},"animations":{"translateY":0,"opacity":1}}'>
                    <div class="ld-fancy-heading pt-8 pb-5">
                        <h2 class="font-size-32">Want to get in early on some of the best projects out there,</h2>
                        <h5 class="text-dark">partake in their presale they could be the next bitcoin</h5>
                    </div>

                    <a href="{{route('login')}}"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Get Stared</span>
</span>
                    </a>
                    <a href="#sales"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Learn More</span>
</span>
                    </a>

                </div>
                <div class="col-md-5 col-lg-4 lqd-column mt-3 mb-5">
                    <img
                        src="{{asset('appV1/assets/img/misc/feature-7.png')}}"/>
                </div>
            </div>
        </div>
    </section>

    <style>
        a:hover {

            background-color: #0ebeff;
            padding: 10px;
            height: 5px;
        }
    </style>


    <section id="sales" class="vc_row pb-90 bg-cover" data-parallax="true"
             data-parallax-options='{"parallaxBG":true}'
             style="background-image: url({{asset('appV1/dashb/assets/images/bg-40.jpg')}})">;
        <div class="container">
            <div class="row">
                <div class="lqd-column col-md-6 col-md-offset-3 px-md-5 mb-60 mt-4">
                    <header class="fancy-heading text-center">
                        <h2 class="mt-0 font-size-44 text-white">Listed Coins</h2>
                        {{--                        <p class="text-white font-size-17 lh-175 text-fade-white-07">Blocks in shorter chains (or--}}
                        {{--                            invalid chains) are not used for anything. The bitcoin client switches to another.</p>--}}
                    </header>
                </div>
                <div class="lqd-column col-md-10 col-md-offset-1">
                    <div class="one-roadmap" data-custom-animations="true"
                         data-ca-options='{"triggerHandler": "inview", "animationTarget": ".one-roadmap-item", "duration": 1200, "delay": 150, "easing": "easeOutQuint", "initValues": { "translateY": 50, "translateZ": -150, "rotateX": -95, "opacity": 0 }, "animations": { "translateY": 0, "translateZ": 0, "rotateX": 0, "opacity": 1 }}'>
                        <div class="one-roadmap-inner">
                            {{--                            <h3 class="text-center text-white title-size-48">Pre-sales Loading...</h3>--}}
                            @foreach($presales as $sales)
                                <div class="one-roadmap-item text-white">
                                    {{-- <span class="one-roadmap-bar"></span>--}}
                                    <div class="one-roadmap-info">
                                        <h4>{{$sales->coin}}</h4>
                                        <p style="line-height: 0em"><a href="{{route($sales->coin_slug)}}">View details</a></p>
                                    </div>
                                    <span class="one-roadmap-mark">
<i class="icon-ion-ios-checkmark"></i>
</span>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
