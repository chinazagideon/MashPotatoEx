@extends('appV1.tokens.casper.layouts.nav')
@section('page_title', 'Casper')
@section('content')
    <style>
        table td {
            width: 10%;
            border: 3px solid #ff0008;
            padding: 10px
        }

        table thead {
            width: 10%;
            border: 3px solid #ff0008;
        }

        .auction-table table {
            width: 20%;
            border: 3px solid #ea00ff !important;
            padding: 10px;
        }
    </style>
    <section>
        <div class="block remove-top">
            <div data-velocity="-.1"
                 style="background: url('{{asset($asset_path.'images/7e879736-2e87-427a-b9ed-7b57012be8ac-1612800255-c835e884f15989cc1303f52b2735debc4b700405.png')}}') repeat scroll 50% 422.28px transparent;"
                 class="parallax no-parallax scrolly-invisible"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="fsec">
                            <div class="fimg animute wow fadeIn" data-wow-delay="0.2s">
                                <img
                                    src="{{asset($asset_path.'images/7e879736-2e87-427a-b9ed-7b57012be8ac-1614199444-6abc391d8666c217fee4648d4ab60b641cefdda2.png')}}"
                                    style="width: 80%"
                                    alt=""/>
                            </div>
                            <div class="finfos wow fadeIn" data-wow-delay="0s">
                                <h3>The Future-Proof Blockchain <br> Built for<strong> Enterprise Adoption</strong></h3>
                                <p>Casper is a proof of stake <br> blockchain network optimized<br> for enterprise and
                                    developer adoption.</p>

                                <iframe id="youtube-4355" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" title="Player for " width="640" height="360" src="https://www.youtube.com/embed/p4J7LMif3bA?autoplay=0&amp;controls=0&amp;disablekb=1&amp;playsinline=1&amp;cc_load_policy=0&amp;cc_lang_pref=auto&amp;widget_referrer=https%3A%2F%2Fpennhaven.co%2Fcasper&amp;noCookie=false&amp;rel=0&amp;showinfo=0&amp;iv_load_policy=3&amp;modestbranding=1&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fcoinlist.co&amp;widgetid=1"></iframe>
                                <div class="social">
                                    <a href="index5.html#" title=""><i class="fa fa-facebook"></i></a>
                                    <a href="index5.html#" title=""><i class="fa fa-twitter"></i></a>
                                    <a href="index5.html#" title=""><i class="fa fa-youtube"></i></a>
                                    <a href="index5.html#" title=""><i class="fa fa-github"></i></a>
                                    <a href="index5.html#" title=""><i class="fa fa-bitcoin"></i></a>
                                </div>
                            </div>

                        </div>
                        <div class="clsec" id="five">
                            <div class="cl wow fadeIn" data-wow-delay="0s"><a href="#" title=""><img
                                        src="{{asset($asset_path.'images/resource/logo1.png')}}" alt=""/></a></div>
                            <div class="cl wow fadeIn" data-wow-delay="0.2s"><a href="#" title=""><img
                                        src="{{asset($asset_path.'images/resource/logo2.png')}}" alt=""/></a></div>
                            <div class="cl wow fadeIn" data-wow-delay="0.4s"><a href="#" title=""><img
                                        src="{{asset($asset_path.'images/resource/logo3.png')}}" alt=""/></a></div>
                            <div class="cl wow fadeIn" data-wow-delay="0.6s"><a href="#" title=""><img
                                        src="{{asset($asset_path.'images/resource/logo4.png')}}" alt=""/></a></div>
                            <div class="cl wow fadeIn" data-wow-delay="0.8s"><a href="#" title=""><img
                                        src="{{asset($asset_path.'images/resource/logo5.png')}}" alt=""/></a></div>
                        </div>
                        <div class="scrolldown"><a href="#scrolldown" title="">Scroll Down</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="one">
        <div class="block" id="scrolldown">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center offset-md-2">
                        <div class="why-info s2 wow fadeIn" data-wow-delay="0s">
                            <h3>About {{$token_name}}</h3>
                            <p>Casper is a proof of stake blockchain network optimized for enterprise and developer
                                adoption. The Casper Network is the first live blockchain built off the
                                Correct-by-Construction (CBC) Casper specification, allowing the network to create
                                sustainable new markets and unlock value by tokenizing nearly any asset without
                                compromising performance or security. Activity on Casper is governed by CSPR, the
                                network’s native token. </p>
                            {{--                            <a class="fancybtn" href="http://youtu.be/SSo_EIwHSd4" title="">--}}
                            {{--                                <span class="pulse"><img src="{{asset($asset_path.'images/icon5.png')}}" alt=""/></span>--}}
                            {{--                                <strong>Watch Video</strong><br/>--}}
                            {{--                                <i>What and How it work</i>--}}
                            {{--                            </a>--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="two">
        <div class="block">
            <div class="container">

                <div class="row">

                    <div class="col-lg-6">
                        <div class="whytoken s2 lowgape">
                            <h3 class=" wow fadeIn" data-wow-delay="0s">CBC Casper</h3>
                            <p class=" wow fadeIn" data-wow-delay="0.2s">Early Ethereum developers designed CBC Casper
                                to bring finality and flexibility to blockchain-based consensus protocols. Finality
                                increases security as it guarantees past decisions are irreversible and makes decisions
                                deterministic rather than probabilistic. Furthermore, Casper is flexible and block times
                                can adjust based on network conditions. These benefits make transaction settlement
                                faster and improves users’ confidence in the protocol’s data output.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="whytoken s2 lowgape">
                            <h3 class=" wow fadeIn" data-wow-delay="0s">Enterprise Grade</h3>
                            <p class=" wow fadeIn" data-wow-delay="0.2s">The protocol is designed for enterprise
                                adoption with focuses on flexible privacy permissions, low latency, and security. Casper
                                allows enterprises to choose between public, permissioned, and private network
                                iterations depending on their confidentiality preferences without sacrificing security
                                or performance. This has attracted multiple enterprise and Web3 teams to develop
                                partnerships with Casper.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-top remove-bottom">
            <div class="container fluid expadding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="countsec text-center">
                            <h3 class=" wow fadeIn" data-wow-delay="0s">Future Proof</h3>
                            <p class=" wow fadeIn" data-wow-delay="0.2s">Casper is built to withstand changing business
                                and developer preferences. Upgradeable contracts ensure devs and enterprises can improve
                                their applications over time; Stable/predictable gas fees ensure apps remain performant
                                even when network activity spikes; WebAssembly support ensures non-crypto devs can
                                onboard quickly; On-chain governance mechanisms ensure governance based on network
                                contribution and reputation.</p>
                            <a class="g1 theme-btn offset-md-5" href="https://casper.network/" target="_blank" title="">Learn More About Casper
                                Now</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="distisec">
                            <h3>Sale Options</h3>
                            <p class=" wow fadeIn"
                               data-wow-delay="0.2s">
                                Sale participants may choose to purchase CSPR tokens under the three different options
                                below. Options may be combined. To register for the sale, please click on the options
                                you would like to participate in and follow the registration and KYC flows below. The
                                allocation will be as follows:

                            </p>
                            <div class="">
                                <table class="table">
                                    <tbody class="s-fontSize18 u-fontWeight500">
                                    <tr>
                                        <td class="table-headers"></td>
                                        <td class="table-headers">Option 1</td>
                                        <td class="table-headers">Option 2</td>
                                        <td class="table-headers">Option 3</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers">Sale Dates</td>
                                        <td>March 23-28, 2021	</td>
                                        <td>March 25-28, 2021	</td>
                                        <td>March 26-28, 2021	</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers">Lockup</td>
                                        <td>12 months</td>
                                        <td>6 months</td>
                                        <td>40 days</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers">Release</td>
                                        <td>6 months from March 28, 2022</td>
                                        <td>6 months from September 28, 2021</td>
                                        <td>Freely trading 40 days from March 28, 2021</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers">Purchase Limits</td>
                                        <td>
                                            $100 min
                                            <br>
                                            $1K max*
                                        </td>
                                        <td>
                                            $50K min
                                            <br>
                                            $250K max*
                                        </td>
                                        <td>
                                            $100 min
                                            <br>
                                            $5K max*
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers">% of Total Supply</td>
                                        <td>8.0%*	</td>
                                        <td>4.0%*	</td>
                                        <td>4.0%*	</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers">Num of Tokens</td>
                                        <td>800M</td>
                                        <td>400M	</td>
                                        <td>400M	</td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers">Price per Token</td>
                                        <td>$0.015</td>
                                        <td>$0.02</td>
                                        <td>$0.03</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <br/>
                            <p>* Supplies and sale caps for all three options were updated as of March 10, 2021 per
                            </p>
                        </div>
                    </div>
                </div>
                <br/>
                <br/>
                <div class="row ">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="ser wow fadeIn" data-wow-delay="0s">
                            <h5>Option 1</h5>
                            <ul class="c-list s-fontSize18">
                                <li class="s-paddingTop1 u-colorWhite">Starts March 23</li>
                                <li class="s-paddingTop0_5 u-colorWhite">$0.015 per token</li>
                                <li class="s-paddingTop0_5 u-colorWhite">12 month lockup</li>
                            </ul>
                            <a class="g1 theme-btn offset-md-3" href="{{route('presale', ['token' => strtolower($token_name)])}}" title="">Buy In</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="ser wow fadeIn" data-wow-delay="0s">
                            <h5>Option 2</h5>
                            <ul class="c-list s-fontSize18">
                                <li class="s-paddingTop1 u-colorWhite">Starts March 25</li>
                                <li class="s-paddingTop0_5 u-colorWhite">$0.02 per token</li>
                                <li class="s-paddingTop0_5 u-colorWhite">6 month lockup</li>
                            </ul>
                            <a class="g1 theme-btn offset-md-3" href="{{route('presale', ['token' => strtolower($token_name)])}}" title="">Buy In</a>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 align-self-center">
                        <div class="ser wow fadeIn" data-wow-delay="0s">
                            <h5>Option 3</h5>
                            <ul class="c-list s-fontSize18">
                                <li class="s-paddingTop1 u-colorWhite">Starts March 26</li>
                                <li class="s-paddingTop0_5 u-colorWhite">${{$sales_data->price_per_token}} per token</li>
                                <li class="s-paddingTop0_5 u-colorWhite">Freely trading</li>
                            </ul>
                            <a class="g1 theme-btn offset-md-3" href="{{route('presale', ['token' => strtolower($token_name)])}}" title="">Buy In</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="distisec">
                            <h3>CSPR Economics</h3>
                            <p class=" wow fadeIn"
                               data-wow-delay="0.2s">
                                CSPR is the native token for the Casper network. Network participants use it to pay
                                computation fees and it rewards validators who process network transactions. To deliver
                                superior performance and scalability, Casper employs a proof of stake model.
                            </p>
                            <p class=" wow fadeIn"
                               data-wow-delay="0.2s">
                                No single individual or entity may acquire more than 1% of the tokens through the public
                                token sale. The tokens will be allocated in the following fashion (subject to applicable
                                laws and regulations):
                            </p>
                            <div class="">
                                <img
                                    src="{{asset($asset_path.'images/f0335bc2-57d5-41f0-a4b3-4b7547ed1b5d-1615401207-3e2ece7825e36e27b02ae33bf7581b77a939dd42.png')}}"
                                    style="width: 100%"
                                    alt="casper">
                                <img
                                    src="{{asset($asset_path.'images/11848c59-d6fc-4a0d-9837-d2ea8db0b659-1615401221-287553100e5945c09902435c612811f394ee821d.png')}}"
                                    style="width: 100%"
                                    alt="casper">

                            </div>
                            <br/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="distisec">
                            <h3>Sale Details</h3>

                            <div class="">
                                <table class="table text-left">
                                    <tbody>
                                    <tr>
                                        <td class="table-headers">
                                            Asset
                                        </td>
                                        <td class="s-fontSize18 u-fontWeight500">
                                            CSPR
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers s-fontSize18 u-fontWeight700">
                                            Key Dates
                                        </td>
                                        <td class="s-fontSize18 u-fontWeight500">
                                            Option 1: March 23, 2021 00:00 UTC - March 28, 2021 23:59 UTC
                                            <br>
                                            Option 2: March 25, 2021 00:00 UTC - March 28, 2021 23:59 UTC
                                            <br>
                                            Option 3: March 26, 2021 00:00 UTC - March 28, 2021 23:59 UTC
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-headers s-fontSize18 u-fontWeight700">
                                            Supply Distributed from Token Sale
                                        </td>
                                        <td class="s-fontSize18 u-fontWeight500">
                                            Total Supply at Genesis: 10B tokens
                                            <br>
                                            <br>
                                            Sale Supply:
                                            <br>
                                            • Option 1 - 800M tokens
                                            <br>
                                            • Option 2 - 400M tokens
                                            <br>
                                            • Option 3 - 400M tokens
                                            <br>
                                            <br>
                                            Please note: Supplies for all three options were updated as of March 10, 2021 per </td></tr>
{{--                                    <tr>--}}
{{--                                        <td class="table-headers s-fontSize18 u-fontWeight700">--}}
{{--                                            Eligible Participants--}}
{{--                                        </td>--}}
{{--                                        <td class="s-fontSize18 u-fontWeight500">--}}
{{--                                            Non-US, non-Chinese, and non-Canadian residents. Excludes--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}

                                    </tbody>
                                </table>

                            </div>
                            <br/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="three">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="roadmapsec lshort">
                            <h3>Road Map</h3>

                            <ul class="roadcontent">
                                <li>
                                    <div class="rmcontent">
                                        <div class="roadmap wow fadeInUp" data-wow-delay="0s"><i class="cl1"></i>
                                            <h3>July 2019</h3>
                                            <strong>$14.5M Series A</strong>
                                            <br/>
                                            <p>Equity only. Round led by Terren Piezer with participation from Consensus
                                                Capital, Digital Strategies, and more

                                            </p>
                                        </div><!-- RoadMap -->
                                        <div class="roadmap wow fadeInUp" data-wow-delay="0.2s"><i class="cl2"></i>
                                            <h3>September 2020</h3>
                                            <strong>Casper Network $14M Private Validator CSPR Token Sale - Round
                                                1</strong>
                                            <br/>
                                            <p>$0.0100 per CSPR; 3-month required staking period from mainnet launch,
                                                followed by three-month unbonding period
                                            </p>
                                        </div><!-- RoadMap -->
                                        {{--                                        <div class="roadmap wow fadeInUp" data-wow-delay="0.4s"><i class="cl3"></i>--}}
                                        {{--                                            <h3>October 2018</h3>--}}
                                        {{--                                            <p>Start Token Sale Round (1)</p></div><!-- RoadMap -->--}}
                                        <div class="roadmap wow fadeInUp" data-wow-delay="0.6s"><i class="cl4"></i>
                                            <h3>January 2021</h3>
                                            <strong>Casper Network $11.9M Private Validator CSPR Token Sale - Round 2
                                            </strong>
                                            <p>$0.0150 per CSPR; 3-month required staking period from mainnet launch,
                                                followed by three-month unbonding period</p>

                                        </div><!-- RoadMap -->
                                        {{--                                        <div class="roadmap wow fadeInUp" data-wow-delay="0.8s"><i class="cl5"></i>--}}
                                        {{--                                            <h3>May 2019</h3>--}}
                                        {{--                                            <p>Priority opening for Token holder</p></div><!-- RoadMap -->--}}
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="five">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="partnersec">
                            <div class="clsec">
                                <div class="cl wow fadeIn" data-wow-delay="0s"><a href="#" title=""><img
                                            src="{{asset($asset_path.'images/fa7be189-6902-403b-b93e-7e49eee0fc67-1614046086-4e1452a71e185b22039285c0c56e4e342149c5a3.jpeg')}}"
                                            style="width: 80%" alt=""/></a></div>
                                <div class="cl wow fadeIn" data-wow-delay="0.2s"><a href="#" title=""><img
                                            src="{{asset($asset_path.'images/63e0d27e-a065-42de-902c-6f0c8f4c98e7-1614046108-a3c501ba052d2e27b1ee63733f9cba416e2d2cc2.jpeg')}}"
                                            style="width: 80%" alt=""/></a></div>
                                <div class="cl wow fadeIn" data-wow-delay="0.4s"><a href="#" title=""><img
                                            src="{{asset($asset_path.'images/b74bf934-7794-494d-9212-d7f107f7481a-1614046094-2dcad1a66ea9e88f34f475dc683fa820c40dd87b.png')}}"
                                            style="width:80%" alt=""/></a></div>
                                <div class="cl wow fadeIn" data-wow-delay="0.6s"><a href="#" title=""><img
                                            src="{{asset($asset_path.'images/e9d92cdb-ca6a-40a0-b1d2-fa2bd4d2977a-1614046101-c9e24c2631d32d7137b07113cde8fafe0d9d9b04.png')}}"
                                            style="width: 80%" alt=""/></a></div>
                                <div class="cl wow fadeIn" data-wow-delay="0.8s"><a href="#" title=""><img
                                            src="{{asset($asset_path.'images/0b508e0c-353e-43b0-84f8-00febd1d5326-1614142352-a9230eed772992d504aed7b905868effe9882eda.png')}}"
                                            style="width: 80%" alt=""/></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="whyussec">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="t">Casper Technology</h3>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <h3>CBC-Casper Proof of Stake</h3>
                                        <p>Casper was built off the original CBC Casper specifications designed by
                                            Ethereum developers. Meanwhile, proof-of-stake validates transactions
                                            quickly while maintaining decentralization that scales for real-world
                                            business.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <h3>Enterprise Optimized</h3>
                                        <p>Businesses can choose to build private or permissioned applications on the
                                            network, providing enterprise applications with both the confidentiality of
                                            a private network and the security of a public one.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <h3>Upgradeable Contracts</h3>
                                        <p>Casper enables on-chain smart contracts to be directly upgraded, removing the
                                            need for complex and migration processes and making it easier to patch smart
                                            contract vulnerabilities.

                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <h3>Concurrent Execution</h3>
                                        <p>
                                            Concurrent execution allows greatly increased throughput with
                                            load-balancing. Instead of tasks waiting on other tasks, they can execute
                                            simultaneously, thereby increasing the speed of the network.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <h3>Stable Gas Fees</h3>
                                        <p>
                                            Casper incentivizes active and diverse network behavior by establishing
                                            consistent, predictable, and transparent gas costs - eliminating volatility
                                            and improving both developer and user experience.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <h3>WebAssembly Support</h3>
                                        <p>
                                            Casper supports developers building with WebAssembly. The network’s
                                            development ecosystem is designed to be familiar to existing Web2 developers
                                            instead of being written in a proprietary language.
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <h3>Weighted Keys</h3>
                                        <p>
                                            Full access control mechanism over contracts, deployments, and accounts
                                            means that permissions in your business carry over onto your blockchain.
                                            Staff interactions with the blockchain match what they are authorized to do
                                            in the office.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <h3>Sharding</h3>
                                        <p>
                                            Casper’s PoS architecture enables sharding, a database-scaling solution. The
                                            network optimizes performance by breaking down the workload into smaller,
                                            faster groups of validator nodes called “shards” and distributing work
                                            across them.


                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr/>
    <section class="">
        <div class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="whyussec">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="t">Casper In Use</h3>
                                    <p>Casper has partnered with enterprises and Web3 development teams across
                                        industries to build performant, scalable, and secure blockchain-based
                                        solutions.</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <img
                                            src="{{asset($asset_path.'images/4eadfd79-8075-4a13-a3aa-bf068e202595-1614047206-928d406d1814fab76f950e5a038463caa5942681.jpg')}}"
                                            alt="" style="width: 60%"/>

                                        <p>IPwe is building a chain of custody (CoC) solution for public patent records
                                            on Casper. The solution will use Casper to store, secure, and trace patent
                                            data, with the goal of creating a Global Patent Registry that brings the
                                            current process of granting, publishing, owning, transfering, and pledging
                                            patents onto the Casper blockchain.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <img
                                            src="{{asset($asset_path.'images/ef777de5-ec45-4aed-91fc-c5514215c69a-1614047215-cd625fe00c062d9b4cf1392bf13a06f3b0908bbb.jpg')}}"
                                            style="width:40%" alt=""/>
                                        <h3>Legal Compliance</h3>
                                        <p>Casper and Metis have partnered to support Metis’ layer 2 DAO and accelerate
                                            the creation of DAOs and decentralized economies. Previously built on
                                            Ethereum, Metis found themselves hindered by gas costs and network latency;
                                            thus, choosing to build on Casper to leverage its developer friendliness,
                                            upgradeable contracts, and other core features.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <img
                                            src="{{asset($asset_path.'images/44a77b92-b653-4405-b5ce-9d9ff3573676-1614047221-4ec7cfd89cb268ed5a0050c589876de5169f3227.jpg')}}"
                                            alt="" style="width: 50%"/>
                                        <p>Casper and PlasmaPay are introducing a more accessible framework for
                                            cross-border transactions by introducing a fiat on/off ramp for CSPR tokens.
                                            This will support the growing DeFi ecosystem, among other use cases, by
                                            unlocking faster, more secure transactions at scale.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="ybox">
                                        <img
                                            src="{{asset($asset_path.'images/5cf22a76-2f14-475d-9f9a-71b18bfb3267-1614100570-d11a0a95201e1e5ffb4390f775c834e0a7f77060.jpg')}}"
                                            alt="" style="width: 60%"/>
                                        <p>HeraSoft is migrating its gold-backed asset token, Anthem Gold, onto the
                                            Casper Network. This will launch the next phase of asset tracing and token
                                            protocol development on Casper. HeraSoft will also leverage the Casper
                                            Network to continue expanding its enterprise offering of secure,
                                            ransomware-proof technology solutions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="distisec">
                            <div class="">
                                <img
                                    src="{{asset($asset_path.'images/38b7a177-8926-4f02-97a8-042c855cd6d8-1615191336-ed52aeadd047b4e3fd39d1f096d8da16c8d65938.png')}}"
                                    style="width: 90%"
                                    alt="casper">

                            </div>
                            <br/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="background-color: #fafafa !important;">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="distisec">
                            <h3>Roadmap</h3>
                            <div class="">
                                <img
                                    src="{{asset($asset_path.'images/679038f1-8543-411c-aea6-fa057e73eb49-1614280764-516b807984f1b3054641094068f8f65940f89909.png')}}"
                                    style="width: 90%"
                                    alt="casper">

                            </div>
                            <br/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block">
            <div data-velocity="-.2"
                 style="background: url('images/resource/p2.jpg') repeat scroll 50% 422.28px transparent;"
                 class="parallax  scrolly-invisible"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="t white">Team</h3>
                    </div>
                    <div class="col-lg-12">
                        <div class="teamsec">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team wow fadeIn" data-wow-delay="0s">
                                        <img
                                            src="{{asset($asset_path.'images/aae68aa8-dff5-43f1-9310-91303b171cb3-1613628237-3e19826d8d1adee0eea15dab0d88ad2edc38e703.jpeg')}}"
                                            alt=""/>
                                        <h3>MRINAL MANOHAR</h3>
                                        <span>Chief Technology Officer</span>
                                        <span>Technology and finance leader previously with Microsoft, Bain, and Bain Capital. Ran the TMT sector of a $1B+ hedge fund. MS in CS with distinction from Carnegie Mellon University.
                                        </span>
                                    </div><!-- Team -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team wow fadeIn" data-wow-delay="0.2s">
                                        <img
                                            src="{{asset($asset_path.'images/e5c5df0b-9ea6-49ea-8027-dfe32e3dd279-1614041804-a3000ed5f78324309e047a3c588b417ac6d85a4c.jpg')}}"
                                            alt=""/>
                                        <h3>MEDHA PARLIKAR</h3>
                                        <span>Chief Technology Officer</span>
                                        <span>Product and engineering leader with decades of experience delivering production software at marquee companies such as Adobe, Omniture, Avalara, MP3.com and DivX.</span>
                                    </div><!-- Team -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team wow fadeIn" data-wow-delay="0.4s">
                                        <img
                                            src="{{asset($asset_path. 'images/af13bc43-04f9-470a-a7ad-946b0ebe1254-1613628212-1ba0e545c3a8cadc5ce1ac1ed37bd5d2c04f786b.jpeg')}}"
                                            alt=""/>
                                        <h3>CLIFF SARKIN</h3>
                                        <span>Chief Technology Officer</span>
                                        <span>Entrepreneur and former VP of Biz Dev at DNA, a leading early stage crypto fund. Led VideoSurf’s $80M sale to Microsoft. B.A., UC Berkeley ‘01. J.D., Harvard Law School ‘05.</span>
                                    </div><!-- Team -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team wow fadeIn" data-wow-delay="0.6s">
                                        <img
                                            src="{{asset($asset_path.'images/771f912b-f688-4530-b618-bb7ebce49769-1613628222-7fb2206282366faaef6ed603b1d96e58917d7e41.jpg')}}"
                                            alt=""/>
                                        <h3>DR. DANIEL KANE</h3>
                                        <span>Consensus Protocol Advisor</span>
                                        <span>Dr. Kane has earned two Bachelor’s Degrees from MIT and a Ph.D. from Harvard University. He is advising Casper on blockchain cryptography and security.</span>
                                    </div><!-- Team -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team wow fadeIn" data-wow-delay="0.8s">
                                        <img
                                            src="{{asset($asset_path.'images/27156bfc-1364-46a8-bff0-c4d1710cbc6c-1614041794-048cd511ca4b077ff4922525a39fd0316129329c.jpg')}}"
                                            alt=""/>
                                        <h3>ANDREAS FACKLER</h3>
                                        <span>Consensus Researcher</span>
                                        <span>Fackler is an experienced Rust developer and has previously led teams at Google, MaidSafe and Xored’s RCPTT. He has his PhD in Mathematics from Ludwig-Maximilians Universität.</span>
                                    </div><!-- Team -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="team wow fadeIn" data-wow-delay="1s">
                                        <img src="{{asset($asset_path.'images/a8e79b78-422f-47a6-93b6-4d796cdc01d0-1613628217-867d88236cdb5c2809185977f7f9d71025510989.jpg')}}" alt=""/>
                                        <h3>DANIEL MARFURT</h3>
                                        <span>Chief Finance Officer</span>
                                        <span>Daniel is a tech-oriented finance and management expert. Previously he led finance at Status.im, a crypto company with $100M+ market cap. He holds a double MA in Economics and International Management.</span>
                                    </div><!-- Team -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
