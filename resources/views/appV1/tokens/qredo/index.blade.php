@extends('appV1.tokens.qredo.layouts.nav')
@section('page_title', 'Qredo')
@section('content')

    <style>
        table td {
            width: 10%;
            border: 3px solid #ff00a6;
            padding: 100px
        }

        table thead {
            width: 10%;
            border: 3px solid #ff00a6;
        }

        .auction-table table {
            width: 20%;
            border: 3px solid #ea00ff !important;
            padding: 100px;
        }
    </style>

    <section>
        <div class="align-item-center parallax"
             style="background-image: url({{asset($asset_path.'images/0259f7ed-46e7-49a3-910d-723d9221ef3b-1624543703-ff2a2114ed9428faf14d6b1460b5721b12607640.jpg')}}); background-repeat: no-repeat;">
            <div id="particles-js"></div>
            <div class="container">
                <!-- container-start -->
                <div class="row align-item-center mt5 text-center">
                    <!-- row start -->
                    <div class="col-sm-12 col-lg-8 col-lg-offset-2">
                        <!-- column start -->
                        <div class="banner-text">
                            <div class="col-lg-12 col-lg-offset-4 mb4">
                                <img
                                    src="{{asset($asset_path.'images/0259f7ed-46e7-49a3-910d-723d9221ef3b-1623074890-0006523f9954433ecfde89ca729c08b1c1e89711.png')}}"
                                    alt="Bitcoin"
                                    class="img-responsive">
                            </div>

                            <div class="wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                <p class="" style="font-size: 25px; color: #fff !important;"> Radical new infrastructure
                                    unlocking value across the multichain
                                    universe

                                </p>
                            </div>
                            <div class="mt3 mb4 banner-btn-group wow fadeInUp" data-wow-delay=".4s"
                                 data-wow-duration="1s">
                                <iframe id="youtube-5015" frameborder="0" allowfullscreen="1"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        title="Player for " width="640" height="360"
                                        src="https://www.youtube.com/embed/3HQ5DTPVix4?autoplay=0&amp;controls=0&amp;disablekb=1&amp;playsinline=1&amp;cc_load_policy=0&amp;cc_lang_pref=auto&amp;widget_referrer=https%3A%2F%2Fsales.coinlist.co%2Fqredo&amp;noCookie=false&amp;rel=0&amp;showinfo=0&amp;iv_load_policy=3&amp;modestbranding=1&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fsales.coinlist.co&amp;widgetid=1"></iframe>

                            </div>
                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </div>
        <!--================= banner-end ==================-->
    </section>
    <section id="about">
        <div class="pross-grid t-pross-grid dark-template-light-bg shapebg-left">
            <div class="b-burger">
                <div class="container">
                    <div class="row">
                        <!-- row-start -->
                        <div class="col-lg-12 ml2 mr2 mb6 text-center wow fadeInUp" data-wow-delay=".2s"
                             data-wow-duration="1s">
                            <!-- column start -->
                            <h2>ABOUT QREDO</h2>
                            <p class="big-pera">Qredo is rearchitecting digital asset ownership and blockchain
                                connectivity. A radical new approach to bring liquidity and capital efficiency to the
                                blockchain economy, Qredo has pioneered the first decentralized trustless multi-party
                                computation (MPC) custodial network. This advancement enables Qredo to offer
                                decentralized custody, native cross-chain swaps, and cross-platform liquidity access.

                            </p>
                        </div>
                        <div class="col-lg-12 ml2 mr2 mb6 text-center wow fadeInUp" data-wow-delay=".2s"
                             data-wow-duration="1s">
                            <!-- column start -->
                            <h2>MISSION</h2>
                            <p class="big-pera">Qredo works at the cutting-edge of cybersecurity and blockchain. By
                                utilizing the latest innovations in cryptography and distributed ledger technology,
                                Qredo delivers a powerful global network for securing and trading digital assets.
                            </p>
                            <p class="big-pera">
                                Qredo's mission is to build a decentralized infrastructure for pioneers and visionaries,
                                making an open network work for everyone.
                            </p>
                        </div>
                        <!-- column end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="pross-grid t-pross-grid dark-template-light-bg"
             style="background-repeat: no-repeat; background-image: url({{asset($asset_path.'images/0739f7c7-e318-4ed4-9246-49177f68ad42-1623184146-792dba5bc5ab896ba133d3947771f0735c5d1b95.png')}})">
            <div class="b-burger">
                <div class="container text-center">
                    <div class="row mb5">
                        <h2>CORE FUNCTIONALITY</h2>
                    </div>
                    <!-- row end -->
                    <div class="row">
                        <!-- row start -->
                        <div class="col-lg-4 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                            <img
                                src="{{asset($asset_path.'images/849a4f24-5db5-4c5c-b6d7-7977a80ab2f0-1624909000-4c0a6801d975bcb111a410f60ecdf63ea129b0c3.png')}}"
                                alt="why-cryptency"
                                class="cryptency-graph img-responsive  mb2">
                        </div>
                        <div class="col-lg-4 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                            <img
                                src="{{asset($asset_path.'images/50127817-2e0c-4922-a378-02122e4e8ffe-1624909019-c8cb1cd74dc2e6c02a5b61922012152037ee5d43.png')}}"
                                alt="why-cryptency"
                                class="cryptency-graph img-responsive  mb2">
                        </div>
                        <div class="col-lg-4 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                            <img
                                src="{{asset($asset_path.'images/a19b48ed-f3a3-40b1-a3e7-08286fa324fb-1624909040-b7863daa82c1be38519490cc44cdb09755d94b6d.png')}}"
                                alt="why-cryptency"
                                class="cryptency-graph img-responsive  mb2">
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <a href="https://www.qredo.com/" target="_blank" class="btn btn-lg mt3 btn-alpha redirect-btn wow fadeInUp" data-wow-delay=".8s"
                               data-wow-duration=".8s">LEARN MORE AT QREDO </a>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
                <!-- container end -->
            </div>
        </div>
        <div class="pross-grid t-pross-grid dark-template-light-bg">
            <div class="b-burger">
                <div class="container text-center">
                    <div class="row mb5">
                        <h2>OUR TEAM</h2>
                    </div>
                    <!-- row end -->
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay=".2s"
                             data-wow-duration=".4s">
                            <div class="our-team">
                                <img style="width: 60%"
                                     src="{{asset($asset_path.'images/7dd8bcda-040c-40ae-8f6e-2a84e85e8787-1623082432-1f2a5a9a17a0165e99eac317c43957db87f26e16.png')}}"
                                     alt="team image">
                                <div class="team-content">
                                    <h3 class="title">ANTHONY FOY</h3>
                                    <span class="post">CEO</span>
                                    <ul class="icon">
                                        <li><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>ANTHONY FOY, <small>CEO</small></h2>
                            <p>Digital veteran and serial entrepreneur. 20+ years experience in VC-backed growth
                                companies. 4 successful exits.</p>
                        </div><!-- column end -->
                        <div class="col-md-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay=".2s"
                             data-wow-duration=".4s">
                            <div class="our-team">
                                <img style="width: 60%"
                                     src="{{asset($asset_path.'images/0f28492c-db3f-4871-8bc4-214400d0dd25-1623082440-7a33e3ef41a601bac1b83bd48b72d88d110f2f82.png')}}"
                                     alt="team image">
                                <div class="team-content">
                                    <h3 class="title">BRIAN SPECTOR</h3>
                                    <span class="post">CPTO</span>

                                </div>
                            </div>
                            <h2>BRIAN SPECTOR, <small>CPTO</small></h2>
                            <p>Cyber Security expert and serial entrepreneur. 20+ years experience specializing in
                                advanced cryptography;
                                5 patents + 3 pending.</p>
                        </div><!-- column end -->
                        <div class="col-md-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay=".2s"
                             data-wow-duration=".4s">
                            <div class="our-team">
                                <img style="width: 60%"
                                     src="{{asset($asset_path.'images/933d7a6a-6da8-499f-bec5-13fa4314a8a9-1623082446-2d5096280caf370972902a6b74ce1dc8069673e9.png')}}"
                                     alt="team image">
                                <div class="team-content">
                                    <h3 class="title">JOSH GOODBODY</h3>
                                    <span class="post">COO</span>

                                </div>
                            </div>
                            <h2>JOSH GOODBODY, <small>COO</small></h2>
                            <p>Operational leader scaling the world’s largest cryptocurrency exchanges (Binance, Huobi
                                Global). 15+ years experience, previously financial markets lawyer.</p>
                        </div><!-- column end -->
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay=".2s"
                             data-wow-duration=".4s">
                            <div class="our-team">
                                <img style="width: 60%"
                                     src="{{asset($asset_path.'images/a5b1f51f-c462-4d7e-b74c-99593fbea929-1623082451-6e28a1e68dfb698555b139577a4b38909f66f23c.png')}}"
                                     alt="team image">
                                <div class="team-content">
                                    <h3 class="title">DUNCAN PAYNE-SHELLEY</h3>
                                    <span class="post">CFO</span>

                                </div>
                            </div>
                            <h2>DUNCAN PAYNE-SHELLEY, <small>CFO</small></h2>
                            <p>Seasoned commercial leader of high growth companies.
                                20+ years experience including Big4 FCA with 13 years M&A. 10 years tech/fintech.
                            </p>
                        </div><!-- column end -->
                        <div class="col-md-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay=".2s"
                             data-wow-duration=".4s">
                            <div class="our-team">
                                <img style="width: 60%"
                                     src="{{asset($asset_path.'images/c5a7efa3-7093-4254-ba43-8dad403f39b5-1623082457-6187630d844a42cf50db93ba6cf586c327ec746c.png')}}"
                                     alt="team image">
                                <div class="team-content">
                                    <h3 class="title">BEN WHITBY</h3>
                                    <span class="post">REGULATORY AFFAIRS</span>
                                </div>
                            </div>
                            <h2>BEN WHITBY, <small>REGULATORY AFFAIRS</small></h2>
                            <p>Compliance tech leader. Specialist in Capital Markets, MiFID, Dodd Frank. Developed
                                world’s first Interest Rate Swap trading platform in 2001.
                                Crypto advocate since 2013.

                            </p>
                        </div><!-- column end -->

                    </div>

                    <!-- row end -->
                </div>
                <!-- container end -->
            </div>
        </div>

        <div class="pross-grid t-pross-grid dark-template-light-bg"
             style="background-repeat: no-repeat; background-image: url({{asset($asset_path.'images/44d526c7-17fe-4044-bb36-52b6a4a1f21c-1624917637-aab48b6ad1ab15ef543dff90c5908c9d559621a0.png')}})">
            <div class="b-burger">
                <div class="container text-center">
                    <div class="row mb5">
                        <h2>CORE FUNCTIONALITY</h2>

                        <p>The <strong>QRDO token</strong> provides a means of utility and governance to the Qredo
                            Network. Qredo is
                            designed to include a “user centric” incentive structure that economically favors the
                            participants of the Qredo Network - driving user adoption and utilization of the network.
                            The design takes into consideration the incentives required for each participant to drive a
                            network effect. QRDO can be staked with validators and staking yield earned. Unique to
                            Qredo, unvested QRDO are automatically staked and accrue staking yield.

                        </p>
                        <h2>USER-CENTRIC REWARDS</h2>
                    </div>
                    <!-- row end -->
                    <div class="row">
                        <div class="col-md-1"></div>
                        <!-- row start -->
                        <div class="col-lg-10 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                            <img
                                src="{{asset($asset_path.'images/33ccd51c-5137-45fc-8366-8496fbf66461-1623271129-c9b96bb68ff11af860cf23d4c80e2296baa0bd84.png')}}"
                                alt="why-cryptency"
                                class="cryptency-graph img-responsive  mb2">
                        </div>


                    </div>
                </div>
                <!-- container end -->
            </div>
        </div>

        <div class="pross-grid t-pross-grid dark-template-light-bg shapebg-left">
            <div class="b-burger">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <h2>TOKEN SALE</h2>

                            <div class="s-grid-colLg24">
                                <table class="table">
                                    <tbody class="s-fontSize18 u-fontWeight500">
                                    <tr>
                                        <td class="table-headers"></td>
                                        <td class="table-headers" width="33%" style="text-align: center;"><h3><b>OPTION
                                                    1</b></h3></td>
                                        <td class="table-headers" width="33%" style="text-align: center;"><h3><b>OPTION
                                                    2</b></h3></td>

                                    </tr>
                                    <tr>
                                        <td class="table-headers" style="text-align: right;">SALE DATES</td>
                                        <td>JULY 8, 2021<br>17:00 UTC</td>
                                        <td>JULY 8, 2021 <br>23:00 UTC</td>

                                    </tr>
                                    <tr>
                                        <td class="table-headers" style="text-align: right;">CLIFF</td>
                                        <td>2 MONTHS</td>
                                        <td>6 MONTHS</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers" style="text-align: right;">RELEASE*</td>
                                        <td>0</td>
                                        <td>12 MONTHS WEEKLY</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers" style="text-align: right;">PURCHASE LIMITS</td>
                                        <td>MIN: $100<br>MAX: $500</td>
                                        <td>MIN: $100&nbsp;<br>MAX: $1000</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers" style="text-align: right;">TOTAL SUPPLY</td>
                                        <td colspan="2" style="text-align: center;">1 BILLION TOKENS</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers" style="text-align: right;">% of TOTAL SUPPLY</td>
                                        <td>3%</td>
                                        <td>1%</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers" style="text-align: right;">NUMBER OF TOKENS</td>
                                        <td>30 MILLION</td>
                                        <td>10 MILLION</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers" style="text-align: right;">PRICE PER TOKEN</td>
                                        <td>$0.50</td>
                                        <td>$0.225</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt4">
                        <!-- column end -->
                        <div class="col-md-3"></div>
                        <div class="col-lg-3 col-sm-3">
                            <!-- column start -->
                            <div class="contact-info text-center">
                                <h3 class=" mb3 mt0">Option 1</h3>
                                <p class="s-paddingTop0_5 u-colorWhite">$0.50 per token</p>
                                <p class="s-paddingTop0_5 u-colorWhite">2-month lockup</p>
                                <p class="s-paddingTop0_5 u-colorWhite">Tokens unlock on or around Sept 8, 2021</p>

                                <div class="mb4 mt4">
                                    <div class="s-marginVert3">
                                        <a class="redirect-btn btn-alpha" target="_blank"
                                           href="{{route('presale', ['token_name' => strtolower($token_name)])}}">Buy IN</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <div class="contact-info text-center">
                                <h3 class=" mb3 mt0">Option 2</h3>
                                <p class="s-paddingTop0_5 u-colorWhite">$0.225 per token</p>
                                <p class="s-paddingTop0_5 u-colorWhite">6-month lockup</p>
                                <p class="s-paddingTop0_5 u-colorWhite">12-month weekly linear release</p>

                                <div class="mb4 mt4">
                                    <div class="s-marginVert3">
                                        <a class="redirect-btn btn-alpha" target="_blank"
                                           href="{{route('presale', ['token_name' => strtolower($token_name)])}}">Buy IN</a>
                                    </div>
                                </div>

                            </div>
                            <!-- column start -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="burger white-bg-content">
            <div class="container">
                <!-- container-start -->
                <div class="row text-center">
                    <h2>TOKEN DISTRIBUTION</h2>
                    <h4>TOKEN ALLOCATION</h4>
                </div>
                <div class="row align-item-center">
                    <!-- row start -->
                    <div class="col-md-2"></div>
                    <div class="col-sm-12 col-lg-3">
                        <img
                            src="{{asset($asset_path.'images/172870bc-f812-4c05-95e9-cf54c1617673-1625004032-a29c35a4f7de616898d0f85c68a32f31dc3e5e58.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <img
                            src="{{asset($asset_path.'images/68584507-79d9-42ed-bede-44397accc9e0-1624906816-ce8b39f65d815daad5cbe2c5270477b7985ceb17.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">

                    </div>
                    <!-- column end -->

                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-sm-12 col-md-10">
                        <img
                            src="{{asset($asset_path.'images/abd27262-15d2-42fc-b7fc-4fc3edd389ec-1624570029-d77d30f86cb9979b14e293e15662014d319fce3b.png')}}"
                            alt="why-cryptency" style="width: 90%"
                            class="cryptency-graph img-responsive  mb2">
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-sm-12 col-md-10">
                        <img
                            src="{{asset($asset_path.'images/faf2836f-3787-4e7f-856b-b87ab6179de9-1624890214-95298d344ab2d0da77b780bbc36089cf61c2a41b.png')}}"
                            alt="why-cryptency" style="width: 90%"
                            class="cryptency-graph img-responsive  mb2">
                    </div>

                </div>
            </div>
            <!-- container start -->
        </div>
    </section>
    <div class="pross-grid t-pross-grid dark-template-light-bg"
         style="background-repeat: no-repeat; background-image: url({{asset($asset_path.'images/5f4001dd-f3e2-4f79-9801-7a1ea5c65233-1624891479-3fb74c4bae6b82de5e20ab24e1b6e4fe93950a40.jpg')}})">
        <div class="b-burger">
            <div class="container text-center">
                <h2>STRATEGIC PARTNERS</h2>
                <h5>BUILDING APPLICATIONS ON QREDO</h5>
                <!-- row end -->
                <div class="row mt5">
                    <div class="col-md-1"></div>
                    <!-- row start -->
                    <div class="col-lg-10 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <img
                            src="{{asset($asset_path.'images/3edaf044-9b5c-4033-b22d-0090eb9e8536-1625582990-974cfa4f77019e494d693906391aca2d1c5862cc.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">
                    </div>
                </div>
                <div class="row mt5">
                    <h2>BACKED BY CRYPTO'S FINEST</h2>
                    <div class="col-md-1"></div>

                    <img
                        src="{{asset($asset_path.'images/f0c6fe57-7afa-4ac1-9292-99c5aabedc68-1624642502-8d72605f7baac5f884719b6ee8e4406dafc4351e.png')}}"
                        alt="why-cryptency"
                        class="cryptency-graph img-responsive  mb2">
                </div>
            </div>
            <!-- container end -->
        </div>
    </div>
    <div class="pross-grid t-pross-grid white-bg-content">
        <div class="b-burger">
            <div class="container text-center">
                <div class="row mb5">
                    <h2>QREDO MAINNET IS LIVE</h2>

                    <p>The Qredo Network went live in November 2020. Since then, the network effect has continued to
                        take hold. Qredo has onboarded asset managers and hedge funds, partnered with Derbit, Celsius
                        and top tier PMS HedgeGuard, and attracted partners from some of the biggest names in crypto.
                    </p>
                    <p>
                        Qredo is standing by ready to welcome new members.
                    </p>
                    <h2>CUSTOMER SOLUTIONS</h2>
                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-md-1"></div>
                    <!-- row start -->
                    <div class="col-lg-10 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <img
                            src="{{asset($asset_path.'images/973f7cb2-a068-48d4-881e-69199bf176a7-1623078729-a0549bdbb647c741a69dd987ebaaffbd0a15552e.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">
                    </div>


                </div>
            </div>
            <!-- container end -->
        </div>
    </div>


    <section class="burger dark-template-bg" id="reviews">
        <div class="container">
            <!-- container-start -->
            <div class="row">
                <!-- row-start -->
                <div class="col-lg-12 reviews">
                    <!-- column start -->
                    <h2 class=" text-center mb5 wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1s">
                        Testimonials</h2>
                    <i class="hudge-quote fa fa-quote-left wow fadeInUp" data-wow-delay=".4s"
                       data-wow-duration=".4s"></i>
                    <div id="myCarousel" class=" carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators ">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".5s">
                                <div class="media">
                                    <div class="media-left"><img
                                            src="{{asset($asset_path.'images/ee000df4-73c0-406e-af23-f99f6418d622-1623162145-a2443b5592cb7256bfa524aae86667774c8c6f99.png')}}"
                                            alt="author"></div>
                                    <div class="media-body media-middle">
                                        <p>"We are excited to see Qredo bring better speed, security and compliance into
                                            DeFi and provide a new way for institutions to interact with crypto.”
                                        </p>
                                        <span class="author-name text-muted"><strong>- Alex Mashinsky</strong> CEO Celsius Network</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="media">
                                    <div class="media-left "><img
                                            src="{{asset($asset_path.'images/8a72558f-0418-412b-b72d-189a4fa042a4-1623162158-fcbf5e8b7b0081e466870bb8b893d703ba56440a.png')}}"
                                            alt="author"></div>
                                    <div class="media-body media-middle">
                                        <p>“We look forward to seeing Qredo build out streamlined custodial services...
                                            we are closer than ever to professionalizing DeFi and evolving financial
                                            services fit for Web 3.0.”</p>
                                        <span class="author-name text-muted"><strong>- John Jansen</strong> CEO Deribit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="media">
                                    <div class="media-left "><img
                                            src="{{asset($asset_path.'images/f07819de-ea84-4439-9958-08cc89c5b65f-1623162165-5e4befcd59794f9fffb41ea86ca6687e5426d5e4.png')}}"
                                            alt="author"></div>
                                    <div class="media-body media-middle">
                                        <p>"Qredo provides a more efficient way for institutions to manage and swap
                                            their native assets — with seamless access to DeFi opportunities wherever
                                            they exist.”</p>
                                        <span class="author-name text-muted"><strong>- Joe DeTommaso</strong> Investment Portfolio Manager,  CMS Holdings Network</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="media">
                                    <div class="media-left "><img
                                            src="{{asset($asset_path.'images/a6c217d6-df37-40e2-89d5-c205b00332ad-1623162198-8df690431f3db4ef6f26c9b9dd83eaa3f50b4e26.png')}}"
                                            alt="author"></div>
                                    <div class="media-body media-middle">
                                        <p>“Qredo's radical new infrastructure is aligned with our own goal of making
                                            crypto trading and investment easier, fairer, and more efficient for
                                            everyon</p>
                                        <span class="author-name text-muted"><strong>- Jack Tan</strong> Co-CEO and Co-Founder, <br/>
