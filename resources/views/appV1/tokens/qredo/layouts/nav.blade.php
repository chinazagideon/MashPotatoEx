@extends('appV1.tokens.flow.layouts.app')
@section('header')
    <nav class="navbar wow fadeInDown" data-wow-delay=".2s" data-wow-duration="1s" id="myNavbar">
        <!-- Main header start -->
        <div class="container">
            <!-- container-start -->
            <div class="navbar-header ">
                <button data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <!-- mobile toggle (hamburgur) -->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar top"></span>
                    <span class="icon-bar mid"></span>
                    <span class="icon-bar btm"></span>
                </button>
                <a href="/" class="site-logo navbar-brand"><img src="{{asset('appV1/assets/img/misc/logo-ave.png')}}" alt="{{config('app.name')}}'s Logo" class="img-responsive"></a><!-- main logo -->
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse ">
                <ul class="nav navbar-nav navbar-right " id="">
                    <li>
                        <a href="/">
                            <span class="link-icon"></span>
                            <span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Home</span>
</span>
                        </a>
                    </li>
                    <li> <a href="{{route('market_data')}}">
                            <span class="link-icon"></span>
                            <span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Market Data</span>
</span>
                        </a>
                    </li>
                    <li> <a href="{{route('products')}}">
                            <span class="link-icon"></span>
                            <span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Products</span>
</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('sales')}}">
                            <span class="link-icon"></span>
                            <span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Token Sales</span>
</span>
                        </a>
                    </li>
                    <li><a href="{{route('mining')}}">
                            <span class="link-icon"></span>
                            <span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Mining</span>
</span>
                        </a></li>
                    <li>    <a href="{{route('login')}}">
                            <span class="link-icon"></span>
                            <span class="link-txt">
<span class="link-ext"></span>
<span class="txt">Login</span>
</span>
                        </a></li>
                    <li><a href="{{route('register')}}" class="menu-btn">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

@endsection

