@extends('appV1.layouts.front')
@section('page_title', 'Jobs Opening')
@section('content')
    <style>
        h4 {
            color: #0a0a0a !important;
        }

        div .accordion .accordion-title h4 {
            color: #0a0a0a !important;
        }
    </style>

    <main id="content">
        <section class="vc_row py-5 d-flex flex-wrap align-items-center bg-cover"
                 style="background-color:rgb(18, 29, 51);"></section>

        <section class="vc_row  d-flex flex-wrap align-items-center bg-cover"
                 style="background: rgb(18, 29, 51)">
            <div class="container">
                <div class="row">
                    <div class="lqd-column col-lg-6 col-md-7" data-custom-animations="true"
                         data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","delay":"150","easing":"easeOutQuint","direction":"forward","initValues":{"translateY":50,"opacity":1},"animations":{"translateY":0,"opacity":1}}'>
                        <div class="ld-fancy-heading pt-8">
                            <h2 class="font-size-32 text-white">Work with the world’s
                                top crypto projects to your home.</h2>
                                                        <p class="" style="color: #0ebeff">Culture is more important than ever, so we try to live these values in our daily lives.</p>
                        </div>

                        <br/>

                    </div>
                    <div class="col-md-5 col-lg-5 lqd-column">
                        <img
                            src="{{asset('appV1/assets/img/misc/clipart.svg')}}" style="width: 100%"/>
                    </div>
                </div>
            </div>
        </section>


        <section class="vc_row bg-athens-gray pt-90 pb-80" id="openings">
            <div class="container">
                <div class="row">
                    <div class="lqd-column col-lg-12">
                        <h2 class="font-size-38 lh-13 mt-0 mb-30 text-rotator-activated split-text-applied"
                            data-split-text="true" data-split-options="{&quot;type&quot;:&quot;lines&quot;}"
                            data-text-rotator="true" style="">
                            <div class="lqd-lines split-unit lqd-unit-animation-done"
                                 style="display: block; text-align: start; position: relative;"><span
                                    data-text="Forget about design limits! " class="split-inner"><span
                                        class="split-txt">We believe that decentralization </span></span></div>
                            <div class="lqd-lines split-unit lqd-unit-animation-done"
                                 style="display: block; text-align: start; position: relative;"><span
                                    data-text="Build and customize your" class="split-inner"><span class="split-txt">is about to transform society,</span></span>
                            </div>
                            <div class="lqd-lines split-unit lqd-unit-animation-done"
                                 style="display: block; text-align: start; position: relative;"><span
                                    data-text="portfoliobusinesscreativeagency" class="split-inner"><span
                                        class="split-txt"><span class="txt-rotate-keywords is-changing ws-nowrap"
                                                                style="width: 141.539px;"><span class="keyword"
                                                                                                style="transform: translateY(-65%) rotateX(95deg); opacity: 0;">portfolio</span><span
                                                class="keyword active will-change"
                                                style="transform: translateY(-32.7055%) rotateX(48.2973deg); opacity: 0.496838;">business</span><span
                                                class="keyword is-next will-change"
                                                style="transform: translateY(23.2031%) rotateX(-34.5553deg); opacity: 0.643029;">creative</span><span
                                                class="keyword">agency</span></span></span></span></div>
                        </h2>


                    </div>

                </div>
            </div>
        </section>
        <section class="vc_row pt-80 pb-40">
            <div class="container">
                <div class="row">
                    <div class="lqd-column col-md-6 col-md-offset-3 text-center mb-55">
                        <header class="fancy-heading px-md-5">
                            <h2>Job Openings</h2>
                            <p>We are currently hiring for the following roles.
                                If you think you might be a good fit, we’d love to hear from you.
                            </p>
                        </header>
                    </div>
                </div>
                <div class="row">
                    <div class="lqd-column col-md-12">
                        <div class="fancy-box fancy-box-offer fancy-box-offer-header">
                            <div class="fancy-box-cell fancy-box-header">
                                <h4>Department</h4>
                            </div>


                        </div>
                        <div class="fancy-box fancy-box-offer fancy-box-heading-sm">
                            <div class="fancy-box-cell fancy-box-header">

                                <h3>Contractor Supervisor

                                    <small>Customer Service</small>
                                </h3>
                            </div>
                            <div class="fancy-box-cell fancy-box-header" data-text="Location">
                                <h5>
                                    United Kingdom,<br/>
                                    United States, Europe
                                </h5>
                            </div>

                            <div class="fancy-box-cell" data-text="Availability">
                                <a href="mailto:{{config('app.email')}}" class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Apply for Position</span>
