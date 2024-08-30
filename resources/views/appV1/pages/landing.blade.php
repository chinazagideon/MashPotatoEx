@extends('appV1.layouts.front')
@section('page_title', 'Home')
@section('content')

    <section class="vc_row fullheight d-flex flex-wrap align-items-center bg-cover pt-150 pb-150"
             style="background-image:  linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);"
             data-parallax="true" data-parallax-options='{ "parallaxBG": true }'>
        <div class="container">
            <div class="row">
                <div class="bg-mini lqd-column col-md-7 " data-custom-animations="true"
                     data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","delay":"150","easing":"easeOutQuint","direction":"forward","initValues":{"translateY":60,"translateZ":-150,"rotateX":-65,"opacity":0},"animations":{"translateY":0,"translateZ":0,"rotateX":0,"opacity":1}}'>
                    <h1 class="text-white pr-md-5 mt-0 mb-40" data-split-text="true"
                        data-split-options='{"type":"lines"}'>The fullstack solution for crypto</h1>
                    <p class="text-white font-size-16 lh-185 pr-md-7 mb-60" data-split-text="true"
                       data-split-options='{"type":"lines"}'>Buy, earn, and trade the best new crypto assets all under
                        one roof.</p>
                    <a href="{{route('login')}}"
                       class="btn btn-solid text-uppercase semi-round btn-solid border-thin btn-gradient font-size-14 font-weight-semibold ltr-sp-1 px-2"
                    >
<span>
<span class="btn-gradient-bg"></span>
<span class="btn-txt">Get Started</span>
<span class="btn-gradient-bg btn-gradient-bg-hover"></span>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
     class="btn-gradient-border" width="100%" height="100%">
<defs>
<linearGradient id="svg-border-5c596b4b59c72" x1="0%" y1="0%" x2="100%" y2="0%">
<stop offset="0%"></stop>
<stop offset="100%"></stop>
</linearGradient>
</defs>
<rect x="0.5" y="0.5" rx="2px" ry="2px" width="100%" height="100%" stroke="url(#svg-border-5c596b4b59c72)"></rect>
</svg>
</span>
                    </a>

                </div>
                <div class="lqd-column col-md-5 hidden-xs hidden-sm">
                    <div class="lqd-parallax-images-2" data-custom-animations="true"
                         data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","startDelay":"800","delay":"150","easing":"easeOutQuint","direction":"forward","initValues":{"translateX":40,"scaleX":0.75,"scaleY":0.75,"rotateY":-25,"opacity":0},"animations":{"translateX":0,"scaleX":1,"scaleY":1,"rotateY":0,"opacity":1}}'>
                        <div class="liquid-img-group-container">
                            <div class="liquid-img-group-inner">
                                <div class="liquid-img-group-single" data-shadow-style="3" data-roundness="8">
                                    <div class="liquid-img-group-img-container">
                                        <div class="liquid-img-container-inner" data-parallax="true"
                                             data-parallax-from='{"translateX":1,"translateY":1}'
                                             data-parallax-to='{"translateX":-17,"translateY":-27}'
                                             data-parallax-options='{"overflowHidden":false,"easing":"linear"}'>
                                            <figure>
                                                <img alt="Manage"
                                                     src="{{asset('appV1/assets/img/misc/stack_card_desktop-6b54b3740c6eb62733e0d2c0c7e5dc54.svg')}}"/>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="liquid-img-group-container w-70">
                            <div class="liquid-img-group-inner">
                                <div class="liquid-img-group-single" data-shadow-style="3" data-roundness="8">
                                    <div class="liquid-img-group-img-container">
                                        <div class="liquid-img-container-inner" data-parallax="true"
                                             data-parallax-from='{"translateX":1,"translateY":1}'
                                             data-parallax-to='{"translateX":-45,"translateY":-69}'
                                             data-parallax-options='{"overflowHidden":false,"easing":"linear"}'>
                                            <figure>
                                                <img alt="Manage" src="{{asset('appV1/assets/demo/misc/sc-3.png')}}"/>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="liquid-img-group-container w-70">
                            <div class="liquid-img-group-inner">
                                <div class="liquid-img-group-single" data-shadow-style="3" data-roundness="8">
                                    <div class="liquid-img-group-img-container">
                                        <div class="liquid-img-container-inner" data-parallax="true"
                                             data-parallax-from='{"translateX":1,"translateY":32}'
                                             data-parallax-to='{"translateX":-56,"translateY":-181}'
                                             data-parallax-options='{"overflowHidden":false,"easing":"linear"}'>
                                            <figure>
                                                {{--                                                <img alt="Manage"--}}
                                                {{--                                                     src="{{asset('appV1/assets/demo/misc/sc-1.jpg')}}"--}}
                                                {{--                                                     style="width: 60%"/>--}}
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="one-row_bottom_divider" style="height:180px;">
            <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" height="182" viewBox="0 0 1920 182"
                 preserveAspectRatio="none">
                <path
                    d="M1921.91,916.348c0.33,39.216-.34,79.431,0,118.642Q957.95,1035.5-6,1035V853c40.431,10.8,81,19.794,122.5,27.149,62.957,11.157,117.371,15.375,180.742,21.116,79.864,7.236,165.843,26.989,255.045,42.232,109.142,18.65,243.949,40.091,308.265,44.243,137.637,8.886,313.056-2.783,504.066-36.2,127.4-22.286,223.4-43.261,354.45-45.248A1569.414,1569.414,0,0,1,1921.91,916.348Z"
                    transform="translate(0 -853)"></path>
            </svg>
        </div>
    </section>
    <section class="vc_row pt-100 pb-100 bg-right-center bg-no-repeat"
             style="background-image: url({{asset('appV1/assets/img/misc/bg-modified.png')}});">
        <div class="container ">
            <div class="row">
                <div class="lqd-column col-md-6 mb-50 p-4 fancy-title" style="background-color: hsla(0,0%,100%,0.8)">
                    <h2 class="mt-4 split-text-applied" data-split-text="true"
                        data-split-options="{&quot;type&quot;:&quot;lines&quot;}" style="">
                        <div class="lqd-lines split-unit lqd-unit-animation-done"
                             style="display: block; text-align: start; position: relative;"><span
                                data-text="Complete design " class="split-inner"><span class="split-txt text-dark">Staking Interest Account</span></span>
                        </div>
                        <div class="lqd-lines split-unit lqd-unit-animation-done"
                             style="display: block; text-align: start; position: relative;"><span
                                data-text="toolkit included" class="split-inner"><span class="split-txt"><span
                                        class="text-primary">up to 120.6% APY</span></span></span></div>
                    </h2>

                    <p class="font-size-17 lh-175 pr-md-7 mr-md-3">With a {{config('app.name')}} Interest Account, your
                        cryptocurrency can earn up to 120.6% APY. Interest accrues daily and is paid monthly. There are
                        no
                        hidden fees, no minimum balances, and no reason to wait.</p>
                </div>
                {{--                <div class="lqd-column col-md-7 mb-50 bg-white p-4 hidden-lg hidden-md">--}}
                {{--                    <img src="{{asset('appV1/assets/img/misc/bg-modified.png')}}" alt=""/>--}}
                {{--                </div>--}}
            </div>
        </div>
    </section>

    <section class="vc_row pt-60">
        <div class="container">
            <div class="row">

                <div class="lqd-column col-md-4 col-sm-6">
                    <div
                        class="iconbox iconbox-icon-shadow iconbox-circle iconbox-xl iconbox-heading-sm px-2 iconbox-icon-animating"
                        id="ld_icon_box_5c496db22efb1" data-animate-icon="true"
                        data-plugin-options="{&quot;resetOnHover&quot;:true,&quot;color&quot;:&quot;rgb(41, 54, 92)&quot;,&quot;hoverColor&quot;:&quot;rgb(255, 255, 255)&quot;}">
                        <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container bg-white">
<span class="iconbox-icon-hover-bg bg-gradient-primary-br"></span>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"><style>#ld_icon_box_5c496db22efb1:hover .iconbox-icon-container defs stop:first-child {
            stop-color: rgb(255, 255, 255);
        }

        #ld_icon_box_5c496db22efb1:hover .iconbox-icon-container defs stop:last-child {
            stop-color: rgb(255, 255, 255);
        }</style><defs xmlns="http://www.w3.org/2000/svg"><linearGradient gradientUnits="userSpaceOnUse" id="grad857821"
                                                                          x1="0%" y1="0%" x2="0%" y2="100%"><stop
                offset="0%" stop-color="rgb(41, 54, 92)"></stop><stop offset="100%" stop-color="rgb(41, 54, 92)"></stop></linearGradient></defs> <path
        fill="none" stroke="url(#grad857821)" stroke-width="2" stroke-miterlimit="10" d="M32,33L32,51"
        style="stroke-dasharray: 18, 20; stroke-dashoffset: 0;"></path> <path fill="none" stroke="url(#grad857821)"
                                                                              stroke-width="2" stroke-miterlimit="10"
                                                                              d="M41,42L23,42"
                                                                              style="stroke-dasharray: 18, 20; stroke-dashoffset: 0;"></path> <path
        fill="none" stroke="url(#grad857821)" stroke-width="2" stroke-miterlimit="10"
        d="M44,18L54,18L54,63L10,63L10,18L20,18Z" style="stroke-dasharray: 178, 180; stroke-dashoffset: 0;"></path> <path
        fill="none" stroke="url(#grad857821)" stroke-width="2" stroke-miterlimit="10"
        d="M22,24V11c0-5.523,4.477-10,10-10s10,4.477,10,10v13 "
        style="stroke-dasharray: 58, 60; stroke-dashoffset: 0;"></path> </svg>
</span>
                        </div>
                        <div class="contents">
                            <h3 class="font-weight-semibold">Early</h3>
                            <p class="font-size-16 lh-165 text-fade-dark-04">Get access to the best new tokens before
                                they list on other exchanges. </p>
                        </div>
                    </div>
                </div>
                <div class="lqd-column col-md-4 col-sm-6">
                    <div
                        class="iconbox iconbox-icon-shadow iconbox-circle iconbox-xl iconbox-heading-sm px-2 iconbox-icon-animating"
                        id="ld_icon_box_5c496db22ef2" data-animate-icon="true"
                        data-plugin-options="{&quot;resetOnHover&quot;:true,&quot;color&quot;:&quot;rgb(41, 54, 92)&quot;,&quot;hoverColor&quot;:&quot;rgb(255, 255, 255)&quot;}">
                        <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container bg-white">
<span class="iconbox-icon-hover-bg bg-gradient-primary-br"></span>
<img src="{{asset('appV1/assets/img/security-svgrepo-com.svg')}}"/>
</span>
                        </div>
                        <div class="contents">
                            <h3 class="font-weight-semibold">Secure</h3>
                            <p class="font-size-16 lh-165 text-fade-dark-04">Your funds are secure. We only work with
                                reputable custodians and the vast majority of funds are stored offline. </p>
                        </div>
                    </div>
                </div>
                <div class="lqd-column col-md-4 col-sm-6">
                    <div
                        class="iconbox iconbox-icon-shadow iconbox-circle iconbox-xl iconbox-heading-sm px-2 iconbox-icon-animating"
                        id="ld_icon_box_5c496db22ef3" data-animate-icon="true"
                        data-plugin-options="{&quot;resetOnHover&quot;:true,&quot;color&quot;:&quot;rgb(41, 54, 92)&quot;,&quot;hoverColor&quot;:&quot;rgb(255, 255, 255)&quot;}">
                        <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container bg-white">