@section('footer')
    <style>
        .ft-left-m {
            margin-left: 24px !important;
        }

        .ft-m {
            color: #3b2340 !important;
        }


    </style>
    <div class="lqd-sticky-footer-wrap"
         style="line-height: 1.3em !important;background-color: #f9f9f96e !important;">
        <div class="height-applied"></div>
        <footer class="main-footer pt-100 pt-70 footer-stuck is-inview">
            <section class="pb-55">
                <div class="container">

                    <div class="row">
                        <div class="lqd-column col-md-6 col-sm-6">
                            <p class="s-marginBottom0_5"
                               style="font-size: 11px !important; color: rgba(0,0,0,0.3) !important; ">
                                This site is operated by Amalgamated Token Services Inc. through its
                                wholly-owned
                                subsidiary, {{strtoupper(config('app.name'))}} BROKERAGE PARTNERS, LLC (together,
                                “{{config('app.name')}}”), which is not a registered
                                broker-dealer. {{config('app.name')}} does not give investment advice,
                                endorsement, analysis or
                                recommendations with respect to any securities or provide legal or tax
                                advice. All
                                securities
                                listed here are being offered by, and all information included on this site
                                is the
                                responsibility of, the applicable issuer of such securities.
                                Neither {{config('app.name')}} nor any of its
                                officers, directors, agents, and employees makes any warranty, express or
                                implied, of any
                                kind
                                whatsoever related to the adequacy, accuracy or completeness of any
                                information
                                on this site or the use of information on this site. This site contains
                                external links to
                                third-party content (content hosted on sites unaffiliated
                                with {{config('app.name')}}). As such, {{config('app.name')}}
                                makes no representations or endorsements whatsoever regarding any
                                third-party content/sites
                                that may be accessible directly or indirectly from this site.
                            </p>
                            <p class="s-marginBottom0_5"
                               style="font-size: 11px !important; color: rgba(0,0,0,0.3) !important; ">
                                All securities-related activity is conducted by EC Securities, LLC (“EC
                                Securities”),
                                an affiliate of {{config('app.name')}}, a registered broker-dealer and
                                member FINRA/SIPC, located at 850
                                Montgomery St. Suite 350, San Francisco, CA 94133. EC Securities does not
                                make investment
                                recommendations, and no communication, through this website or in any other
                                medium, should
                                be
                                construed as a recommendation for any security offered on or off this
                                investment platform.
                                These
                                securities are not FDIC or SIPC insured and there is no bank or other
                                guarantee if they lose
                                value. Please review the background of our broker-dealer and investment
                                professionals on
                                <a class="" target="_blank" href="{{config('app.finra_url')}}">FINRA’s
                                    broker/check</a>. A uniform customer relationship
                                summary and disclosure template prescribed by the SEC, that provides
                                succinct and relevant
                                information to retail investors and enables comparability between
                                broker-dealers with
                                respect to
                                fees, conflicts, and services provided.
                            </p>
                        </div>
                        <div class="lqd-column col-md-6 col-sm-6"
                             style="font-size: 11px !important; color: rgba(0,0,0,0.3) !important; ">
                            <div class="s-grid-colSm10 s-fontSize11">
                                <p class="s-marginBottom0_5">
                                    All cryptocurrency trading and related services are provided
                                    by {{config('app.name')}} Markets LLC
                                    (“{{config('app.name')}} Markets”) NMLS #1785267, an affiliate
                                    of {{config('app.name')}} and a Money Services
                                    Business
                                    registered with Financial Crimes Enforcement Network and certain states
                                    as a money
                                    transmitter.
                                </p>
                                <p class="s-marginBottom0_5">
                                    All lending services are provided by {{config('app.name')}} Lend LLC, an
                                    affiliate of {{config('app.name')}} and
                                    a proprietary cryptocurrency lender.
                                </p>
                                <p class="s-marginBottom0_5">
                                    Certain services may be limited to residents of certain jurisdictions,
                                    and certain
                                    disclosures are required in certain jurisdictions, <a class=""
                                                                                          href="{{route('legal')}}">available
                                        here</a>.
                                </p>
                                <p class="s-marginBottom0_5">
                                    Potential investors must conduct their own due diligence of any issuer,
                                    cryptocurrency,
                                    token or token-based security. Investing in cryptocurrencies, tokens and
                                    token-based
                                    securities
                                    is highly risky and may lead to total loss of investment. Use of the
                                    site is subject to
                                    certain
                                    risks, including but not limited to those <a class=""
                                                                                 href="{{route('virtual')}}">listed
                                        here</a>.
                                </p>
                                <p class="s-marginBottom0_5">
                                    All activities on this site are governed by our <a class=""
                                                                                       href="">Terms
                                        of
                                        Service</a> and
                                    <a class="" href="{{route('privacy')}}">Privacy Policy</a> which you
                                    agree to by using this site.
                                    {{config('app.name')}} and
                                    the employees, officers, directors and affiliates
                                    of {{config('app.name')}} may own equity, tokens or
                                    other
                                    interests in companies using the site and may also participate in
                                    certain current
                                    offerings using
                                    the site (where permitted). {{config('app.name')}} services are not
                                    being directed toward the
                                    residents of any
                                    jurisdictions outside of the United States of America.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="lqd-column col-md-6 text-md-left pt-5" style="font-size: 16px !important;">
                            <p>
                                <a href="{{route('jobs')}}" class="ft-m">Jobs</a>
                                <a href="{{route('help')}}" class="ft-left-m ft-m">Help</a>
                                <a href="{{route('privacy')}}" class="ft-left-m ft-m">Privacy</a>                                            
                                <a href="{{asset('appV1/assets/documents/PennHaven_Terms_and_Conditions.pdf')}}" target="_blank" class="ft-left-m ft-m">Terms</a>
                                <a href="{{route('legal')}}" class="ft-left-m ft-m">Legal</a>
                                <a href="{{route('status')}}" class="ft-left-m ft-m">Status</a>
                                <a href="{{route('blog')}}" class="ft-left-m ft-m">Blog</a>
                                {{--                                            <a href="#" target="_blank" class="ft-left-m"><i class="fa fa-facebook"></i></a>--}}
                                {{--                                            <a href="#" target="_blank" class="ft-left-m"><i class="fa fa-linkedin"></i></a>--}}
                                {{--                                            <a href="#" target="_blank" class="ft-left-m"><i--}}
                                {{--                                                    class="fa fa-skype"></i></a>--}}
                            </p>
                        </div>
                        <div class="col-md-6 lqd-column text-right">
                            <h5>Fully Compatible with</h5>

                            <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                             width="40" height="40"
                                             viewBox="0 0 172 172"
                                             style=" fill:#4a90e2;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                               stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                               stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                               font-weight="none" font-size="none" text-anchor="none"
                                               style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="#000000">
                                                    <path
                                                        d="M114.55469,14.33333c-7.62533,0.817 -16.00686,5.69806 -21.34603,12.21973c-4.57233,5.6975 -8.38522,14.65527 -6.85872,23.61361c7.61817,0 16.00003,-5.69806 21.33203,-12.21973c4.5795,-6.5145 7.63239,-14.65527 6.87272,-23.61361zM59.86686,50.16667c-11.63867,0 -24.10296,7.009 -31.59212,17.91667c-10.80733,15.58033 -9.14355,45.18729 8.31445,70.11295c6.65783,9.34533 14.96187,19.47038 25.76921,19.47038c9.976,0 12.4747,-6.22884 25.7832,-6.22884c13.3085,0 15.7932,6.22884 25.7692,6.22884c11.63867,0 19.95839,-10.9089 26.60905,-20.25423c4.988,-6.22783 6.65481,-10.12381 9.98014,-17.13281c-25.7785,-9.3525 -29.9374,-42.85073 -4.98307,-56.08756c-8.32051,-8.57133 -19.12459,-14.02539 -29.10059,-14.02539c-13.3085,0 -19.12291,7.16667 -28.27474,7.16667c-9.15183,0 -16.63607,-7.16667 -28.27474,-7.16667z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                            </span>
                            <span class="ml-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                             width="40" height="40"
                                             viewBox="0 0 172 172"
                                             style=" fill:#4a90e2;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                               stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                               stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                               font-weight="none" font-size="none" text-anchor="none"
                                               style="mix-blend-mode: normal">
                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                <g fill="#000000">
                                                    <path
                                                        d="M53.75,7.16667c-0.91733,0 -1.83478,0.35105 -2.53353,1.0498c-1.3975,1.3975 -1.3975,3.66956 0,5.06706l9.39225,9.39225c-10.66343,7.82497 -17.60872,20.41563 -17.60872,34.65755h86c0,-14.24192 -6.9453,-26.83258 -17.60872,-34.65755l9.39225,-9.39225c1.3975,-1.40467 1.3975,-3.66239 0,-5.06706c-1.3975,-1.3975 -3.66956,-1.3975 -5.06706,0l-10.62402,10.62402c-5.75803,-2.86198 -12.22542,-4.50716 -19.09244,-4.50716c-6.86703,0 -13.33441,1.64518 -19.09245,4.50716l-10.62402,-10.62402c-0.69875,-0.69875 -1.6162,-1.0498 -2.53353,-1.0498zM64.5,35.83333h7.16667v7.16667h-7.16667zM100.33333,35.83333h7.16667v7.16667h-7.16667zM28.66667,64.5c-3.956,0 -7.16667,3.21067 -7.16667,7.16667v43c0,3.956 3.21067,7.16667 7.16667,7.16667c3.956,0 7.16667,-3.21067 7.16667,-7.16667v-43c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667zM43,64.5v57.33333c0,3.956 3.21067,7.16667 7.16667,7.16667h7.16667v25.08333c0,5.934 4.816,10.75 10.75,10.75c5.934,0 10.75,-4.816 10.75,-10.75v-25.08333h14.33333v25.08333c0,5.934 4.816,10.75 10.75,10.75c5.934,0 10.75,-4.816 10.75,-10.75v-25.08333h7.16667c3.956,0 7.16667,-3.21067 7.16667,-7.16667v-57.33333zM143.33333,64.5c-3.956,0 -7.16667,3.21067 -7.16667,7.16667v43c0,3.956 3.21067,7.16667 7.16667,7.16667c3.956,0 7.16667,-3.21067 7.16667,-7.16667v-43c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        </span>
                            <span class="ml-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                 width="40" height="40"
                                                 viewBox="0 0 172 172"
                                                 style=" fill:#4a90e2;"><g fill="none" fill-rule="nonzero" stroke="none"
                                                                           stroke-width="1" stroke-linecap="butt"
                                                                           stroke-linejoin="miter"
                                                                           stroke-miterlimit="10" stroke-dasharray=""
                                                                           stroke-dashoffset="0" font-family="none"
                                                                           font-weight="none" font-size="none"
                                                                           text-anchor="none"
                                                                           style="mix-blend-mode: normal"><path
                                                        d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path
                                                            d="M68.8,91.73333h-51.6v44.43333l51.6,7.09787zM68.8,28.66667l-51.6,7.16667v44.43333h51.6zM80.26667,27.23333v53.03333h74.53333v-63.06667zM80.26667,91.73333v53.03333l74.53333,10.03333v-63.06667z"></path></g></g></svg>
                                        </span>

                        </div>
                    </div>
                </div>
            </section>

        </footer>
    </div>
@endsection
