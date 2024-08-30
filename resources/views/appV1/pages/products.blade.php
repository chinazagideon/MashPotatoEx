@extends('appV1.layouts.front')
@section('page_title', 'Get Started')
@section('content')
    <style>
        h2 {
            color: #0a0a0a !important;
        }

        div .lqd-column h5 {
            color: #0a0a0a !important;
        }
    </style>
    <section class="vc_row py-5 d-flex flex-wrap align-items-center bg-cover"
             style="background-image:  linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);"></section>
    <section class="vc_row  mb-60 d-flex flex-wrap align-items-center bg-cover"
             style="background: rgb(18, 29, 51)">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-6 col-md-offset-1 col-md-7" data-custom-animations="true"
                     data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","delay":"150","easing":"easeOutQuint","direction":"forward","initValues":{"translateY":50,"opacity":1},"animations":{"translateY":0,"opacity":1}}'>
                    <div class="ld-fancy-heading pt-8 pb-4">
                        <h2 class="font-size-32 text-white">The fullstack solution for crypto</h2>
                        <h5 style="color: #a6a6a6 !important;">Stake, earn, and trade the best new crypto assets all
                            under one roof</h5>
                    </div>

                    <a href="{{route('register')}}"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Get Stared</span>
</span>
                    </a>
                    <a href="#products"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Learn More</span>
</span>
                    </a>

                </div>
                <div class="col-md-5 col-lg-4 lqd-column">
                    <img
                        src="{{asset('appV1/assets/img/misc/coinlist_app-432333f74b2bf1ca50f661050c993f80dc5f2b75dcc9adb9483e60ea38a877e5.png')}}"
                </div>
            </div>
        </div>
    </section>

    <section class="vc_row pt-50 pb-50 mb-170" id="products">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-6 mb-4 mb-md-0  col-md-offset-1">
                    <p>TOKEN SALES</p>
                    <h2 class="font-size-20">Get access to the best new tokens before they list on exchanges</h2>
                    <p class="font-size-15 lh-175 pr-md-7 mr-md-3">{{config('app.name')}} got its start by giving you
                        access to the
                        best new crypto projects before the large exchanges. We continue to be selective about the
                        projects we work with, providing background information on each project and alerting you when
                        new sales launch.
                    </p>
                    <a href="{{route('login')}}"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Get Stared</span>
</span>
                    </a>
                </div>
                <div class="lqd-column col-lg-5 pt-md-0">
                    <div class="liquid-img-group-container">
                        <div class="liquid-img-group-inner">
                            <div
                                class="liquid-img-group-single px-md-5 block-revealer element-uncovered revealing-ended"
                                data-reveal="true"
                                data-reveal-options="{&quot;direction&quot;:&quot;lr&quot;,&quot;bgcolor&quot;:&quot;rgb(249, 249, 249)&quot;	}">
                                <div class="block-revealer__content">
                                    <div class="liquid-img-group-img-container">
                                        <div class="liquid-img-container-inner">
                                            <figure style="opacity: 1;">
                                                <img
                                                    src="{{asset('appV1/assets/img/misc/logos-8a131f53a16189eb722b94db53deb60c2910ac99b6514267908b61dbfa008848.png')}}"
                                                    alt="Bitcoin">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-revealer__element"
                                     style="transform: scaleX(0); transform-origin: 100% 50%; background: rgb(249, 249, 249); opacity: 1;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vc_row pb-50 mb-170">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-6 mb-4 mb-md-0  col-md-offset-1">
                    <p>STAKING</p>
                    <h2 class="font-size-20">Earn up to 120% APY on assets like Doge, USDT, and BNB</h2>
                    <p class="font-size-15 lh-175 pr-md-7 mr-md-3">With {{config('app.name')}}, you automatically earn
                        rewards by
                        staking assets like Bitcoin, Ethereum and Kusama in your PennHaven wallet. You can also opt for
                        higher rewards with assets like Doge and Binance coin.
                    </p>
                    <a href="{{route('login')}}"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Get Stared</span>
