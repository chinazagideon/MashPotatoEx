@extends('appV1.layouts.front')
@section('page_title', 'Market Data')
@section('content')
    <section class="vc_row py-5 d-flex flex-wrap align-items-center bg-cover"
             style="background-image:  linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);"></section>
    <section class="vc_row  d-flex flex-wrap align-items-center bg-cover"
             style="background: rgb(18, 29, 51)">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-6 col-md-7" data-custom-animations="true"
                     data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","delay":"150","easing":"easeOutQuint","direction":"forward","initValues":{"translateY":50,"opacity":1},"animations":{"translateY":0,"opacity":1}}'>
                    <div class="ld-fancy-heading pt-8">
                        <h2 class="font-size-32 text-white">Market Data</h2>
{{--                        <p class="" style="color: #0ebeff">Culture is more important than ever, so we try to live these values in our daily lives.</p>--}}
                    </div>

                    <br/>


                </div>

            </div>
        </div>
    </section>

    <section class="vc_row pt-50 pb-50 mb-170">
        <div class="container">
            <div class="row" style="height: 600px;">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                        {
                            "width": "100%",
                            "height": "100%",
                            "defaultColumn": "performance",
                            "screener_type": "crypto_mkt",
                            "displayCurrency": "USD",
                            "colorTheme": "light",
                            "locale": "en"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>
    </section>

@endsection
