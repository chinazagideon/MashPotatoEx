@extends('appV1.layouts.front')
@section('page_title', 'System Operational Status')
@section('content')
    <section class="vc_row py-5 d-flex flex-wrap align-items-center bg-cover"
             style="background-color:rgb(18, 29, 51);"></section>

    <section class="vc_row  d-flex flex-wrap align-items-center bg-cover  pb-6"
             style="background: rgb(18, 29, 51)">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-6 col-md-7" data-custom-animations="true"
                     data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","delay":"150","easing":"easeOutQuint","direction":"forward","initValues":{"translateY":50,"opacity":1},"animations":{"translateY":0,"opacity":1}}'>
                    <div class="ld-fancy-heading pt-8">
                        <h2 class="font-size-32 text-white">System Status</h2>
                        <p class="" style="color: #0ebeff">Culture is more important than ever, so we try to live these values in our daily lives.</p>
                    </div>


                </div>
                <div class="col-md-5 col-lg-5 lqd-column hidden-xs hidden-sm col-lg-offset-1">
                    <img
                        src="{{asset('appV1/assets/img/misc/png-clipart-logo-business-shield-logo-design-purple-blue.png')}}" style="width: 70%"/>
                </div>
            </div>
        </div>
    </section>
    <section class="vc_row pt-80 pb-40">
            <div class="container">
                <div class="row">
                    <div class="lqd-column col-md-6 col-md-offset-3 text-center mb-55">
                        <header class="fancy-heading px-md-5">
{{--                            <h2>ALL SYSTEM: <span class="text text-success">ACTIVE</span></h2>--}}
                            @foreach($defaults->data as $key => $default)
                                <h5>{{strtoupper(str_replace("_" , " ", $key))}}: <span class="text {{$default === 'ACTIVE' ? 'text-success': 'text-danger'}}">{{str_replace("-", " ", $default)}}</span></h5>

                            @endforeach

                            <p>
                            </p>
                        </header>
                    </div>
                </div>

            </div>
        </section>
@endsection