</span>
                    </a>
                </div>
                <div class="lqd-column col-lg-5 pt-md-0">
                    <div class="liquid-img-group-container">
                        <div class="liquid-img-group-inner">
                            <div
                                class="liquid-img-group-single px-md-5 block-revealer element-uncovered revealing-ended"
                                data-reveal="true"
                                data-reveal-options="{&quot;direction&quot;:&quot;lr&quot;,&quot;bgcolor&quot;:&quot;rgb(249, 249, 249)&quot;	}">
                                <div class="block-revealer__content">
                                    <div class="liquid-img-group-img-container">
                                        <div class="liquid-img-container-inner">
                                            <figure style="opacity: 1;">
                                                <img
                                                    src="{{asset('appV1/assets/img/misc/logos-9422ee8067918fbfb3104847726abb7d2ea7b4425d96d90a902d3bc0051054f1.png')}}"
                                                    alt="Bitcoin">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-revealer__element"
                                     style="transform: scaleX(0); transform-origin: 100% 50%; background: rgb(249, 249, 249); opacity: 1;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vc_row pb-50 mb-170">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-6 mb-4 mb-md-0  col-md-offset-1">
                    <p>WALLETS</p>
                    <h2 class="font-size-20">Securely store your cryptoassets with us for no charge</h2>
                    <p class="font-size-15 lh-175 pr-md-7 mr-md-3">{{config('app.name')}} works with the top crypto
                        custodians
                        like Anchorage, BitGo, and Gemini Custody to securely store your funds. Storage and custody fees
                        are waived for all {{config('app.name')}} users. BTC, ETH, USDT, BNB, with more to
                        come.


                    </p>
                    <a href="{{route('login')}}"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Get Stared</span>
</span>
                    </a>
                </div>
                <div class="lqd-column col-lg-5 pt-md-0">
                    <div class="liquid-img-group-container">
                        <div class="liquid-img-group-inner">
                            <div
                                class="liquid-img-group-single px-md-5 block-revealer element-uncovered revealing-ended"
                                data-reveal="true"
                                data-reveal-options="{&quot;direction&quot;:&quot;lr&quot;,&quot;bgcolor&quot;:&quot;rgb(249, 249, 249)&quot;	}">
                                <div class="block-revealer__content">
                                    <div class="liquid-img-group-img-container">
                                        <div class="liquid-img-container-inner">
                                            <figure style="opacity: 1;">
                                                <img
                                                    src="{{asset('appV1/assets/img/misc/wallet_app-998c8180f805ee8e0a0f8bd784e0db8b4589b18b12623988c9cdecc139261ed0.png')}}"
                                                    alt="Bitcoin">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-revealer__element"
                                     style="transform: scaleX(0); transform-origin: 100% 50%; background: rgb(249, 249, 249); opacity: 1;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vc_row pb-50 mb-170">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-6 mb-4 mb-md-0  col-md-offset-1">
                    <p>Lending</p>
                    <h2 class="font-size-20">Convert your bitcoin to wBTC and participate in DeFi</h2>
                    <p class="font-size-15 lh-175 pr-md-7 mr-md-3">Want access to DeFi lending and borrowing but don’t
                        want to give up your bitcoin to do so? {{config('app.name')}} is the world's leading Wrapped
                        Bitcoin merchant.
                        Instantly convert your bitcoin to wBTC and deploy it on Compound, MakerDAO, dYdX, Curve and
                        other top DeFi protocols.
                    </p>
                    <a href="{{route('login')}}"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Learn More about wBTC</span>