Kronos Research & Wootrade</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <i class="hudge-quote fa fa-quote-right wow fadeInUp" data-wow-delay=".6s"
                       data-wow-duration=".6s"></i>
                </div>
                <!-- column end -->
            </div>
            <!-- row end -->
        </div>
        <!-- row container -->
    </section>

    <div class="pross-grid t-pross-grid dark-template-light-bg"
         style="background-repeat: no-repeat; background-image: url({{asset($asset_path.'images/75ad5889-15e6-4b5e-a38d-4838f5564be5-1624910503-02d154395f2618239333d1c8d7102c6785b27a0f.png')}})">
        <div class="b-burger">
            <div class="container text-center">
                <h2>MARKET POSITION</h2>
                <!-- row end -->
                <div class="row mt5">
                    <div class="col-md-1"></div>
                    <!-- row start -->
                    <div class="col-lg-10 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <img
                            src="{{asset($asset_path.'images/c3948e71-6d01-4aa3-8a06-8f3b89530d06-1624910555-c54c5cc698c874c26ee9193e3083e4ce318e7490.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">
                    </div>
                </div>

            </div>
            <!-- container end -->
        </div>
    </div>
    <div class="pross-grid t-pross-grid white-bg-content">
        <div class="b-burger">
            <div class="container text-center">
                <div class="row mb5">
                    <h2>QREDO TECHNOLOGY</h2>

                    <p style="font-size: 20px">Qredo has built the first decentralized trustless MPC custodial network.
                        This allows Qredo to
                        deliver fast, low cost native cross-chain swaps and settlement. Qredo bridges the multichain
                        universe with cross-platform liquidity.
                    </p>
                    <p style="font-size: 20px">
                        The pillars of innovation are:
                    </p>
                </div>
                <!-- row end -->
                <div class="row">
                    <!-- row start -->
                    <div class="col-lg-4 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <img
                            src="{{asset($asset_path.'images/506cc79d-307f-4044-b2dd-e2b5c3fe4c0c-1624912486-b465277799ddc84b8ea24ef056bccafa6afa378f.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <img
                            src="{{asset($asset_path.'images/9ffaf3da-df8b-43fa-9631-7e42f999f363-1624912502-06cd8a82b8622ca46ad913d37920a028201710cf.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <img
                            src="{{asset($asset_path.'images/2552dc41-ead3-4437-82b0-31024d96d69d-1624912516-8a9968ad965d9f366b21e5a06f58e09a9f874419.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">
                    </div>

                </div>
            </div>
            <!-- container end -->
        </div>
    </div>

    <!--============ CTA end ==============-->
    <section class=" burger dark-template-bg " id="white-paper">
        <div class="container">
            <!-- container-start -->
            <div class="row align-item-center">
                <!-- row start -->
                <div class="col-lg-5">
                    <!-- column start -->
                    <h2 class="wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1s">AUDITED, VERIFIED &
                        INSURED</h2>
                    <div class="wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".4s">
                        <p class="big-pera">SECURITY AUDITED: <strong>QUANTSTAMP</strong>
                            <br/>
                            TRAIL OF BITS: <strong>NCCGROUP</strong><br/>
                            INSURED <strong>LLOYDS OF LONDON AND MARSH</strong><br/>
                            PEN TESTED: <strong>ZOKYO</strong><br/>


                            PEER REVIEWED: <strong>DR MICHAEL SCOTT</strong></p>
                    </div>
                    <a href="{{route('presale', ['token_name' => strtolower($token_name)])}}" class="redirect-btn btn-alpha mt2 wow fadeInUp" data-wow-delay=".5s"
                       data-wow-duration=".5s">JOIN NOW</a>
                </div>
                <!-- column end -->
                <div class="col-sm-12 col-lg-6 col-lg-offset-1">
                    <!-- column start -->
                    <div class="benifit-box ml0">
                        <div class="row">
                            <!-- row start -->
                            <div class="media-item col-sm-6 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".3s">
                                <!-- column start -->
                                <a href="http://www.qredo.com/qredo-lite-paper" target="_blank">
                                    <div class="media mb3">
                                        <img src="{{asset($asset_path.'images/pdf.svg')}}" alt="Whitepaper"
                                             class="pull-left" width="50">
                                        <div class="media-body">
                                            <h3>Lite White Paper</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- column end -->
                            <div class="col-sm-6 media-item wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".4s">
                                <!-- column start -->
                                <a href="http://www.qredo.com/qredo-white-paper" target="_blank">
                                    <div class="media mb3">
                                        <img src="{{asset($asset_path.'images/pdf.svg')}}" alt="One Pager"
                                             class="pull-left" width="50">
                                        <div class="media-body">
                                            <h3>White Paper</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- column end -->
                        </div>
                        <!-- row end -->
                        <div class="row">
                            <!-- row start -->
                            <div class="col-sm-6 media-item wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".5s">
                                <!-- column start -->
                                <a href="http://www.qredo.com/qredo-token-paper" target="_blank">
                                    <div class="media ">
                                        <img src="{{asset($asset_path.'images/pdf.svg')}}" alt="Marketing Plan"
                                             class="pull-left" width="50">
                                        <div class="media-body">
                                            <h3>Token Economics</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- column end -->
                            <div class="col-sm-6 media-item wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".6s">
                                <!-- column start -->
                                <a href="http://www.qredo.com/messari-analyst-report" target="_blank">
                                    <div class="media ">
                                        <img src="{{asset($asset_path.'images/pdf.svg')}}" alt="Legal" class="pull-left"
                                             width="50">
                                        <div class="media-body">
                                            <h3>Independent Analyst Report</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- column end -->
                        </div>
                        <!-- row end -->
                    </div>
                </div>
                <!-- column end -->
            </div>
            <!-- row-end -->
        </div>
        <!-- conatainer-end -->
    </section>
    <!--=================== white-paper-section-end=============== -->

    <div class="pross-grid t-pross-grid white-bg-content">
        <div class="b-burger">
            <div class="container text-center">
                <h2>MILESTONES ACHIEVED</h2>
                <!-- row end -->
                <div class="row mt5">
                    <div class="col-md-2"></div>
                    <!-- row start -->
                    <div class="col-lg-10 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <img
                            src="{{asset($asset_path.'images/953acc2a-839a-4e53-904c-e6671c68aa82-1624912268-d72ac75c8f0723dadc074d4cf0ff8b6bc7b001d3.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">
                    </div>
                </div>


            </div>
            <!-- container end -->
        </div>
    </div>
    <div class="pross-grid t-pross-grid white-bg-content"
         style="background-image: url({{asset($asset_path.'images/75ad5889-15e6-4b5e-a38d-4838f5564be5-1624910503-02d154395f2618239333d1c8d7102c6785b27a0f.png')}})">
        <div class="b-burger">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-2"></div>

                    <div class="col-md-9">
                <h2 style="color: #ffffff">PROUD CONTRIBUTOR TO THE APACHE MILAGRO PROJECT</h2>
                <!-- row end -->
                <p class="" style="font-size: 20px; color: #ffffff">
                    Qredo believes in the power of digital assets to revolutionize markets, opening prosperity for all.
                    By applying expertise in research-led technical innovation, Qredo helps the visionaries and pioneers
                    accelerate the transition to a global capital market powered by digital assets.
                </p>
                <p style="font-size: 20px; color: #ffffff">
                    Qredo is a proud contributor to the open source community. Qredo's commitment to the Apache Milagro
                    project provides core security infrastructure for decentralized networks and distributed systems.
                    Unlike closed solutions, the cryptography that powers Qredo's MPC is open source, highly audited and
                    open to public scrutiny. Qredo is supported by a full SDK and API Library that enable anyone to
                    build Dapps powered by the network.

                </p>
                    </div>
                </div>
                <div class="row mt5">
                    <div class="col-md-5"></div>
                    <!-- row start -->
                    <div class="col-lg-5 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <img
                            src="{{asset($asset_path.'images/773efa21-a881-4bec-8c09-23680c57472c-1623112329-fa0e9ab879ec01651a86fdf1c4135579dab3cfb9.png')}}"
                            alt="why-cryptency"
                            class="cryptency-graph img-responsive  mb2">
                    </div>
                </div>

            </div>
            <!-- container end -->
        </div>
    </div>

    <!--=================== Faq-section-end=============== -->

@endsection