</span>
                                </a>
                            </div>
                        </div>
                        <div class="fancy-box fancy-box-offer fancy-box-heading-sm">
                            <div class="fancy-box-cell fancy-box-header">

                                <h3>Contractor Supervisor

                                    <small>Customer Success Associate</small>
                                </h3>
                            </div>
                            <div class="fancy-box-cell fancy-box-header" data-text="Location">
                                <h5>
                                    United Kingdom,<br/>
                                   United States, Europe
                                </h5>
                            </div>

                            <div class="fancy-box-cell" data-text="Availability">
                                <a href="mailto:{{config('app.email')}}" class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Apply for Position</span>
</span>
                                </a>
                            </div>
                        </div>
                        <div class="fancy-box fancy-box-offer fancy-box-heading-sm">
                            <div class="fancy-box-cell fancy-box-header">

                                <h3>Contractor Supervisor

                                    <small>Customer Success Associate - Russian Support</small>
                                </h3>
                            </div>
                            <div class="fancy-box-cell fancy-box-header" data-text="Location">
                                <h5>
                                    Anywhere
                                    <small> </small>
                                </h5>
                            </div>

                            <div class="fancy-box-cell" data-text="Availability">
                                <a href="mailto:{{config('app.email')}}" class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Apply for Position</span>
</span>
                                </a>
                            </div>
                        </div>
                        <div class="fancy-box fancy-box-offer fancy-box-heading-sm">
                            <div class="fancy-box-cell fancy-box-header">

                                <h3>Contractor Supervisor

                                    <small>Customer Success Senior Associate - Second Line Support</small>
                                </h3>
                            </div>
                            <div class="fancy-box-cell fancy-box-header" data-text="Location">
                                <h5>
                                    London, Miami, Vilnius
                                    <small> </small>
                                </h5>
                            </div>

                            <div class="fancy-box-cell" data-text="Availability">
                                <a href="mailto:{{config('app.email')}}" class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Apply for Position</span>
</span>
                                </a>
                            </div>
                        </div>
                        <div class="fancy-box fancy-box-offer fancy-box-heading-sm">
                            <div class="fancy-box-cell fancy-box-header">

                                <h3><i class="fa fa-elementor"></i> Engineering

                                    <small>Android Engineer</small>
                                </h3>
                            </div>
                            <div class="fancy-box-cell fancy-box-header" data-text="Location">
                                <h5>
                                    London, San Francisco, Miami, Remote
                                    <small> </small>
                                </h5>
                            </div>

                            <div class="fancy-box-cell" data-text="Availability">
                                <a href="mailto:{{config('app.email')}}" class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Apply for Position</span>
</span>
                                </a>
                            </div>
                        </div>
                        <div class="fancy-box fancy-box-offer fancy-box-heading-sm">
                            <div class="fancy-box-cell fancy-box-header">

                                <h3> Data Science

                                    <small>Senior Data Scientist - Risk & Fraud</small>
                                </h3>
                            </div>
                            <div class="fancy-box-cell fancy-box-header" data-text="Location">
                                <h5>
                                    Anywhere
                                    <small> </small>
                                </h5>
                            </div>

                            <div class="fancy-box-cell" data-text="Availability">
                                <a href="mailto:{{config('app.email')}}" class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Apply for Position</span>
</span>
                                </a>
                            </div>
                        </div>
                        <div class="fancy-box fancy-box-offer fancy-box-heading-sm">
                            <div class="fancy-box-cell fancy-box-header">

                                <h3>MARKETER NEEDED!!

                                    <small>Qualified Marketers can apply for the position</small>
                                </h3>
                            </div>
                            <div class="fancy-box-cell fancy-box-header" data-text="Location">
                                <h5>
                                    Anywhere
                                    <small> </small>
                                </h5>
                            </div>

                            <div class="fancy-box-cell" data-text="Availability">
                                <a href="mailto:{{config('app.email')}}" class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Apply for Position</span>
</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('page_css')

@endsection