</span>
                    </a>
                </div>
                <div class="lqd-column col-lg-5 pt-md-0">
                    <div class="liquid-img-group-container">
                        <div class="liquid-img-group-inner">
                            <div
                                class="liquid-img-group-single px-md-5 block-revealer element-uncovered revealing-ended"
                                data-reveal="true"
                                data-reveal-options="{&quot;direction&quot;:&quot;lr&quot;,&quot;bgcolor&quot;:&quot;rgb(249, 249, 249)&quot;	}">
                                <div class="block-revealer__content">
                                    <div class="liquid-img-group-img-container">
                                        <div class="liquid-img-container-inner">
                                            <figure style="opacity: 1;">
                                                <img
                                                    src="{{asset('appV1/assets/img/misc/wbtc-0387ea5dda8083fec838b95f0de967b7a0fdce6ee707667df0560ba5a4c01bd7.png')}}"
                                                    alt="Bitcoin">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-revealer__element"
                                     style="transform: scaleX(0); transform-origin: 100% 50%; background: rgb(249, 249, 249); opacity: 1;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vc_row pb-50 mb-170">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-6 mb-4 mb-md-0  col-md-offset-1">
                    <p>Swap</p>
                    <h2 class="font-size-20">Start swapping your MATIC, KSM for USDT </h2>
                    <p class="font-size-15 lh-175 pr-md-7 mr-md-3">Swapping crypto tokens doesn’t get any faster than
                        this, convert your volatile assets to fiat in just a click and yes, no confirmation required.
                    </p>
                    <a href="{{route('login')}}"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Start Swapping</span>
</span>
                    </a>
                </div>
                <div class="lqd-column col-lg-5 pt-md-0">
                    <div class="liquid-img-group-container">
                        <div class="liquid-img-group-inner">
                            <div
                                class="liquid-img-group-single px-md-5 block-revealer element-uncovered revealing-ended"
                                data-reveal="true"
                                data-reveal-options="{&quot;direction&quot;:&quot;lr&quot;,&quot;bgcolor&quot;:&quot;rgb(249, 249, 249)&quot;	}">
                                <div class="block-revealer__content">
                                    <div class="liquid-img-group-img-container">
                                        <div class="liquid-img-container-inner">
                                            <figure style="opacity: 1;">
                                                <img
                                                    src="{{asset('appV1/assets/img/misc/swap-9422ee8067918fbfb3104847726abb7d2ea7b4425d96d90a902d3bc0051054f1.png')}}"
                                                    alt="Bitcoin">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-revealer__element"
                                     style="transform: scaleX(0); transform-origin: 100% 50%; background: rgb(249, 249, 249); opacity: 1;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vc_row pb-50 mb-170">
        <div class="container">
            <div class="row">

                <div class="lqd-column col-lg-6 mb-4 mb-md-0  col-md-offset-1">
                    <p>BotTrader</p>
                    <h2 class="font-size-20">Automatic trade With maxbot.</h2>
                    <p class="font-size-15 lh-175 pr-md-7 mr-md-3">Set automated trades and never miss a rally or get
                        caught in a dip. PennHaven obsessively seeks out effective market indicators to enable smart
                        allocation of funds while putting you in control of your machine.
                    </p>
                    <a href="{{route('trader')}}"
                       class="btn btn-default text-uppercase btn-xlg circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Start Trading</span>
</span>
                    </a>
                </div>
                <div class="lqd-column col-lg-5 pt-md-0">
                    <div class="liquid-img-group-container">
                        <div class="liquid-img-group-inner">
                            <div
                                class="liquid-img-group-single px-md-5 block-revealer element-uncovered revealing-ended"
                                data-reveal="true"
                                data-reveal-options="{&quot;direction&quot;:&quot;lr&quot;,&quot;bgcolor&quot;:&quot;rgb(249, 249, 249)&quot;	}">
                                <div class="block-revealer__content">
                                    <div class="liquid-img-group-img-container">
                                        <div class="liquid-img-container-inner">
                                            <figure style="opacity: 1;">
                                                <img
                                                    src="{{asset('appV1/dashb/assets/images/Forex-Robot.jpg')}}"
                                                    alt="Bitcoin">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-revealer__element"
                                     style="transform: scaleX(0); transform-origin: 100% 50%; background: rgb(249, 249, 249); opacity: 1;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