<span class="iconbox-icon-hover-bg bg-gradient-primary-br"></span>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"><style>#ld_icon_box_5c496db22ef3:hover .iconbox-icon-container defs stop:first-child {
            stop-color: rgb(255, 255, 255);
        }

        #ld_icon_box_5c496db22ef3:hover .iconbox-icon-container defs stop:last-child {
            stop-color: rgb(255, 255, 255);
        }</style><defs xmlns="http://www.w3.org/2000/svg"><linearGradient gradientUnits="userSpaceOnUse" id="grad420026"
                                                                          x1="0%" y1="0%" x2="0%" y2="100%"><stop
                offset="0%" stop-color="rgb(41, 54, 92)"></stop><stop offset="100%" stop-color="rgb(41, 54, 92)"></stop></linearGradient></defs> <path
        fill="none" stroke="url(#grad420026)" stroke-width="2" stroke-miterlimit="10" d="M36,34L41,39"
        style="stroke-dasharray: 8, 10; stroke-dashoffset: 0;"></path> <path
        transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 120.5036 47.0858)" fill="none" stroke="url(#grad420026)"
        stroke-width="2" stroke-miterlimit="10" width="8.485" height="26.87"
        d="M46.257 35.065 L54.742 35.065 L54.742 61.935 L46.257 61.935 Z"
        style="stroke-dasharray: 71, 73; stroke-dashoffset: 0;"></path> <path fill="none" stroke="url(#grad420026)"
                                                                              stroke-width="2" stroke-miterlimit="10"
                                                                              d="M12,16L18,10L8,4L6,6Z"
                                                                              style="stroke-dasharray: 35, 37; stroke-dashoffset: 0;"></path> <path
        fill="none" stroke="url(#grad420026)" stroke-width="2" stroke-miterlimit="10" d="M28,26L15,13"
        style="stroke-dasharray: 19, 21; stroke-dashoffset: 0;"></path> <path fill="none" stroke="url(#grad420026)"
                                                                              stroke-width="2" stroke-miterlimit="10"
                                                                              d="M58,12.5l-8,3.75l-4-4.125l3.5-8.062l0,0 C39.5,4.062,37,9,37,14v4L3.5,52l-1.75,6l2.125,2l6.062-1.5L44,25h4C53,25,58,22.5,58,12.5L58,12.5z"
                                                                              style="stroke-dasharray: 179, 181; stroke-dashoffset: 0;"></path> </svg>
</span>
                        </div>
                        <div class="contents">
                            <h3 class="font-weight-semibold">Compliant</h3>
                            <p class="font-size-16 lh-165 text-fade-dark-04">We aim to maintain the highest possible
                                compliance with anti-money laundering laws in the U.S. and elsewhere. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .bg-mini {
            background-image: url({{asset('appV1/assets/img/misc/fi-icons.png')}});
            background-repeat: no-repeat;
            background-position: left bottom;
        }
    </style>
    <section class="vc_row pt-100"
             style="background-image: linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);color: #fff !important;">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="lqd-column col-lg-6 ca-initvalues-applied lqd-animations-done bg-no-repeat bg-mini"
                     data-custom-animations="true"
                     data-ca-options="{&quot;triggerHandler&quot;:&quot;inview&quot;,&quot;animationTarget&quot;:&quot;all-childs&quot;,&quot;duration&quot;:&quot;1200&quot;,&quot;delay&quot;:&quot;150&quot;,&quot;easing&quot;:&quot;easeOutQuint&quot;,&quot;direction&quot;:&quot;forward&quot;,&quot;initValues&quot;:{&quot;translateY&quot;:52,&quot;opacity&quot;:0},&quot;animations&quot;:{&quot;translateY&quot;:0,&quot;opacity&quot;:1}}">
                    <header class="fancy-title mb-40">
                        <h6 class="font-size-13 text-uppercase ltr-sp-05">Borrow Money</h6>
                        <h2 class="mt-4 split-text-applied" data-split-text="true"
                            data-split-options="{&quot;type&quot;:&quot;lines&quot;}" style="">
                            <div class="lqd-lines split-unit lqd-unit-animation-done"
                                 style="display: block; text-align: start; position: relative;"><span
                                    data-text="Complete design " class="split-inner"><span class="split-txt text-white">Borrow money at rates as low </span></span>
                            </div>
                            <div class="lqd-lines split-unit lqd-unit-animation-done"
                                 style="display: block; text-align: start; position: relative;"><span
                                    data-text="toolkit included" class="split-inner"><span class="split-txt"><span
                                            class="text-primary">as 4.5% APR</span></span></span></div>
                        </h2>
                    </header>
                    <div
                        class="accordion accordion-square accordion-title-bordered accordion-title-circle accordion-active-has-shadow accordion-active-has-fill accordion-sm accordion-active-bg-white"
                        id="accordion-1" role="tablist">
                        <div class="accordion-item panel active lqd-unit-animation-done"
                             style="transform: translateY(0px); opacity: 1;">
                            <div class="accordion-heading" role="tab" id="heading1-1">
                                <h4 class="accordion-title font-size-18 lh-2">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion-1" href="#collapse1"
                                       aria-expanded="true" aria-controls="collapse1">
                                        How does it work?
                                        <span class="accordion-expander">
    <i class="fa fa-angle-down"></i>
    <i class="fa fa-angle-up"></i>
    </span>
                                    </a>
                                </h4>
                            </div>

                            <div id="collapse1" class="accordion-collapse collapse in" role="tabpanel"
                                 aria-labelledby="heading1-1">
                                <div class="accordion-content">
                                    <p>You don’t have to sell your crypto to get cash. At {{config('app.name')}}, we let
                                        you borrow
                                        funds against your crypto assets so you can get a loan while continuing to
                                        hold.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item panel lqd-unit-animation-done"
                             style="transform: translateY(0px); opacity: 1;">
                            <div class="accordion-heading" role="tab" id="heading2">
                                <h4 class="accordion-title font-size-18 lh-2">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-1"
                                       href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        How Long before I can get the Cash?
                                        <span class="accordion-expander">
    <i class="fa fa-angle-down"></i>
    <i class="fa fa-angle-up"></i>
    </span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="accordion-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading2">
                                <div class="accordion-content">
                                    <p>Receive your funds the same business day</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item panel lqd-unit-animation-done"
                             style="transform: translateY(0px); opacity: 1;">
                            <div class="accordion-heading" role="tab" id="heading3">
                                <h4 class="accordion-title font-size-18 lh-2">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-1"
                                       href="#collapse3-5c58030f4609d" aria-expanded="false"
                                       aria-controls="collapse3-5c58030f4609d">
                                        How much can I get Loan?
                                        <span class="accordion-expander">
    <i class="fa fa-angle-down"></i>
    <i class="fa fa-angle-up"></i>
    </span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse3-5c58030f4609d" class="accordion-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading3">
                                <div class="accordion-content">
                                    <p>With a {{config('app.name')}} loan, you can borrow up to 50% of the value of your
                                        crypto</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lqd-column col-lg-4 col-lg-offset-2">
                    <div class="liquid-img-group-container stretch-to-right">
                        <div class="liquid-img-group-inner">
                            <div
                                class="liquid-img-group-single liquid-img-group-browser block-revealer is-in-view element-uncovered revealing-ended"
                                data-shadow-style="4" data-inview="true" data-animate-shadow="true" data-reveal="true"
                                data-reveal-options="{&quot;direction&quot;:&quot;lr&quot;}">
                                <div class="block-revealer__content">
                                    <span
                                        class="liquid-img-group-url"><span>https://</span>{{config('app.url')}}/</span>
                                    <div class="liquid-img-group-img-container">

                                        <div class="liquid-img-container-inner">
                                            <figure data-responsive-bg="true"
                                                    style="background-image: url({{asset('appV1/assets/demo/misc/img-homepage-hero.7257f231.png')}};); opacity: 1;"
                                                    class="loaded">
                                                <img
                                                    src="{{asset('appV1/assets/img/misc/Borrowing_-the-Good--the-Bad-and-the-Ugly-6.png')}}"
                                                    alt="Ave">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-revealer__element"
                                     style="transform: scaleX(0); transform-origin: 100% 50%; background: rgb(240, 240, 240); opacity: 1;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="supportedcoins">
        <section class="vc_row pt-65 pb-115 bg-black">
            <div class="container">
                <div class="row">
                    <div class="lqd-column col-md-8 col-md-offset-2">
                        <header class="fancy-title text-center px-md-7">
                            <h2 class="title h1 mb-4 text-white">15+ Crypto Support</h2>
                            <p class="font-size-20 lh-16">wallet and investment opportunities to grow your portfolio. </p>
                        </header>
                    </div>

                    <div class="lqd-column col-md-12">
                        <div class="carousel-container carousel-nav-left carousel-nav-md carousel-dots-style1">
                            <div class="carousel-items row"
                                 data-lqd-flickity='{"cellAlign":"left","prevNextButtons":false,"buttonsAppendTo":"self","pageDots":false,"groupCells":false,"wrapAround":true,"autoPlay":3000,"pauseAutoPlayOnHover":false}'>

                            <div id="sponge" v-for="(list, index) in coinlist" class="lqd-column carousel-item col-md-2 col-sm-3 col-xs-4">

                                <figure class="text-center opacity-08">
                                    <img :src="image_base_url+(list.coin_info ===undefined ?  list.thumbnail : list.coin_info.image_url)" class="mt-10 w-60" alt="">
                                    <h6>@{{ list.caption == undefined ? list.coin_name : list.slug}}</h6>
                                </figure>
                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section id="about" class="vc_row bg-no-repeat pb-150 pt-10"
             style="background-image: url({{asset('appV1/assets/demo/bg/bg-76.svg')}}); background-position: -90% 80%;">
        <div class="container">
            <div class="lqd-space visible-lg visible-md" style="height: 40px;"></div>
            <div class="row d-flex flex-wrap align-items-center">
                <div class="lqd-column col-md-6">
                    <div class="liquid-img-group-container lqd-parallax-images-8" data-custom-animations="true"
                         data-ca-options='{"triggerHandler":"inview", "animationTarget":".liquid-img-group-single", "duration":"1600", "delay":"160", "easing":"easeOutQuint", "direction":"backward", "initValues":{"translateX":-85, "opacity":0}, "animations":{"translateX":0, "opacity":1}}'>
                        <div class="liquid-img-group-inner">
                            <div class="liquid-img-group-single" data-shadow-style="4" data-roundness="8"
                                 data-inview="true" data-animate-shadow="true">
                                <div class="liquid-img-group-img-container">
                                    <div class="liquid-img-container-inner" data-parallax="true"
                                         data-parallax-from='{"translateY":78}' data-parallax-to='{"translateY":-78}'
                                         data-parallax-options='{"overflowHidden":false, "easing":"linear"}'>
                                        <figure class="w-90">
                                            <img src="{{asset('appV1/assets/img/misc/fi-iphone.jpg')}}"
                                                 alt="Working with Ave"/>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="liquid-img-group-single" data-shadow-style="4" data-roundness="8"
                                 data-inview="true" data-animate-shadow="true">
                                <div class="liquid-img-group-img-container">
                                    {{--                                    <div class="liquid-img-group-content content-floated-mid">--}}
                                    {{--                                        <a href="https://www.youtube.com/watch?v=vKSA_idPZkc"--}}
                                    {{--                                           class="btn btn-naked fresco btn-icon-block btn-icon-top btn-icon-xlg btn-icon-circle btn-icon-solid">--}}
                                    {{--<span>--}}
                                    {{--<span class="btn-icon"><i class="fa fa-play"></i></span>--}}
                                    {{--</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </div>--}}
                                    <div class="liquid-img-container-inner" data-parallax="true"
                                         data-parallax-from='{"translateY":107}' data-parallax-to='{"translateY":-134}'
                                         data-parallax-options='{"overflowHidden":false,"easing":"linear"}'>
                                        <figure>
                                            <img src="{{asset('appV1/assets/img/misc/fi-iphone.jpg')}}"
                                                 alt="{{config('app.name')}}"/>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-custom-animations="true"
                     data-ca-options='{"triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1600", "delay":"160", "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY":30, "opacity":0}, "animations":{"translateY":0, "opacity":1}}'
                     class="lqd-column col-md-5 col-md-offset-1 mt-5">
                    <header class="fancy-title mb-50">
                        <h6 class="text-uppercase">Secure</h6>
                        <h2 class="lh-1 mb-0" data-fittext="true"
                            data-fittext-options='{"compressor":0.65, "maxFontSize":"62", "minFontSize":"38"}'><strong>Enjoy
                                safest</strong>
                            storage</h2>
                        <h2 class="lh-1 mb-0" data-fittext="true"
                            data-fittext-options='{"compressor":0.65, "maxFontSize":"62", "minFontSize":"38"}'><strong>for
                                your</strong>
                            Cryptocurrency</h2>
                    </header>
                    <p class="font-size-30 lh-105"><i>Giving back is fundamental to how we works. </i></p>
                    <p class="font-size-18 lh-15 mb-55">Up to
                        80% of our revenue is paid back to the community as
                        weekly rewards on crypto.
                        <br/>
                        And, you get up to 25% more when you choose to earn
                        in token. Everyone wins.</p>
                    <a href="{{route('products')}}"
                       class="btn btn-solid text-uppercase btn-md btn-bordered border-thin btn-gradient font-weight-bold px-2">
<span>
<span class="btn-gradient-bg"></span>
<span class="btn-txt">More about us</span>
<span class="btn-gradient-bg btn-gradient-bg-hover"></span>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
     class="btn-gradient-border" width="100%" height="100%">
<defs>
<linearGradient id="svg-border-2" x1="0%" y1="0%" x2="100%" y2="0%">
<stop offset="0%"></stop>
<stop offset="100%"></stop>
</linearGradient>
</defs>
<rect x="0.5" y="0.5" rx="29.5" ry="29.5" width="100%" height="100%" stroke="url(#svg-border-2)"></rect>
</svg>
</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="vc_row pt-90 pb-90 bg-no-repeat"
             style="background-image: url({{asset('appV1/assets/demo/bg/bg-77.svg')}}); background-position: 500% 0%;">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="lqd-column col-md-5 mb-30" data-custom-animations="true"
                     data-ca-options='{"triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1600", "delay":"160", "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY":30, "opacity":0}, "animations":{"translateY":0, "opacity":1}}'>
                    <header class="fancy-title pr-md-4">
                        <h6 class="text-uppercase">Services</h6>
                        <h2><strong>Best solutions</strong> for you</h2>
                    </header>
                    <p class="font-size-18 lh-15 mb-55">We’ve got a rock-solid foundation. {{config('app.name')}} is
                        backed by
                        industry-leading investors, including Valar Ventures, Morgan Creek Capital Management, Coinbase
                        Ventures, Galaxy Digital, Susquehanna Government Products, Winklevoss Capital, and more.

                    </p>
                    <a href="{{route('products')}}"
                       class="btn btn-solid text-uppercase btn-md btn-bordered border-thin btn-gradient font-weight-bold px-2"
                    >
<span>
<span class="btn-gradient-bg"></span>
<span class="btn-txt">Learn More</span>
<span class="btn-gradient-bg btn-gradient-bg-hover"></span>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
     class="btn-gradient-border" width="100%" height="100%">
<defs>
<linearGradient id="svg-border-3" x1="0%" y1="0%" x2="100%" y2="0%">
<stop offset="0%"></stop>
<stop offset="100%"></stop>
</linearGradient>
</defs>
<rect x="0.5" y="0.5" rx="29.5" ry="29.5" width="100%" height="100%" stroke="url(#svg-border-3)"></rect>
</svg>
</span>
                    </a>
                </div>
                <div class="lqd-column col-md-3 col-md-offset-1">
                    <div class="lqd-column-inner" data-parallax="true" data-parallax-from='{"translateY":-30}'
                         data-parallax-to='{"translateY":120}'
                         data-parallax-options='{"duration":"2000", "easing":"linear", "reverse":true, "triggerHook":"onEnter", "overflowHidden": false}'>
                        <div
                            class="iconbox text-left iconbox-round iconbox-lg iconbox-filled iconbox-filled iconbox-filled-hover iconbox-icon-image iconbox-shadow pt-50 pb-40">
                            <span class="iconbox-icon-container mb-35">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                     width="60" height="60"
                                     viewBox="0 0 172 172"
                                     style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none"
                                                               stroke-width="1" stroke-linecap="butt"
                                                               stroke-linejoin="miter" stroke-miterlimit="10"
                                                               stroke-dasharray="" stroke-dashoffset="0"
                                                               font-family="none" font-weight="none" font-size="none"
                                                               text-anchor="none" style="mix-blend-mode: normal"><path
                                            d="M0,172v-172h172v172z" fill="none"></path><g fill="#0466a1"><path
                                                d="M71.66667,11.46667c-11.08253,0 -20.06667,8.98413 -20.06667,20.06667c0,5.6244 2.33141,10.69267 6.05808,14.33333h28.02838c3.72093,-3.64067 6.04688,-8.70893 6.04688,-14.33333c0,-11.08253 -8.98413,-20.06667 -20.06667,-20.06667zM143.33333,45.86667l-26.56146,8.85755c-5.6936,-2.72278 -11.91296,-4.86904 -18.54376,-6.34922c-1.29573,2.0296 -2.75809,3.95708 -4.52396,5.68854l-3.34817,3.26979h-37.37865l-3.34818,-3.26979c-1.204,-1.18107 -2.20527,-2.48862 -3.19141,-3.80729c-14.13555,5.19912 -24.27912,15.14022 -27.79323,30.20078c-0.47146,-0.12463 -0.95688,-0.1886 -1.44453,-0.19036c-3.16643,0 -5.73333,2.5669 -5.73333,5.73333c0,3.16643 2.5669,5.73333 5.73333,5.73333c0.01866,0.00009 0.03733,0.00009 0.05599,0c-0.00339,0.2642 -0.05599,0.49482 -0.05599,0.76146c0,8.58314 2.20138,17.13803 6.39401,24.91537l5.27422,31.62292c0.5504,3.33107 3.42047,5.76692 6.78594,5.76692h15.88984c3.3712,0 6.24673,-2.43586 6.79713,-5.76692l0.59349,-3.53854c7.22086,2.25232 15.26817,3.57214 24.1987,3.57214c6.5022,0 12.71654,-0.58854 18.58854,-1.65729l3.12421,4.79271c1.06067,1.62253 2.86604,2.59792 4.80391,2.59792h16.48333c3.61773,0 6.33229,-3.30419 5.62136,-6.85312l-2.25078,-11.20912c6.61897,-4.42661 11.79415,-9.94995 15.16198,-16.38255h4.93828c3.1648,0 5.92236,-2.1509 6.69636,-5.21823l4.03125,-16.14739c0.87147,-3.4916 -1.08449,-7.07288 -4.50156,-8.20808l-8.82396,-2.94505c-2.09041,-7.12148 -5.74154,-13.38073 -10.58203,-18.76771c3.6562,-5.63017 6.90911,-13.27357 6.90911,-23.20208zM123.26667,80.26667c4.7472,0 8.6,3.8528 8.6,8.6c0,4.7472 -3.8528,8.6 -8.6,8.6c-4.7472,0 -8.6,-3.8528 -8.6,-8.6c0,-4.7472 3.8528,-8.6 8.6,-8.6z"></path></g></g>
                                </svg>
                            </span>
                            <div class="contents">
                                <h3>Swap</h3>
                                <p class="font-size-16 lh-165">CONVERT your favorite crypto from one to another and vice
                                    versa.</p>
                            </div>
                        </div>
                        <div
                            class="iconbox text-left iconbox-round iconbox-lg iconbox-filled iconbox-filled iconbox-filled-hover iconbox-icon-image iconbox-shadow pt-50 pb-40">
                            <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container mb-35">
<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
     width="60" height="60"
     viewBox="0 0 172 172"
     style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                               stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                               font-family="none" font-weight="none" font-size="none" text-anchor="none"
                               style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g
            fill="#0466a1"><path
                d="M86,5.73333c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v11.46667c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v1.5901c-1.69168,-0.98345 -3.63463,-1.5901 -5.73333,-1.5901c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v5.73333h-11.46667c-0.74458,0.00249 -1.48715,0.0775 -2.21719,0.22396c-0.06073,0.0122 -0.11877,0.03162 -0.17917,0.04479c-5.28422,1.12925 -9.06298,5.79439 -9.07031,11.19792v63.06667c0,6.26689 5.19977,11.46667 11.46667,11.46667h11.46667c0,19.00027 15.39973,34.4 34.4,34.4h21.13047c12.16613,0 23.84036,-4.8375 32.44036,-13.4375l18.09583,-18.09583l25.7888,-11.54505c-0.04587,-10.95067 -8.61174,-14.25495 -17.1888,-14.25495c-7.39027,0 -14.0352,1.1524 -28.66667,8.6l-5.73333,2.86667h-68.8h-22.93333v-51.6c6.33287,0 11.46667,-5.1338 11.46667,-11.46667h103.2c0,6.33287 5.1338,11.46667 11.46667,11.46667v28.66667h11.46667v-40.13333c-0.00249,-0.74458 -0.07749,-1.48715 -0.22396,-2.21719c-0.0122,-0.06073 -0.03162,-0.11877 -0.04479,-0.17917c-1.12925,-5.28422 -5.79439,-9.06298 -11.19792,-9.07031h-28.66667v-22.93333c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v-5.73333c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667zM166.25547,123.18828c0,0.02867 0.0112,0.05545 0.0112,0.07839v-0.07839zM86,68.8c-12.66493,0 -22.93333,11.55267 -22.93333,25.8c0,5.3664 1.5927,10.22827 4.10964,14.33333h37.64739c2.51693,-4.10507 4.10964,-8.96693 4.10964,-14.33333c0,-14.24733 -10.2684,-25.8 -22.93333,-25.8zM40.13333,86c-3.16643,0 -5.73333,2.5669 -5.73333,5.73333c0,3.16643 2.5669,5.73333 5.73333,5.73333c3.16643,0 5.73333,-2.5669 5.73333,-5.73333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333zM131.86667,86c-3.16643,0 -5.73333,2.5669 -5.73333,5.73333c0,3.16643 2.5669,5.73333 5.73333,5.73333c3.16643,0 5.73333,-2.5669 5.73333,-5.73333c0,-3.16643 -2.5669,-5.73333 -5.73333,-5.73333z"></path></g></g>
</svg>
</span>
                            </div>
                            <div class="contents">
                                <h3>Token Sales</h3>
                                <p class="font-size-16 lh-165">GET access to the next big token before they get listed
                                    on exchanges.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lqd-column col-md-3">
                    <div class="lqd-column-inner" data-parallax="true" data-parallax-from='{"translateY":50}'
                         data-parallax-to='{"translateY":-130}'
                         data-parallax-options='{"duration":"2000", "easing":"linear", "reverse":true, "triggerHook":"onEnter", "overflowHidden": false}'>
                        <div
                            class="iconbox text-left iconbox-round iconbox-lg iconbox-filled iconbox-filled iconbox-filled-hover iconbox-icon-image iconbox-shadow pt-50 pb-40">
                            <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container ">
<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
     width="60" height="60"
     viewBox="0 0 172 172"
     style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                       stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                       stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                       font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#0466a1">
                                            <path
                                                d="M68.8,17.2c-6.26689,0 -11.46667,5.19977 -11.46667,11.46667v17.2h11.46667v-17.2h28.66667v17.2h17.2v-17.2h11.46667v17.2h11.46667v-17.2c0,-6.26689 -5.19977,-11.46667 -11.46667,-11.46667zM40.13333,34.4c-9.43116,0 -17.2,7.76884 -17.2,17.2v80.26667c0,9.50013 7.69987,17.2 17.2,17.2h97.46667c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-68.8c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667h-45.86667h-51.6c-3.23951,0 -5.73333,-2.49383 -5.73333,-5.73333c0,-3.23951 2.49383,-5.73333 5.73333,-5.73333h5.73333v-11.46667zM126.13333,91.73333c6.33533,0 11.46667,5.13133 11.46667,11.46667c0,6.33533 -5.13133,11.46667 -11.46667,11.46667c-6.33533,0 -11.46667,-5.13133 -11.46667,-11.46667c0,-6.33533 5.13133,-11.46667 11.46667,-11.46667z"></path>
                                        </g>
                                    </g>
                                </svg>
</span>
                            </div>
                            <div class="contents">
                                <h3>Wallets</h3>
                                <p class="font-size-16 lh-165">Take advantage of our secure, fast and cheap method of
                                    storing your crypto.</p>
                            </div>
                        </div>
                        <div
                            class="iconbox text-left iconbox-round iconbox-lg iconbox-filled iconbox-filled iconbox-filled-hover iconbox-icon-image iconbox-shadow pt-50 pb-40">
                            <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container mb-35">
<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
     width="60" height="60"
     viewBox="0 0 172 172"
     style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                               stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                               font-family="none" font-weight="none" font-size="none" text-anchor="none"
                               style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g
            fill="#2196f3"><path
                d="M123.26308,21.71142c1.9135,-0.4085 3.66575,-0.774 5.418,-1.16458c0.13975,-0.03225 0.344,-0.24725 0.34758,-0.37625c0.01792,-1.93142 0.01433,-3.86283 0.01433,-5.83725c-1.83467,0.41925 -3.56183,0.79908 -5.27825,1.22908c-0.19708,0.05017 -0.47658,0.34042 -0.47658,0.52317c-0.03583,1.82392 -0.02508,3.655 -0.02508,5.62583zM129.04658,157.66667c0,-1.97083 0.01075,-3.88075 -0.02508,-5.79067c-0.00358,-0.16483 -0.32608,-0.41567 -0.5375,-0.46583c-1.10367,-0.26875 -2.2145,-0.49092 -3.32892,-0.72025c-0.60558,-0.12542 -1.21475,-0.24008 -1.892,-0.37267c0,1.935 -0.01075,3.73742 0.01433,5.53625c0.00358,0.18992 0.18992,0.51242 0.344,0.54825c1.77017,0.44075 3.55108,0.83492 5.42517,1.26492zM121.819,22.00525c0,-2.08192 0,-4.0205 0,-6.00925c-1.29717,0.26517 -2.54058,0.516 -3.784,0.77758c-1.978,0.41925 -1.978,0.42283 -1.978,2.49758c0,1.25417 0,2.50117 0,3.827c2.00667,-0.37983 3.87717,-0.73458 5.762,-1.09292zM116.057,148.90542c0,1.9565 -0.01075,3.73383 0.01433,5.50758c0.00358,0.16125 0.18992,0.43717 0.33325,0.46583c1.7845,0.39058 3.57617,0.74892 5.41442,1.12158c0,-2.02817 0,-3.99183 0,-6.00925c-1.89917,-0.35833 -3.77325,-0.7095 -5.762,-1.08575zM108.89392,24.30933c1.83825,-0.301 3.53317,-0.56617 5.22092,-0.87433c0.20425,-0.03583 0.52675,-0.29742 0.53033,-0.46583c0.03583,-1.79883 0.02508,-3.59767 0.02508,-5.49683c-1.89917,0.33683 -3.69442,0.65217 -5.48608,0.99258c-0.11825,0.0215 -0.27592,0.27592 -0.27592,0.42642c-0.01792,1.77375 -0.01433,3.5475 -0.01433,5.418zM107.47492,147.46492c-1.93858,-0.2795 -3.81983,-0.55183 -5.73333,-0.82775c0,1.94575 0,3.81983 0,5.6975c1.935,0.30458 3.81267,0.602 5.73333,0.903c0,-1.94933 0,-3.8055 0,-5.77275zM87.12158,27.01117c1.85975,-0.17917 3.66575,-0.34758 5.47533,-0.54467c0.13617,-0.01433 0.35475,-0.22933 0.35475,-0.35833c0.02508,-1.73075 0.01433,-3.46508 0.01433,-5.2675c-2.03175,0.22217 -3.94167,0.43 -5.84442,0.63783c0,1.87408 0,3.66575 0,5.53267zM85.64883,150.37458c0,-1.25417 0,-2.43308 0,-3.61558c0,-1.85258 0,-1.86333 -1.81675,-2.03892c-1.31508,-0.129 -2.63017,-0.21858 -3.99183,-0.32608c0,1.87408 0,3.64067 0,5.48967c1.92425,0.16483 3.81625,0.32608 5.80858,0.49092zM85.60225,21.61825c-1.98158,0.172 -3.87,0.33683 -5.75842,0.50167c0,1.85617 0,3.61917 0,5.47533c1.94217,-0.1505 3.83417,-0.29383 5.75842,-0.44075c0,-1.86692 0,-3.65858 0,-5.53625zM94.41725,151.33492c1.93142,0.25442 3.81625,0.50883 5.74767,0.76325c0,-1.93142 0,-3.77683 0,-5.676c-1.92783,-0.23292 -3.81267,-0.45867 -5.74767,-0.69158c0,1.90992 0,3.70517 0,5.60433zM100.16492,19.89467c-1.95292,0.26158 -3.85567,0.516 -5.72975,0.77042c0,1.90633 0,3.72308 0,5.60433c1.95292,-0.2365 3.83775,-0.46583 5.72975,-0.69517c0,-1.93142 0,-3.77683 0,-5.67958zM72.54458,22.56067c0,1.86692 0,3.64425 0,5.47175c1.97442,-0.11467 3.87358,-0.22575 5.76558,-0.34042c0,-1.85975 0,-3.62633 0,-5.45742c-1.935,0.11108 -3.81267,0.215 -5.76558,0.32608zM78.32092,144.29725c-1.98875,-0.10392 -3.87717,-0.20425 -5.85517,-0.30458c0,1.73792 -0.01792,3.36475 0.02508,4.988c0.00717,0.172 0.35117,0.45867 0.56258,0.48375c0.84925,0.10033 1.70567,0.12183 2.56567,0.16483c0.89942,0.04658 1.79525,0.08958 2.70183,0.13258c0,-1.85617 0,-3.61917 0,-5.46458zM57.92458,149.04517c1.93858,0 3.83417,0 5.76558,0c0,-1.74867 0,-3.50808 0,-5.3535c-1.92783,0 -3.82342,0 -5.76558,0c0,1.73075 0,3.46508 0,5.3535zM65.23458,149.22792c1.978,0 3.87,0 5.75842,0c0,-1.75942 0,-3.50092 0,-5.36067c-1.935,0 -3.83058,0 -5.75842,0c0,1.72 0,3.45792 0,5.36067zM63.69017,28.30117c0,-1.86333 0,-3.60483 0,-5.33917c-1.94217,0 -3.83775,0 -5.74408,0c0,1.84542 0,3.59767 0,5.33917c1.94933,0 3.82342,0 5.74408,0zM50.58592,28.29758c1.935,0 3.83417,0 5.75842,0c0,-1.77375 0,-3.526 0,-5.3535c-1.95292,0 -3.85208,0 -5.75842,0c0,1.79883 0,3.54033 0,5.3535zM129.0215,28.68817c-1.97083,0.36908 -3.85567,0.72742 -5.69033,1.075c0,1.8275 0,3.526 0,5.32842c1.94575,-0.32967 3.81267,-0.645 5.69033,-0.96392c0,-1.8275 0,-3.56183 0,-5.4395zM123.26308,136.90125c0,1.0535 -0.01075,1.94933 0.00358,2.84875c0.01075,0.80983 -0.22933,1.83467 0.16483,2.36142c0.35475,0.473 1.41542,0.41567 2.1715,0.56258c1.12158,0.21858 2.24675,0.41567 3.38625,0.61992c0,-1.88842 0,-3.64425 0,-5.42875c-1.89917,-0.3225 -3.74458,-0.63425 -5.72617,-0.96392zM136.15592,139.19458c-1.89558,-0.35475 -3.73742,-0.69875 -5.62942,-1.0535c0,1.86333 0,3.6335 0,5.45742c1.87408,0.39058 3.73025,0.774 5.62942,1.16458c0,-1.87408 0,-3.6765 0,-5.5685zM130.54083,33.8625c1.91708,-0.3655 3.77683,-0.72025 5.60792,-1.06783c0,-1.92425 0,-3.72308 0,-5.5685c-1.89917,0.39417 -3.75892,0.78475 -5.60792,1.17175c0,1.849 0,3.61558 0,5.46458zM136.14517,20.24225c-1.7845,0.4085 -3.54033,0.80267 -5.28183,1.2255c-0.14333,0.03225 -0.34758,0.2365 -0.34758,0.35833c-0.02508,1.70925 -0.01433,3.4185 -0.01433,5.18867c1.94575,-0.41567 3.78042,-0.80625 5.64733,-1.20758c-0.00358,-1.83467 -0.00358,-3.6335 -0.00358,-5.56492zM116.08925,36.19525c1.97083,-0.29742 3.84492,-0.5805 5.71183,-0.86358c0,-1.79525 0,-3.52242 0,-5.3105c-1.94217,0.3225 -3.81267,0.63425 -5.71183,0.946c0,1.74867 0,3.42925 0,5.22808zM121.79392,141.96808c0,-1.83467 0,-3.56542 0,-5.30692c-1.92067,-0.29025 -3.77683,-0.56617 -5.69033,-0.85283c0,1.77733 0,3.47942 0,5.22092c1.89917,0.31175 3.75533,0.61992 5.69033,0.93883zM121.81183,148.64383c0,-1.80242 0,-3.53675 0,-5.31408c-1.9135,-0.3225 -3.78042,-0.64142 -5.71183,-0.9675c0,1.78092 0,3.483 0,5.22092c1.90633,0.35117 3.77683,0.70233 5.71183,1.06067zM121.819,23.35975c-1.7845,0.32967 -3.52958,0.64142 -5.2675,0.989c-0.18275,0.03583 -0.473,0.26875 -0.47658,0.41567c-0.03225,1.59458 -0.0215,3.18917 -0.0215,4.88408c1.99592,-0.34042 3.87,-0.65933 5.76558,-0.98183c0,-1.80242 0,-3.54033 0,-5.30692zM92.91942,144.30083c0,-1.72358 0,-3.311 0,-4.94858c-1.96725,-0.172 -3.87717,-0.34042 -5.79783,-0.50883c0,1.70567 0,3.27158 0,4.88767c1.93142,0.18992 3.827,0.37983 5.79783,0.56975zM87.10008,137.59642c1.98158,0.16842 3.8915,0.32967 5.77275,0.49092c0.05375,-0.15408 0.086,-0.20783 0.086,-0.26158c0.00717,-0.95675 0.01075,-1.9135 0.01433,-2.87025c0.00358,-1.75583 0,-1.75583 -1.677,-1.9135c-0.16483,-0.01433 -0.32608,-0.05375 -0.4945,-0.0645c-1.2255,-0.086 -2.451,-0.172 -3.70517,-0.258c0.00358,1.68058 0.00358,3.22142 0.00358,4.87692zM28.71325,40.66725c0,1.66625 0,3.22858 0,4.86975c1.93858,0.1075 3.83417,0.20425 5.75125,0.31175c0,-1.66983 0,-3.23575 0,-4.859c-1.93858,-0.1075 -3.827,-0.215 -5.75125,-0.3225zM28.70967,137.48175c1.9565,-0.13617 3.84492,-0.27233 5.75842,-0.40492c0,-1.64475 0,-3.20708 0,-4.84467c-1.93858,0.12542 -3.83058,0.24367 -5.75842,0.36908c0,1.634 0,3.19992 0,4.8805zM28.67025,53.06558c0,1.40825 -0.01075,2.89175 0.01792,4.37525c0.00358,0.13258 0.2795,0.3655 0.43,0.36908c1.763,0.02508 3.51883,0.01433 5.332,0.01433c0,-1.46558 0,-3.04583 0,-4.75867c-1.93858,0 -3.81267,0 -5.77992,0zM28.71325,63.98758c1.94933,0 3.82342,0 5.74408,0c0,-1.548 0,-3.13542 0,-4.83033c-1.93858,0 -3.81625,0 -5.74408,0c0,1.51933 0,3.08525 0,4.83033zM34.47525,126.14408c-1.97442,0.11108 -3.86642,0.22217 -5.75842,0.32608c0,1.677 0,3.24292 0,4.87692c1.94575,-0.12183 3.83417,-0.2365 5.75842,-0.35475c0,-1.62683 0,-3.16767 0,-4.84825zM34.47525,71.3585c-1.97083,0 -3.83775,0 -5.75125,0c0,1.591 0,3.17483 0,4.82675c1.95292,0 3.84492,0 5.75125,0c0,-1.61608 0,-3.15333 0,-4.82675zM34.48242,95.85417c-1.97442,0 -3.86642,0 -5.75483,0c0,1.65908 0,3.24292 0,4.72642c1.95292,0 3.84492,0 5.75483,0c0,-1.64475 0,-3.1605 0,-4.72642zM28.70967,106.70092c1.94217,0 3.83417,0 5.75483,0c0,-1.68417 0,-3.24292 0,-4.75508c-1.94217,0 -3.83417,0 -5.75483,0c0,1.677 0,3.24292 0,4.75508zM63.71167,35.60758c-1.97442,0 -3.87358,0 -5.76558,0c0,1.63042 0,3.18558 0,4.69775c1.96367,0 3.85567,0 5.76558,0c0,-1.60892 0,-3.12467 0,-4.69775zM56.35867,35.59325c-1.95292,0 -3.8485,0 -5.77275,0c0,1.58742 0,3.12467 0,4.73358c1.93142,0 3.83058,0 5.77275,0c0,-1.548 0,-3.08883 0,-4.73358zM50.60025,70.33008c1.94217,0 3.83417,0 5.74767,0c0,-1.60175 0,-3.15333 0,-4.70492c-1.95292,0 -3.8485,0 -5.74767,0c0,1.59817 0,3.13542 0,4.70492zM50.5895,106.37125c1.98158,0 3.87717,0 5.77275,0c0,-1.61967 0,-3.1605 0,-4.7085c-1.93858,0 -3.83417,0 -5.77275,0c0,1.60892 0,3.14617 0,4.7085zM49.0415,77.59708c-1.96008,0 -3.85567,0 -5.77633,0c0,1.59458 0,3.13542 0,4.74075c1.94217,0 3.84133,0 5.77633,0c0,-1.57667 0,-3.12108 0,-4.74075zM50.61817,77.6365c0,1.60533 0,3.1605 0,4.70133c1.96008,0 3.85567,0 5.74408,0c0,-1.59817 0,-3.139 0,-4.70133c-1.94575,0 -3.84133,0 -5.74408,0zM35.98742,76.24258c1.93142,0 3.827,0 5.72617,0c0,-1.57308 0,-3.1175 0,-4.74075c-1.92783,0 -3.81983,0 -5.72617,0c0,1.57667 0,3.1175 0,4.74075zM49.03075,89.68008c-1.96367,0 -3.85925,0 -5.77633,0c0,1.60533 0,3.14617 0,4.72283c1.93142,0 3.83417,0 5.77633,0c0,-1.591 0,-3.13183 0,-4.72283zM56.38733,89.66575c-1.97442,0 -3.87,0 -5.76558,0c0,1.60892 0,3.16408 0,4.69775c1.96367,0 3.85567,0 5.76558,0c0,-1.58025 0,-3.096 0,-4.69775zM41.72792,95.77175c-1.97442,0 -3.85567,0 -5.73692,0c0,1.64117 0,3.17842 0,4.71208c1.93142,0 3.82342,0 5.73692,0c0,-1.61608 0,-3.15692 0,-4.71208zM41.70642,88.40442c0,-1.6125 0,-3.17125 0,-4.75867c-1.92783,0 -3.81267,0 -5.70108,0c0,1.61608 0,3.17483 0,4.75867c1.93858,0 3.8055,0 5.70108,0zM35.98742,106.5325c1.93142,0 3.81983,0 5.719,0c0,-1.65192 0,-3.18917 0,-4.69058c-1.935,0 -3.82342,0 -5.719,0c0,1.64833 0,3.18558 0,4.69058zM35.98742,136.99083c1.935,-0.08958 3.827,-0.17917 5.71542,-0.27233c0,-1.64475 0,-3.18558 0,-4.82317c-1.935,0.086 -3.827,0.17558 -5.71542,0.26158c0,1.66267 0,3.20708 0,4.83392zM49.04867,119.79083c-1.98158,0 -3.87717,0 -5.762,0c0,1.65908 0,3.21783 0,4.67983c1.96008,0 3.85567,0 5.762,0c0,-1.64475 0,-3.1605 0,-4.67983zM35.98383,45.99208c1.94575,0 3.83417,0 5.70108,0c0,-1.5265 0,-3.08883 0,-4.76942c-1.92783,0 -3.79117,0 -5.70108,0c0,1.49067 0,3.0315 0,4.76942zM43.26158,112.44142c1.98158,0 3.87358,0 5.76917,0c0,-1.64475 0,-3.17842 0,-4.69417c-1.94217,0 -3.83775,0 -5.76917,0c0,1.62325 0,3.15692 0,4.69417zM41.70642,113.91775c-1.93142,0 -3.81625,0 -5.71183,0c0,1.68775 0,3.25008 0,4.71925c1.93858,0 3.827,0 5.71183,0c0,-1.68417 0,-3.22142 0,-4.71925zM57.91742,136.40317c1.99592,0 3.88792,0 5.762,0c0,-1.59458 0,-3.12825 0,-4.71925c-1.94933,0 -3.84492,0 -5.762,0c0,1.58025 0,3.12108 0,4.71925zM50.60742,131.69108c0,1.65908 0,3.18917 0,4.70492c1.95292,0 3.8485,0 5.762,0c0,-1.60533 0,-3.14258 0,-4.70492c-1.92783,0 -3.82342,0 -5.762,0zM41.70642,124.72867c0,-1.72717 0,-3.26083 0,-4.71925c-1.93142,0 -3.81983,0 -5.719,0c0,1.68417 0,3.21783 0,4.71925c1.91708,0 3.784,0 5.719,0zM43.27592,53.53142c0,1.57308 0,3.10675 0,4.73c1.94933,0 3.84133,0 5.76558,0c0,-1.55517 0,-3.09242 0,-4.73c-1.92783,0 -3.827,0 -5.76558,0zM35.97667,52.02283c1.94933,0 3.81625,0 5.719,0c0,-1.51575 0,-3.07092 0,-4.74075c-1.93858,0 -3.82342,0 -5.719,0c0,1.548 0,3.06017 0,4.74075zM41.68492,70.20467c0,-1.60175 0,-3.15692 0,-4.78733c-1.935,0 -3.8055,0 -5.67242,0c0,1.6125 0,3.17125 0,4.78733c1.9135,0 3.7625,0 5.67242,0zM49.05583,95.70725c-1.97442,0 -3.87358,0 -5.79783,0c0,1.60533 0,3.14258 0,4.67625c1.95292,0 3.86283,0 5.79783,0c0,-1.60892 0,-3.12108 0,-4.67625zM43.2795,41.48425c0,1.53008 0,3.08883 0,4.74075c1.94933,0 3.83775,0 5.76558,0c0,-1.54083 0,-3.07808 0,-4.74075c-1.91708,0 -3.81267,0 -5.76558,0zM36.01608,107.84758c0,1.72 0,3.27875 0,4.76225c1.93858,0 3.8055,0 5.68675,0c0,-1.68058 0,-3.23575 0,-4.76225c-1.92067,0 -3.78758,0 -5.68675,0zM43.26158,136.51425c1.97442,0 3.87,0 5.76917,0c0,-1.66267 0,-3.19992 0,-4.67983c-1.94217,0 -3.83417,0 -5.76917,0c0,1.64475 0,3.182 0,4.67983zM49.05583,137.85083c-1.97083,0 -3.86642,0 -5.76917,0c0,1.68417 0,3.2465 0,4.7085c1.96367,0 3.85567,0 5.76917,0c0,-1.66625 0,-3.18558 0,-4.7085zM43.26158,130.50142c1.9565,0 3.87,0 5.762,0c0,-1.66625 0,-3.2035 0,-4.69417c-1.94933,0 -3.84133,0 -5.762,0c0,1.6555 0,3.19275 0,4.69417zM56.36583,59.60875c-1.96367,0 -3.85567,0 -5.76917,0c0,1.58025 0,3.11392 0,4.71925c1.93858,0 3.83417,0 5.76917,0c0,-1.548 0,-3.08883 0,-4.71925zM49.02358,64.28142c0,-1.6125 0,-3.14258 0,-4.74433c-1.94933,0 -3.84492,0 -5.73333,0c0,1.58383 0,3.14258 0,4.74433c1.94575,0 3.81625,0 5.73333,0zM50.60025,83.64217c0,1.6125 0,3.14258 0,4.69417c1.94575,0 3.83775,0 5.76558,0c0,-1.57667 0,-3.11033 0,-4.69417c-1.92783,0 -3.81983,0 -5.76558,0zM57.93533,137.69675c0,1.58742 0,3.1175 0,4.7085c1.95292,0 3.84492,0 5.74408,0c0,-1.59458 0,-3.13183 0,-4.7085c-1.92783,0 -3.80192,0 -5.74408,0zM57.91383,34.271c1.99592,0 3.89508,0 5.75842,0c0,-1.61608 0,-3.15333 0,-4.644c-1.96367,0 -3.86283,0 -5.75842,0c0,1.59458 0,3.11033 0,4.644zM49.02358,76.3035c0,-1.58025 0,-3.139 0,-4.71925c-1.94933,0 -3.84133,0 -5.75842,0c0,1.59458 0,3.13183 0,4.71925c1.93142,0 3.83058,0 5.75842,0zM50.60383,107.67917c0,1.62683 0,3.16408 0,4.69417c1.95292,0 3.85208,0 5.75125,0c0,-1.60175 0,-3.139 0,-4.69417c-1.92783,0 -3.80908,0 -5.75125,0z"></path><path
                d="M123.26308,21.71142c0,-1.97083 -0.01433,-3.79833 0.0215,-5.62583c0.00358,-0.18275 0.28308,-0.473 0.47658,-0.52317c1.71642,-0.43 3.44717,-0.80983 5.28183,-1.22908c0,1.97442 0.00717,3.90583 -0.01433,5.83367c0,0.13258 -0.20425,0.34758 -0.34758,0.37625c-1.74867,0.39417 -3.50092,0.75967 -5.418,1.16817zM129.04658,157.66667c-1.8705,-0.43 -3.65142,-0.82417 -5.42158,-1.26133c-0.15408,-0.03583 -0.34042,-0.35833 -0.344,-0.54825c-0.02867,-1.80242 -0.01433,-3.60125 -0.01433,-5.53625c0.68083,0.13258 1.28642,0.25083 1.892,0.37267c1.11083,0.22933 2.22525,0.4515 3.32892,0.72025c0.21142,0.05375 0.53392,0.301 0.5375,0.46583c0.03583,1.90633 0.0215,3.81625 0.0215,5.78708zM121.819,22.00525c-1.88483,0.35833 -3.75175,0.71308 -5.762,1.0965c0,-1.32583 0,-2.57283 0,-3.827c0,-2.07475 0,-2.07833 1.978,-2.49758c1.24342,-0.26517 2.49042,-0.51242 3.784,-0.77758c0,1.98875 0,3.92375 0,6.00567zM116.057,148.90542c1.99233,0.37625 3.86283,0.72742 5.762,1.08575c0,2.01742 0,3.9775 0,6.00925c-1.83825,-0.37267 -3.62992,-0.72742 -5.41442,-1.12158c-0.14333,-0.03225 -0.32967,-0.30458 -0.33325,-0.46583c-0.0215,-1.77375 -0.01433,-3.55108 -0.01433,-5.50758zM108.89392,24.30933c0,-1.87408 -0.00717,-3.64425 0.01075,-5.41442c0.00358,-0.1505 0.15767,-0.40133 0.27592,-0.42642c1.79167,-0.344 3.58692,-0.65575 5.48608,-0.99258c0,1.89917 0.01433,3.698 -0.02508,5.49683c-0.00358,0.16483 -0.32608,0.42642 -0.53033,0.46583c-1.68058,0.30458 -3.37908,0.56975 -5.21733,0.87075zM107.47492,147.46492c0,1.96725 0,3.82342 0,5.77275c-1.92067,-0.301 -3.79475,-0.59842 -5.73333,-0.903c0,-1.87408 0,-3.74817 0,-5.6975c1.9135,0.27592 3.79475,0.54825 5.73333,0.82775zM87.12158,27.01117c0,-1.8705 0,-3.65858 0,-5.53267c1.90633,-0.20783 3.81267,-0.41925 5.84442,-0.63783c0,1.80242 0.01075,3.53675 -0.01433,5.2675c-0.00358,0.12542 -0.22217,0.344 -0.35475,0.35833c-1.806,0.20067 -3.61558,0.36908 -5.47533,0.54467zM85.64883,150.37458c-1.98875,-0.16842 -3.88075,-0.32608 -5.81217,-0.49092c0,-1.85258 0,-3.61558 0,-5.48967c1.36167,0.1075 2.67675,0.20067 3.99183,0.32608c1.82033,0.17558 1.81675,0.18633 1.81675,2.03892c0.00358,1.1825 0.00358,2.36142 0.00358,3.61558zM85.60225,21.61825c0,1.87767 0,3.66933 0,5.53267c-1.92783,0.14692 -3.81625,0.29383 -5.75842,0.44075c0,-1.85258 0,-3.61917 0,-5.47533c1.88842,-0.16125 3.77683,-0.32608 5.75842,-0.49808zM94.41725,151.33492c0,-1.89917 0,-3.69442 0,-5.60433c1.93142,0.23292 3.81983,0.46225 5.74767,0.69158c0,1.89917 0,3.74458 0,5.676c-1.93142,-0.25442 -3.81983,-0.50883 -5.74767,-0.76325zM100.16492,19.89467c0,1.89917 0,3.74817 0,5.67958c-1.892,0.22933 -3.78042,0.45867 -5.72975,0.69517c0,-1.88125 0,-3.698 0,-5.60433c1.87408,-0.25083 3.77325,-0.50883 5.72975,-0.77042zM72.54458,22.56067c1.95292,-0.1075 3.83058,-0.215 5.76558,-0.3225c0,1.8275 0,3.59408 0,5.45742c-1.892,0.11108 -3.79117,0.22575 -5.76558,0.34042c0,-1.83108 0,-3.60842 0,-5.47533zM78.32092,144.29725c0,1.849 0,3.60842 0,5.46458c-0.90658,-0.043 -1.806,-0.086 -2.70183,-0.13258c-0.85642,-0.04658 -1.71283,-0.0645 -2.56567,-0.16483c-0.21142,-0.02508 -0.559,-0.30817 -0.56258,-0.48375c-0.043,-1.62325 -0.02508,-3.25008 -0.02508,-4.988c1.978,0.10033 3.87,0.19708 5.85517,0.30458zM57.92458,149.04517c0,-1.88842 0,-3.61917 0,-5.3535c1.94575,0 3.83775,0 5.76558,0c0,1.84542 0,3.60483 0,5.3535c-1.935,0 -3.827,0 -5.76558,0zM65.23458,149.22792c0,-1.90275 0,-3.64425 0,-5.36067c1.92425,0 3.81625,0 5.75842,0c0,1.85975 0,3.59408 0,5.36067c-1.88842,0 -3.78042,0 -5.75842,0zM63.69017,28.30117c-1.92067,0 -3.79833,0 -5.74408,0c0,-1.73792 0,-3.49375 0,-5.33917c1.90633,0 3.80192,0 5.74408,0c0,1.73792 0,3.47583 0,5.33917zM50.58592,28.29758c0,-1.80958 0,-3.55108 0,-5.3535c1.9135,0 3.80908,0 5.75842,0c0,1.82392 0,3.57975 0,5.3535c-1.92067,0 -3.81983,0 -5.75842,0zM129.0215,28.68817c0,1.87408 0,3.61558 0,5.4395c-1.87767,0.31892 -3.74458,0.63425 -5.69033,0.96392c0,-1.80242 0,-3.50092 0,-5.32842c1.83108,-0.34758 3.7195,-0.70233 5.69033,-1.075zM123.26308,136.90125c1.98158,0.33325 3.827,0.64142 5.72617,0.96392c0,1.78092 0,3.54033 0,5.42875c-1.1395,-0.20783 -2.26467,-0.40133 -3.38625,-0.61992c-0.75608,-0.14692 -1.81675,-0.086 -2.1715,-0.56258c-0.39417,-0.52317 -0.1505,-1.55158 -0.16483,-2.36142c-0.01433,-0.89942 -0.00358,-1.79883 -0.00358,-2.84875zM136.15592,139.19458c0,1.892 0,3.69083 0,5.57567c-1.89558,-0.39417 -3.75175,-0.77758 -5.62942,-1.16458c0,-1.8275 0,-3.59408 0,-5.45742c1.892,0.34758 3.73383,0.69158 5.62942,1.04633zM130.54083,33.8625c0,-1.85258 0,-3.61917 0,-5.46458c1.849,-0.387 3.70875,-0.77758 5.60792,-1.17175c0,1.849 0,3.64425 0,5.5685c-1.83108,0.35117 -3.69083,0.70592 -5.60792,1.06783zM136.14517,20.24225c0,1.93142 0,3.73025 0,5.56492c-1.86692,0.39775 -3.70158,0.79192 -5.64733,1.20758c0,-1.77017 -0.00717,-3.47583 0.01433,-5.18867c0.00358,-0.129 0.20425,-0.32608 0.34758,-0.36192c1.74508,-0.41925 3.49733,-0.81342 5.28542,-1.22192zM116.08925,36.19525c0,-1.80242 0,-3.47942 0,-5.22092c1.89558,-0.31533 3.76967,-0.6235 5.71183,-0.946c0,1.7845 0,3.51167 0,5.3105c-1.86692,0.27592 -3.741,0.559 -5.71183,0.85642zM121.79392,141.96808c-1.93142,-0.3225 -3.79117,-0.62708 -5.69033,-0.94242c0,-1.7415 0,-3.44717 0,-5.22092c1.9135,0.28667 3.76967,0.56617 5.69033,0.85283c0,1.74508 0,3.47942 0,5.3105zM121.81183,148.64383c-1.935,-0.36192 -3.80908,-0.70592 -5.71183,-1.06425c0,-1.73433 0,-3.44 0,-5.22092c1.92783,0.32608 3.79833,0.645 5.71183,0.9675c0,1.78092 0,3.51167 0,5.31767zM121.819,23.35975c0,1.76658 0,3.50092 0,5.30692c-1.89558,0.3225 -3.76967,0.64142 -5.762,0.98183c0,-1.69492 -0.01075,-3.29308 0.0215,-4.88408c0.00358,-0.14692 0.29025,-0.37983 0.47658,-0.41567c1.73792,-0.35117 3.483,-0.66292 5.26392,-0.989zM92.91942,144.30083c-1.97083,-0.1935 -3.86283,-0.37625 -5.79783,-0.56258c0,-1.61608 0,-3.18558 0,-4.88767c1.92067,0.16842 3.83417,0.33683 5.79783,0.50883c0,1.62683 0,3.21783 0,4.94142zM87.10008,137.59642c0,-1.6555 0,-3.19633 0,-4.8805c1.25417,0.086 2.47967,0.172 3.70517,0.258c0.16483,0.01075 0.32608,0.05017 0.4945,0.0645c1.677,0.15767 1.68058,0.15767 1.677,1.9135c0,0.95675 -0.00717,1.9135 -0.01433,2.87025c0,0.05375 -0.03225,0.10392 -0.086,0.26158c-1.88483,-0.15767 -3.79475,-0.31892 -5.77633,-0.48733zM28.71325,40.66725c1.92425,0.1075 3.81267,0.215 5.75125,0.3225c0,1.61967 0,3.18917 0,4.859c-1.92067,-0.10392 -3.81267,-0.20425 -5.75125,-0.31175c0,-1.64117 0,-3.2035 0,-4.86975zM28.70967,137.48175c0,-1.68058 0,-3.2465 0,-4.88408c1.93142,-0.12183 3.81983,-0.24367 5.75842,-0.36908c0,1.63758 0,3.19992 0,4.84467c-1.9135,0.13617 -3.80192,0.27233 -5.75842,0.4085zM28.67025,53.06558c1.97083,0 3.84133,0 5.77992,0c0,1.71283 0,3.29667 0,4.75867c-1.806,0 -3.569,0.01075 -5.332,-0.01433c-0.1505,-0.00358 -0.42642,-0.2365 -0.43,-0.36908c-0.02867,-1.4835 -0.01792,-2.967 -0.01792,-4.37525zM28.71325,63.98758c0,-1.74508 0,-3.311 0,-4.83033c1.92783,0 3.8055,0 5.74408,0c0,1.69133 0,3.28233 0,4.83033c-1.92067,0 -3.79833,0 -5.74408,0zM34.47525,126.14408c0,1.68058 0,3.21783 0,4.84825c-1.92425,0.11825 -3.81267,0.23292 -5.75842,0.35475c0,-1.634 0,-3.19992 0,-4.87692c1.892,-0.10392 3.78042,-0.21142 5.75842,-0.32608zM34.47525,71.3585c0,1.67342 0,3.21425 0,4.82675c-1.90633,0 -3.79833,0 -5.75125,0c0,-1.65192 0,-3.23575 0,-4.82675c1.9135,0 3.78042,0 5.75125,0zM34.48242,95.85417c0,1.56592 0,3.07808 0,4.72642c-1.90992,0 -3.79833,0 -5.75483,0c0,-1.48708 0,-3.07092 0,-4.72642c1.88842,0 3.78042,0 5.75483,0zM28.70967,106.70092c0,-1.51575 0,-3.07808 0,-4.75508c1.92067,0 3.81267,0 5.75483,0c0,1.51217 0,3.07092 0,4.75508c-1.92067,0 -3.81267,0 -5.75483,0zM63.71167,35.60758c0,1.57308 0,3.09242 0,4.69775c-1.90992,0 -3.80192,0 -5.76558,0c0,-1.51217 0,-3.06733 0,-4.69775c1.89558,0 3.79117,0 5.76558,0zM56.35867,35.59325c0,1.64833 0,3.18558 0,4.73358c-1.94217,0 -3.83417,0 -5.77275,0c0,-1.60892 0,-3.14258 0,-4.73358c1.92425,0 3.81983,0 5.77275,0zM50.60025,70.33008c0,-1.5695 0,-3.10675 0,-4.70492c1.89917,0 3.79117,0 5.74767,0c0,1.55158 0,3.10317 0,4.70492c-1.9135,0 -3.8055,0 -5.74767,0zM50.5895,106.37125c0,-1.56592 0,-3.10317 0,-4.7085c1.935,0 3.83058,0 5.77275,0c0,1.548 0,3.08883 0,4.7085c-1.89558,0 -3.78758,0 -5.77275,0zM49.0415,77.59708c0,1.61967 0,3.16408 0,4.74075c-1.93142,0 -3.83417,0 -5.77633,0c0,-1.60533 0,-3.14258 0,-4.74075c1.91708,0 3.81625,0 5.77633,0zM50.61817,77.6365c1.90275,0 3.79833,0 5.74408,0c0,1.56592 0,3.10317 0,4.70133c-1.88842,0 -3.78042,0 -5.74408,0c0,-1.54083 0,-3.096 0,-4.70133zM35.98742,76.24258c0,-1.62325 0,-3.16408 0,-4.74075c1.90633,0 3.79833,0 5.72617,0c0,1.62683 0,3.16767 0,4.74075c-1.89917,0 -3.79117,0 -5.72617,0zM49.03075,89.68008c0,1.591 0,3.13183 0,4.72283c-1.94217,0 -3.84133,0 -5.77633,0c0,-1.57667 0,-3.1175 0,-4.72283c1.91708,0 3.81625,0 5.77633,0zM56.38733,89.66575c0,1.60175 0,3.1175 0,4.69775c-1.90992,0 -3.80192,0 -5.76558,0c0,-1.53725 0,-3.09242 0,-4.69775c1.892,0 3.79117,0 5.76558,0zM41.72792,95.77175c0,1.55517 0,3.096 0,4.71208c-1.9135,0 -3.79833,0 -5.73692,0c0,-1.53367 0,-3.07092 0,-4.71208c1.87767,0 3.7625,0 5.73692,0zM41.70642,88.40442c-1.89917,0 -3.76967,0 -5.70108,0c0,-1.58383 0,-3.139 0,-4.75867c1.88842,0 3.77325,0 5.70108,0c0,1.58742 0,3.15333 0,4.75867zM35.98742,106.5325c0,-1.505 0,-3.04583 0,-4.69058c1.892,0 3.784,0 5.719,0c0,1.49783 0,3.03508 0,4.69058c-1.89917,0 -3.78758,0 -5.719,0zM35.98742,136.99083c0,-1.634 0,-3.17125 0,-4.83392c1.892,-0.086 3.78042,-0.172 5.71542,-0.26158c0,1.63758 0,3.17842 0,4.82317c-1.88842,0.09317 -3.77683,0.18275 -5.71542,0.27233zM49.04867,119.79083c0,1.51575 0,3.0315 0,4.67983c-1.90992,0 -3.80192,0 -5.762,0c0,-1.45842 0,-3.02075 0,-4.67983c1.88483,0 3.78042,0 5.762,0zM35.98383,45.99208c0,-1.73792 0,-3.27875 0,-4.76942c1.90992,0 3.77325,0 5.70108,0c0,1.68417 0,3.24292 0,4.76942c-1.86692,0 -3.75175,0 -5.70108,0zM43.26158,112.44142c0,-1.53725 0,-3.07092 0,-4.69417c1.93142,0 3.827,0 5.76917,0c0,1.51575 0,3.04583 0,4.69417c-1.89917,0 -3.78758,0 -5.76917,0zM41.70642,113.91775c0,1.49425 0,3.0315 0,4.71925c-1.88483,0 -3.76967,0 -5.71183,0c0,-1.46917 0,-3.02792 0,-4.71925c1.892,0 3.78042,0 5.71183,0zM57.91742,136.40317c0,-1.60175 0,-3.139 0,-4.71925c1.91708,0 3.81267,0 5.762,0c0,1.591 0,3.12467 0,4.71925c-1.87408,0 -3.7625,0 -5.762,0zM50.60742,131.69108c1.93858,0 3.83417,0 5.762,0c0,1.56233 0,3.096 0,4.70492c-1.9135,0 -3.80908,0 -5.762,0c0,-1.50858 0,-3.04225 0,-4.70492zM41.70642,124.72867c-1.93142,0 -3.8055,0 -5.719,0c0,-1.49783 0,-3.03867 0,-4.71925c1.89558,0 3.78758,0 5.719,0c0,1.45483 0,2.99208 0,4.71925zM43.27592,53.53142c1.93858,0 3.83417,0 5.76558,0c0,1.634 0,3.17125 0,4.73c-1.92425,0 -3.81625,0 -5.76558,0c0,-1.61967 0,-3.15692 0,-4.73zM35.97667,52.02283c0,-1.68058 0,-3.19275 0,-4.74075c1.89558,0 3.78042,0 5.719,0c0,1.66625 0,3.22142 0,4.74075c-1.90275,0 -3.76967,0 -5.719,0zM41.68492,70.20467c-1.90633,0 -3.75892,0 -5.67242,0c0,-1.6125 0,-3.17483 0,-4.78733c1.8705,0 3.73742,0 5.67242,0c0,1.62683 0,3.18558 0,4.78733zM49.05583,95.70725c0,1.55517 0,3.06733 0,4.67625c-1.93142,0 -3.84492,0 -5.79783,0c0,-1.53725 0,-3.07092 0,-4.67625c1.92425,0 3.81625,0 5.79783,0zM43.2795,41.48425c1.95292,0 3.8485,0 5.76558,0c0,1.65908 0,3.19633 0,4.74075c-1.92425,0 -3.81625,0 -5.76558,0c0,-1.65192 0,-3.21067 0,-4.74075zM36.01608,107.84758c1.89917,0 3.76967,0 5.68675,0c0,1.52292 0,3.08167 0,4.76225c-1.87767,0 -3.74817,0 -5.68675,0c0,-1.48708 0,-3.04583 0,-4.76225zM43.26158,136.51425c0,-1.49425 0,-3.0315 0,-4.67983c1.93142,0 3.827,0 5.76917,0c0,1.47992 0,3.01717 0,4.67983c-1.89917,0 -3.79117,0 -5.76917,0zM49.05583,137.85083c0,1.52292 0,3.04583 0,4.7085c-1.9135,0 -3.8055,0 -5.76917,0c0,-1.462 0,-3.02075 0,-4.7085c1.90275,0 3.79833,0 5.76917,0zM43.26158,130.50142c0,-1.50142 0,-3.03867 0,-4.69417c1.91708,0 3.81267,0 5.762,0c0,1.49067 0,3.02433 0,4.69417c-1.892,0 -3.8055,0 -5.762,0zM56.36583,59.60875c0,1.634 0,3.16767 0,4.71925c-1.935,0 -3.83058,0 -5.76917,0c0,-1.60533 0,-3.139 0,-4.71925c1.90992,0 3.8055,0 5.76917,0zM49.02358,64.28142c-1.9135,0 -3.78758,0 -5.73333,0c0,-1.60533 0,-3.1605 0,-4.74433c1.88483,0 3.78042,0 5.73333,0c0,1.60175 0,3.13542 0,4.74433zM50.60025,83.64217c1.94217,0 3.83417,0 5.76558,0c0,1.58742 0,3.1175 0,4.69417c-1.92783,0 -3.81983,0 -5.76558,0c0,-1.55158 0,-3.08525 0,-4.69417zM57.93533,137.69675c1.93858,0 3.81267,0 5.74408,0c0,1.58025 0,3.11392 0,4.7085c-1.89917,0 -3.79117,0 -5.74408,0c0,-1.591 0,-3.12108 0,-4.7085zM57.91383,34.271c0,-1.53367 0,-3.04942 0,-4.644c1.892,0 3.79117,0 5.75842,0c0,1.49067 0,3.02433 0,4.644c-1.86333,0 -3.75892,0 -5.75842,0zM49.02358,76.3035c-1.93142,0 -3.827,0 -5.75842,0c0,-1.58742 0,-3.12825 0,-4.71925c1.91708,0 3.81267,0 5.75842,0c0,1.58025 0,3.139 0,4.71925zM50.60383,107.67917c1.94575,0 3.82342,0 5.75125,0c0,1.55875 0,3.09242 0,4.69417c-1.89917,0 -3.79833,0 -5.75125,0c0,-1.53367 0,-3.07092 0,-4.69417z"></path><path
                d="M143.11117,107.80458c-0.35833,-3.62633 -1.30433,-7.06992 -3.11392,-10.25908c-0.56258,-0.99258 -1.15025,-1.57667 -2.37575,-1.45842c-1.0105,0.09675 -2.04608,-0.06808 -3.07092,-0.11467c-1.31867,-0.06092 -2.63733,-0.12183 -4.00258,-0.18633c0,-2.01025 -0.03225,-3.92733 0.01792,-5.84083c0.01433,-0.59483 -0.18633,-0.87792 -0.70592,-1.03558c-2.279,-0.68442 -4.54725,-1.42975 -6.84417,-2.05325c-1.32225,-0.35833 -2.69825,-0.51958 -4.085,-0.77758c0,-0.68083 0,-1.30075 0,-1.92067c0,-2.21808 0.00358,-2.20733 2.08908,-2.9455c3.62275,-1.27925 7.20608,-2.63017 10.277,-5.07042c3.43283,-2.7305 5.90175,-6.17408 7.35658,-10.3415c1.31867,-3.7625 1.43333,-7.67908 1.15383,-11.61717c-0.215,-3.02075 -0.89225,-5.94117 -2.29333,-8.63942c-1.0965,-2.11417 -2.67317,-3.81983 -4.67983,-5.05967c-4.257,-2.62658 -8.944,-3.3325 -13.82808,-3.05658c-1.42617,0.08242 -2.85592,0.17917 -4.30358,0.26875c-0.02867,-0.49092 -0.05375,-0.89583 -0.07525,-1.32225c-1.90992,0.24367 -3.73025,0.473 -5.58283,0.70592c0,-1.74867 0,-3.35042 0,-4.99875c1.88125,-0.28308 3.73383,-0.56258 5.59,-0.84567c0,-2.22525 0,-4.36092 0,-6.47508c-6.76175,0.95675 -13.49125,1.90992 -20.27808,2.87025c0,4.09575 0,8.18075 0,12.40908c-4.24625,0.1935 -8.44233,0.387 -12.68858,0.5805c0,-1.70925 0,-3.30742 0,-4.95217c1.82392,-0.1075 3.60842,-0.20783 5.37142,-0.30817c0,-2.44742 0,-4.76583 0,-6.9875c-7.31358,0.4085 -14.54833,0.817 -21.8655,1.2255c0,3.96675 0,7.90125 0,11.92175c-4.89842,0 -9.71442,0 -14.577,0c0,2.0425 0,3.999 0,6.106c1.91708,0 3.78758,0 5.66883,0c0,1.68417 0,3.21425 0,4.71925c-1.93858,0 -3.81267,0 -5.6545,0c0,2.00667 0,3.96675 0,6.01283c2.43667,0 4.80883,0 7.29567,0c0,6.46792 0,12.85342 0,19.31417c1.92783,0 3.74817,0 5.57208,0c0,1.58383 0,3.08525 0,4.67267c-1.87767,0 -3.698,0 -5.55417,0c0,2.4725 0,4.85183 0,7.34583c1.88483,0 3.72308,0 5.57925,0c0,1.591 0,3.07808 0,4.67625c-1.87408,0 -3.71592,0 -5.65092,0c0,6.4715 0,12.8355 0,19.27833c-2.47608,0 -4.84825,0 -7.23833,0c0,4.1065 0,8.127 0,12.1475c1.87767,0 3.698,0 5.62942,0c0,1.54442 0,3.04583 0,4.66908c3.03867,0 5.96983,0 9.00133,0c0,4.085 0,8.04458 0,11.97908c4.94142,0.22217 9.77533,0.44075 14.73467,0.65933c0,-1.548 0,-3.04942 0,-4.61175c1.935,0.172 3.74817,0.32967 5.6545,0.49808c0,-2.58 0,-5.07758 0,-7.67192c2.967,0.22933 5.83008,0.4515 8.772,0.68083c0,4.1925 0,8.299 0,12.34458c6.794,0.96033 13.50558,1.90992 20.28883,2.87025c0,-4.30717 0,-8.58567 0,-12.94658c1.21475,0.086 2.29333,0.16483 3.36833,0.24367c3.72308,0.26517 7.41392,0.215 11.05817,-0.77758c6.72233,-1.8275 11.29108,-5.88742 13.12933,-12.857c1.13592,-4.28208 1.29358,-8.65733 0.86,-13.06842zM130.60892,48.05608c1.79167,-0.26875 3.612,-0.5375 5.53625,-0.82417c0,1.88842 0,3.71233 0,5.633c-1.81675,0.22575 -3.64425,0.45508 -5.53625,0.69158c0,-1.83825 0,-3.61917 0,-5.50042zM130.58742,62.12783c1.84542,-0.17558 3.655,-0.34758 5.53267,-0.52675c0,1.86692 0,3.70517 0,5.64375c-1.81317,0.12183 -3.64425,0.24725 -5.53267,0.37267c0,-1.90633 0,-3.67292 0,-5.48967zM72.61625,47.11367c1.92783,-0.09675 3.79117,-0.18633 5.70467,-0.2795c0,1.634 0,3.16767 0,4.78733c-1.90992,0.086 -3.77683,0.17558 -5.70467,0.26158c0,-1.60533 0,-3.139 0,-4.76942zM76.08133,65.66458c0,1.51575 0,3.01717 0,4.59025c-1.85258,0 -3.7195,0 -5.65092,0c0,-1.49425 0,-2.99567 0,-4.59025c1.88842,0 3.73742,0 5.65092,0zM65.36,47.33225c1.88483,0 3.72667,0 5.62225,0v0c0,1.45842 0,2.99208 0,4.64758v0c-1.87408,0 -3.7195,0 -5.62225,0c0,-1.44767 0,-2.98133 0,-4.64758zM62.25683,64.28142v0c0,-1.55875 0,-3.07092 0,-4.62967v0c1.87767,0 3.74817,0 5.676,0c0,1.56592 0,3.07092 0,4.62967c-1.93142,0 -3.784,0 -5.676,0zM63.70092,124.45992c-1.88842,0 -3.75175,0 -5.66883,0v0c0,-1.47992 0,-3.01358 0,-4.644v0c1.88125,0 3.72667,0 5.66883,0c0,1.50858 0,3.01717 0,4.644zM69.54892,112.34825v0c-1.90992,0 -3.77683,0 -5.69392,0v0c0,-1.50858 0,-3.01717 0,-4.601v0c1.88125,0 3.74458,0 5.69392,0v0c0,1.5265 0,3.03508 0,4.601zM69.5525,106.32108c-1.89917,0 -3.76608,0 -5.69033,0v0c0,-1.49783 0,-3.00283 0,-4.59742v0c1.88842,0 3.75175,0 5.69033,0c0,1.54083 0,3.02792 0,4.59742zM69.73525,83.66008c1.86692,0 3.73025,0 5.63658,0c0,1.54442 0,3.08167 0,4.66908c-1.86333,0 -3.70517,0 -5.63658,0c0,-1.56592 0,-3.08167 0,-4.66908zM78.34242,136.36733c-1.892,0 -3.78042,0 -5.71542,0c0,-1.55517 0,-3.03867 0,-4.59742c1.892,0 3.77683,0 5.71542,0c0,1.52292 0,3.03508 0,4.59742zM83.28383,55.54525c0.48375,-0.03225 15.824,-0.80625 17.673,-0.85642c11.96475,-0.30817 11.64225,4.91992 11.72825,8.72542c0.15767,6.98392 -2.70542,13.2655 -17.0925,14.39425c-0.48733,0.03583 -12.14033,0.53392 -12.30875,0.53392c0,-7.62175 0,-15.17542 0,-22.79717zM93.095,125.15867v0v0c-0.94242,-0.043 -4.687,-0.22217 -5.64375,-0.26517c0,-1.56592 0,-3.12467 0,-4.60458c1.86692,0 3.73383,0 5.64375,0v0c0,1.68417 0,3.225 0,4.86975zM107.6505,126.21217c-1.3975,-0.1075 -5.16,-0.4085 -5.64017,-0.44433c0,-1.60892 0,-3.18917 0,-4.87333v0v0c1.43333,0.10392 2.82725,0.20067 4.23192,0.29742c0.46942,0.03583 0.93883,0.0645 1.40825,0.10033c0,1.64475 0,3.22858 0,4.91992zM115.52308,111.026c-0.34758,1.32942 -1.32583,6.31383 -12.87492,6.2995c-2.82725,-0.00358 -18.95942,-0.67725 -19.3715,-0.67725v0v0c0,-7.69342 0,-15.18975 0,-22.80075c0.35833,0 10.61025,0.22217 12.31233,0.31533c17.99908,0.97108 18.43267,4.50067 20.26017,11.06892c0.52675,1.88483 0.17558,3.88792 -0.32608,5.79425zM136.14158,117.56917c-1.85258,-0.21858 -3.66217,-0.43358 -5.52908,-0.65575c0,-1.806 0,-3.59408 0,-5.50758c1.81675,0.17917 3.64425,0.35475 5.52908,0.5375c0,1.92425 0,3.741 0,5.62583z"></path></g></g>
</svg>
</span>
                            </div>
                            <div class="contents">
                                <h3>Staking</h3>
                                <p class="font-size-16 lh-165">EARN the best Apr on your crypto by locking your crypto
                                    with us(upto to 120%).</p>
                            </div>
                        </div>
                        <div
                            class="iconbox text-left iconbox-round iconbox-lg iconbox-filled iconbox-filled iconbox-filled-hover iconbox-icon-image iconbox-shadow pt-50 pb-40">
                            <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container mb-35">
<img src="{{asset('icons8-bot-48.png')}}" style="width: 100%" alt=""/>
</span>
                            </div>
                            <div class="contents">
                                <h3>Automated Trading</h3>
                                <p class="font-size-16 lh-165">Set automated trades and never miss a rally or get caught
                                    in a dip.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vc_row pt-100 pb-100 bg-cover"
             style="background-image:   linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-md-8 col-md-offset-2 text-center">
                    <h2 class="mt-0 mb-3 font-size-35 text-white">Create an account to get early access to promising
                        crypto tokens before they’re listed on exchanges</h2>
                    <p class="font-size-20 text-fade-white-07 mb-45">Trade Bitcoin, Ether, Tether, Doge, and
                        more</p>
                    <a href="{{route('register')}}"
                       class="btn btn-solid border-none px-2 font-size-15 font-weight-bold btn-white text-hover-white">
<span>
<span class="btn-txt">Get Started</span>
<span class="btn-gradient-bg bg-white"></span>
<span class="btn-gradient-bg btn-gradient-bg-hover"></span>
</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('page_js')
    <script>
        new Vue({
            el: "#supportedcoins",
            data() {
                return {
                    coinlist: [],
                    loading: false,
                    image_base_url: {
                        type: Object,
                    },
                    coins: [],
                    token_coins: []
                }

            },
            mounted() {
                this.getSupportedCoins();
            },
            methods: {
                getSupportedCoins: function () {

                    axios.get('/api/coins/all')
                        .then(response => {

                            let list=[];
                            $.each(response.data.data, function(key, value) {
                                list.push(value);
                            });
                            this.coinlist = list[0];
                            this.image_base_url = response.data.data.image_base_url;
                        }).catch(error => {
                        console.log("error", error);
                    }).finally(() => {
                        this.loading = true;
                    });
                }
            }
        });

    </script>

@endsection

@section('page_css')
    <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
@endsection
