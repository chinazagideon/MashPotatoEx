@extends('appV1.tokens.flow.layouts.nav')
@section('page_title', 'Flow')
@section('content')
    <section class="" id="hero">
        <div class="banner burger  align-item-center parallax">
            <div class="container">
                <!-- container-start -->
                <div class="row align-item-center mt3">
                    <!-- row start -->
                    <div class="col-sm-12 col-lg-8  col-md-offset-3 text-center">
                        <img
                            src="{{asset($asset_path.'images/logo-46aa631655ee5f11ca84195284702bc701bed87141956d342f2385056d9a5864.png')}}"
                            alt="Flow"
                            class="img-responsive col-md-offset-2 col-sm-offset-2">
                        <!-- column start-->
                        <div class="banner-text">
                            <h3 class="wow fadeIn" style="color:#000 !important" data-wow-delay="1s" data-wow-duration="2s"><strong
                                    class="text-dark">The platform</strong> for a new generation of games, apps, and the
                                digital assets that power them.</h3>
                            {{--<p class="">Community Sale Closed on Oct 2, 2020<br/>
                                Auction Closed: Oct 6, 2020</p>--}}
                            <div class="mt3 banner-btn-group">
                                <a href="https://www.onflow.org/flow-token-economics" target="_blank"
                                   class="redirect-btn btn-alpha ">TOKENOMICS PAPER </a>
                                <a href="https://www.onflow.org/technical-paper" target="_blank"
                                   class="redirect-btn btn-alpha ">
                                    TECHNICAL PAPERS </a>
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
        <div class="about-cryptency burger">
            <div class="container">
                <!-- container-start -->
                <div class="row align-item-center">
                    <!-- row start -->
                    <div class="col-sm-5 col-sm-offset-1 col-sm-push-6">
                        <!-- column start -->
                        <img
                            src="{{asset($asset_path.'images/highlights-9768f3b6df69bf71fcd983372c17c88507b93f98a36c2e63a5246d85785694bc.gif')}}"
                            alt="frame"
                            class="cryptency-graph img-responsive">
                    </div>
                    <!-- column end -->
                    <div class="col-sm-6 col-sm-pull-6">
                        <!-- column start -->
                        <h2>Key Highlights</h2>

                        <div class="check-list mt2">
                            <div class="media">
                                <div class="media-body">
                                    <h4><strong>Seamless Onboarding:</strong> Designed from the ground up for mainstream
                                        adoption, Flow
                                        is the only blockchain that builds usability improvements into the protocol
                                        layer.</h4>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <h4><strong>Balanced Native Token Design:</strong> FLOW token is required for
                                        staking and
                                        participation on the platform for purposes of earning transaction fees and
                                        rewards.</h4>
                                </div>
                            </div>
                            <div class="media">
                                <div class="">
                                    <h4 class=""><strong>Built-in User Base:</strong> Top developers and some of the
                                        world's biggest brands are
                                        already building on Flow, enabling completely new experiences with top-tier
                                        content.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </div>

        <div class="about-cryptency light-bg ">
            <div class="container">
                <!-- container-start -->
                <div class="row align-item-center">
                    <!-- row start -->

                    <!-- column end -->
                    <div class="col-sm-12 text-center">
                        <br/>
                        <br/>
                        <br/>
                        <!-- column start -->
                        <h2>Flow Architecture</h2>

                        <div class="mt2 p-4" style="font-size: 23px;">
                            <p>Traditional blockchains force every node to store the entire state of the network and
                                perform all the work associated with processing every transaction in the chain.
                            </p>
                            <p class="mt-2">
                                Flow blockchain allows nodes to specialize into four “horizontal” roles, based on their
                                financial stake and hardware capabilities (Collection, Consensus, Execution, and
                                Verification). Analogous to modern CPU architectures, Flow pipelines work to each of
                                these node types.
                            </p>
                            <p class="mt-2">
                                This protocol design allows Flow to achieve high performance and low cost without
                                compromising on decentralization or breaking up the network through sharding.</p>

                            <div class="mt3 banner-btn-group mb4">
                                <a href="https://www.onflow.org/primer" target="_blank" class="redirect-btn btn-alpha ">Learn
                                    More </a>
                            </div>
                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </div>
        <div class="about-cryptency burger">
            <div class="container">
                <!-- container-start -->
                <div class="row align-item-center">
                    <!-- row start -->
                    <div class="col-md-6">
                        <!-- column start -->
                        <img
                            src="{{asset($asset_path.'images/mission_diagram-2323fa222c36b65b9d21999e9f876383e5bd657f1e9f89a4bc6952a60dd81efd.png')}}"
                            alt="frame"
                            class="cryptency-graph img-responsive">
                    </div>
                    <!-- column end -->
                    <div class="col-md-5">
                        <!-- column start -->
                        <h2>Our Mission: Mainstream Adoption</h2>

                        <div class="check-list mt2">
                            <div class="media">
                                <p>Flow's community ethos is to increase adoption of crypto through practical
                                    understanding – by building products people can use that provide them tangible
                                    value.
                                </p>
                                <p>
                                    Developers are already building new kinds of games, social networks, consumer
                                    finance products – and everything in between – on Flow.
                                </p>
                                <p>
                                    Crypto apps are like lego blocks – everything someone builds can be remixed and
                                    built upon by someone else. What will you build on Flow?
                                </p>
                            </div>

                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </div>
        <!--========= why-cryptency-end====== -->
        <div class="burger about-special" id="special-about">
            <div class="container">
                <!-- container-start -->
                <div class="row align-item-center">
                    <!-- row start -->
                    <div class="col-sm-12 col-lg-7">
                        <!-- column start -->
                        <div class="">
                            <div class="benifit-contant">
                                <h2 class="mt0">Developer-first Experience</h2>
                                <p class="big-pera">Made by the creators of some of the most popular apps on existing
                                    crypto networks, Flow makes building new apps and protocols safe, fast, and
                                    efficient. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- column end -->
                    <div class="col-sm-12 col-lg-5 ">
                        <!-- column start -->
                        <div class="benifit-box">
                            <div class="row">
                                <!-- row start -->
                                <div class="media-item col-sm-6">
                                    <div class="media mb3">
                                        <img
                                            src="{{asset($asset_path.'images/acid_compliant-aa670b3547833807ccc179b4a69b0a3621aa0be2c98cef7b8c086c19348506dd.png')}}"
                                            alt="secure"
                                            class="" width="50">
                                        <div class="media-body">
                                            <h3>ACID-Compliant Environment</h3>
                                            <p>The Flow architecture allows speed and scale without breaking the network
                                                up through sharding or other “layer two” solutions. This ensures full
                                                serializability and easy composability for smart contracts.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 media-item">
                                    <div class="media mb3">
                                        <img
                                            src="{{asset($asset_path.'images/cadence-db645961534fa075b1e65e7b9425201b1cb8083b2bda97f80d389f7573dfea87.png')}}"
                                            alt="secure"
                                            class="pull-left" width="50">
                                        <div class="media-body">
                                            <h3>Cadence</h3>
                                            <p>Already getting love from developers, Cadence is the world’s first
                                                high-level resource-oriented programming language, designed to make
                                                building dapps and digital assets safer and easier.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->
                            <div class="row">
                                <!-- row start -->
                                <div class="col-sm-6 media-item">
                                    <div class="media ">
                                        <img
                                            src="{{asset($asset_path.'images/upgradable-c136d52c276568c33d6d1b7aaefdd057ab9bd16ef3a082c36fec943fa69a9880.png')}}"
                                            alt="secure"
                                            width="50">
                                        <div class="media-body">
                                            <h3>Upgradable Smart Contracts </h3>
                                            <p>Protocol-level standards make it easy for users to trust the system while
                                                allowing developers to securely and transparently patch bugs and upgrade
                                                pre-specified parts of their apps.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 media-item">
                                    <div class="media ">
                                        <img
                                            src="{{asset($asset_path.'images/smart_user-cb7165999a95f31b676f038516743c1a00dd9da574a84d8a7427309218c6a4d2.png')}}"
                                            alt="secure"
                                            width="50">
                                        <div class="media-body">
                                            <h3>Smart User Accounts</h3>
                                            <p>Flow accounts have full smart contract capabilities – we make it easy for
                                                developers to give an awesome user experience (e.g. easy onboarding,
                                                "free to play," prepaid fees, and access recovery).
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->

                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
            </div>
            <!-- container start -->
        </div>
    </section>
    <section id="buy-token">
        <div class="burger gray-light-bg align-item-center text-center">
            <div class="container">
                <div class="row" style="font-size: 18px">
                    <div class="col-md-12">
                        <h3>Developer Traction</h3>
                        <br/>
                        <p>Flow already has an active and engaged developer community through the
                            <a href="https://www.onflow.org/play" target="_blank">Playground</a>, Flow Alpha program,
                            and Open World Builders, among other
                            initiatives. By learning from issues encountered on Ethereum, Flow is built with
                            smart contract primitives and user-onboarding tools to make development as
                            seamless as possible. Dapper believes this will help seed the beginnings of the
                            next great blockchain community.</p>
                        <p>
                            Flow has announced partnerships with top entertainment brands, development
                            studios, and venture-backed startups. Flow partners include publicly-traded
                            companies like Warner Music, Ubisoft, and Sumo Digital; leading game developers,
                            including Animoca Brands and nWay; leaders in crypto, such as Circle and
                            Binance; as well as some exciting projects among the next generation of
                            high-growth startups, including Magic Labs and Opensea.
                        </p>
                        <p>
                            We also have a vibrant community of independent developers and small, innovative
                            teams engaged in our online communities. Over 2,700 projects and more than 6,000
                            smart contracts have been deployed on Flow Playground. In addition, over 1,800
                            clones of our JS SDK (which developers use to build dapps on Flow) and 10,000+
                            clones of our Go & Cadence repos have been registered on GitHub.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============ CTA end ==============-->

    <section class=" burger " id="white-paper">
        <div class="container">
            <!-- container-start -->
            <div class="row ">
                <!-- row start -->
                <div class="col-sm-6 col-sm-push-6">
                    <!-- column start -->
                    <img src="{{asset($asset_path.'images/whitepaper.png')}}" alt="whitepaper" class="img-responsive">
                </div>
                <!-- column end -->
                <div class="col-sm-6 col-sm-pull-6">
                    <!-- column start -->
                    <h2>Getting in the Flow</h2>
                    <p class="big-pera">As a decentralized network, anyone can join and build on Flow. Some of the
                        world's top developers and biggest brands are already onboard, serving fan bases counting in the
                        billions</p>
                    <a href="{{route('presale', ['token' => strtolower($token_name)])}}" class="btn-alpha">JOIN NOW</a>
                </div>
                <!-- column end -->
            </div>
            <!-- row-end -->
        </div>
        <!-- conatainer-end -->
    </section>
    <style>
        table td {
            width: 10%;
            border: 3px solid #00ff80;
            padding: 100px
        }

        table thead {
            width: 10%;
            border: 3px solid #00ff80;
        }

        .auction-table table {
            width: 20%;
            border: 3px solid #ea00ff !important;
            padding: 100px;
        }
    </style>
    <!-- ======== about-end =============== -->
    <section id="">
        <div class="burger light-bg">
            <div class="container">
                <div class="row">
                    <!-- row-start -->
                    <div class="col-lg-10 col-lg-offset-1  mb5">
                        <!-- column start -->
                        <img
                            src="{{asset($asset_path.'images/multi_logo-b006eb62bb202f4952b91ff95df85be35279596589376e17733e125bf3e61d11.png')}}"
                            alt="distribution"
                            class="cryptency-graph img-responsive col-md-offset-4">

                        <h2 class="text-center mt4">Flow Token</h2>
                        <p class="big-pera">The FLOW token (“FLOW” or “𝔽”) is the native currency for the Flow network
                            and the fuel for a new, inclusive, and borderless digital economy.</p>
                        <div class="u-text-left u-fontWeight300">
                            <div class="s-fontSize20 s-marginBottom2">
                                FLOW has several important characteristics vis-a-vis the way it secures and powers the
                                network:
                                <ol>
                                    <li>
                                        <strong>Diverse</strong>
                                        use-cases
                                    </li>
                                    <li>
                                        <strong>Broad</strong>
                                        distribution
                                    </li>
                                    <li>
                                        <strong>Minimal</strong>
                                        monetary inflation
                                    </li>
                                </ol>
                            </div>
                            <div class="s-fontSize20 s-marginBottom2">
                                The FLOW token is the token required for staking the platform, as well as the currency
                                in which staking rewards are paid. In addition, small amounts of FLOW token are required
                                to pay transaction fees and a minimum reserved balance is required to pay for storage on
                                the network.
                            </div>
                            <div class="s-fontSize20 s-marginBottom2">
                                FLOW is also the token always guaranteed to be available for apps and games on top of
                                the Flow network. While developers are always free to generate and issue their own
                                currencies on Flow, the FLOW token will always have the most usage, liquidity, and
                                acceptance on the platform. Over time, FLOW may come to be demanded by consumers as a
                                better medium of exchange and unit of account, or as having advantages as a store of
                                value.
                            </div>
                            <div class="s-fontSize20 s-marginBottom2">
                                Because FLOW is a low-inflation cryptocurrency, it is designed to offer benefits as a
                                collateral asset for new tokens created on top of the Flow network. This includes
                                stablecoin and decentralized finance protocols. A total of 100M FLOW tokens has been set
                                aside initially to subsidize the creation of these protocols to serve the Flow
                                ecosystem. Given Dapper’s projections, using FLOW as a collateral asset means that as
                                demand for secondary tokens like stablecoins goes up, demand for FLOW tokens should
                                increase in corresponding fashion.
                            </div>
                            <div class="mb4 mt4">
                                <div class="s-marginVert3">
                                    <a class="redirect-btn btn-alpha" target="_blank"
                                       href="https://www.onflow.org/flow-token-economics">Learn more: token
                                        economics</a>
                                </div>
                            </div>
                            <div class="s-fontSize20 s-marginBottom2">
                                All FLOW tokens sold and distributed, through including this CoinList sale, will have
                                transfer restrictions. The only circulating tokens in the first year are expected to be
                                from rewards paid to validator node operators that are staking their tokens. An
                                allocation of 20 million FLOW tokens will be distributed as additional rewards to
                                staking validator node operators in the 30 days following the launch of the network
                                mainnet in order to ensure sufficient freely circulating supply to kickstart the Flow
                                token economy.
                            </div>
                            <div class="s-fontSize20 s-marginBottom4">
                                Becoming a staking validator requires a minimum number of FLOW, reflective of the
                                staking ratios the protocol requires to ensure security of the network. However any
                                amount of Flow can be delegated to a staking validator node to earn rewards. This means
                                anyone will be able to participate in the Flow economy and earn rewards from their
                                participation – regardless of the amount of FLOW they own.
                            </div>
                        </div>

                        <div class="mt5">
                            <div class="s-grid">
                                <div class="s-grid-colLg24">
                                    <table class="table table-responsive">
                                        <tbody>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack" width="50%">
                                                Circulating supply at launch
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4">
                                                Zero
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Circulating supply 30 days after staking rewards start (estimated)
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4">
                                                20 million FLOW
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Circulating supply at month 6 (estimated)
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4">
                                                30 million FLOW
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Circulating supply at month 13 (estimated)
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4">
                                                300 million FLOW
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Fully diluted supply at genesis
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4">
                                                1.25B FLOW
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Minimum stake to operate each node type
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4">
                                                Collector Nodes: 250,000 FLOW
                                                <br>
                                                Consensus Nodes: 500,000 FLOW
                                                <br>
                                                Execution Nodes: 1,250,000 FLOW
                                                <br>
                                                Verification Nodes:135,000 FLOW
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Total annual rewards
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4">
                                                3.75% of fully diluted market cap
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="s-fontSize20 s-marginBottom2 u-text-center">
                                        <div class="s-marginVert3">
                                            <a class="redirect-btn btn-alpha mt4" target="_blank"
                                               href="https://www.onflow.org/flow-token-economics">Learn more: token
                                                economics</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->

                <!-- row end -->
            </div>
            <!-- container end -->
        </div>
        <!-- Distribution-section-end -->
    </section>
    <section id="buy-token">
        <div class="burger text-center">
            <div class="container">
                <div class="row">
                    <h3>Token Distribution</h3>
                    <p class="big-pera">Circulating in first 2 years</p>
                    <!-- row-start -->
                    <div class="col-lg-10 col-lg-offset-1  mb5 mt4">
                        <!-- column start -->
                        <img
                            src="{{asset($asset_path.'images/donut-217342bee81527b3995ccfba358a0dcda8dc4577494af9ede4f920b3098ee325.png')}}"
                            alt="distribution"
                            class="cryptency-graph img-responsive">

                        <div class="">
                            <div class="s-grid">
                                <div class="">
                                    <table class="table ">
                                        <thead>
                                        <tr>
                                            <th class="c-table__col4">
                                                <div class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                    &nbsp;
                                                </div>
                                            </th>
                                            <th class="c-table__col4">
                                                <div
                                                    class="s-fontSize24 u-fontWeight700 u-colorBlack u-whiteSpaceNowrap">
                                                    Ownership Stake
                                                </div>
                                            </th>
                                            <th class="c-table__col4">
                                                <div class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                    Vesting Schedule
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Ecosystem Reserve
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Ownership Stake">
                                                29% of genesis block
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Vesting Schedule">
                                                TBD at time of distribution and the nature of the usage (e.g., grants /
                                                bounties, contribution to a collateral pool, etc.). Currently tokens
                                                distributed through the reserve are contemplated to have 12 month lock
                                                ups or serve as collateral, never directly entering circulation.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Dapper Labs
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Ownership Stake">
                                                20%
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Vesting Schedule">
                                                Monthly vesting over 5 years, acceleration with network decentralization
                                                milestones.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Team
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Ownership Stake">
                                                18%
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Vesting Schedule">
                                                After grant - 3 year vesting, one year cliff. About half of this
                                                allocation is granted, the remaining half is held in reserve for future
                                                contributions to the protocol.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Pre-Launch Backers
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Ownership Stake">
                                                20%
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Vesting Schedule">
                                                One year cliff, monthly vest over 12 months thereafter
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="s-fontSize24 u-fontWeight700 u-colorBlack">
                                                Future Sales
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Ownership Stake">
                                                Up to 13% remaining
                                            </td>
                                            <td class="s-fontSize20 u-fontWeight300 u-colorGray4"
                                                header="Vesting Schedule">
                                                Community Sale subject to same terms as Pre-Launch Backers, Dutch
                                                Auction vests 100% after 12 months. Both can be staked or delegated and
                                                earn freely transferable rewards for participation.
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ but-token ================ -->
    <section class="burger light-bg" id="service">
        <div class="container">
            <!-- container-start -->
            <div class="row align-item-center">
                <!-- row start -->
                <div class="col-sm-12 col-lg-12 text-center">
                    <!-- column start -->
                    <h2>Join the Wave</h2>
                    <p class="big-pera">The FLOW sale is structured to take place in two stages, in which any interested
                        qualifying party may participate:<br/> 1) the FLOW Token Community Distribution Sale; and 2) the
                        FLOW
                        Token Dutch Auction.
                    </p>
                </div>
            </div>
            <div class="row mt4">
                <!-- column end -->
                <div class="col-lg-6 col-sm-6">
                    <!-- column start -->
                    <div class="contact-info text-center">
                        <h3 class=" mb3 mt0">FLOW Token Community Sale </h3>
                        <h5>$0.10 / token (up to $1,000)</h5>
                        <div class="contact-item">
                            <span>The community sale provides open access and broad participation to an unlimited number of
                                community members to purchase up to 10,000 FLOW tokens each. Purchases up to this amount
                                are guaranteed to any qualifying participant and is set at the same terms as pre-launch
                                venture capital-led rounds ($0.10 per token). While each purchaser may purchase up to 10,000
                                FLOW tokens, there is no limit to the overall number of tokens sold. </span>
                        </div>
                        <div class="mb4 mt4">
                            <div class="s-marginVert3">
                                <a class="redirect-btn btn-alpha"
                                   href="{{route('presale', ['token' => strtolower($token_name)])}}">Join Community Sale </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="contact-info text-center">
                        <h3 class=" mb3 mt0">FLOW Token Dutch Auction</h3>
                        <h5>Starting Bid: $1.00 · Reserve Price: $0.10</h5>
                        <h5> Minimum Bid: $50 · No Maximum Bid</h5>
                        <h5> Supply Available: 2% (25M FLOW Tokens)</h5>
                        <div class="contact-item">
                            <span>The community sale provides open access and broad participation to an unlimited number of
                                community members to purchase up to 10,000 FLOW tokens each. Purchases up to this amount
                                are guaranteed to any qualifying participant and is set at the same terms as pre-launch
                                venture capital-led rounds ($0.10 per token). While each purchaser may purchase up to 10,000
                                FLOW tokens, there is no limit to the overall number of tokens sold. </span>
                        </div>
                        <div class="mb4 mt4">
                            <div class="s-marginVert3">
{{--                                <a class="redirect-btn btn-alpha" target="_blank"--}}
{{--                                   href="https://www.onflow.org/flow-token-economics">View auction results</a>--}}
                            </div>
                        </div>

                    </div>
                    <!-- column start -->

                </div>
            </div>
            <div class="row mt3">
                <div class="col-lg-12 col-sm-12">
                    <div class="contact-info text-center">
                        <h3 class=" mb3 mt0">Community referral program: Receive 500 FLOW tokens per successful
                            referral, no max limit</h3>

                    </div>
                    <!-- column start -->

                </div>

                <!-- column end -->
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </section>
    <section id="">
        <div class="burger light-bg">
            <div class="container">
                <div class="row text-center">
                    <h3>Sales Terms</h3>
                    <div class="col-lg-6">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td border="0" class="no-border" colspan="2">
                                    <div class="s-fontSize24 u-colorBlack u-fontWeight700 u-text-center">
                                        Community Guaranteed Price
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Asset
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    Token Purchase Agreement - FLOW Tokens
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Sale Period
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    Sep 22, 2020 at 4 pm UTC - Oct 2, 2020 at 11:59 pm UTC
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Price
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    $0.1 (same price as VC participation) at $125mm genesis block valuation
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700" width="45%">
                                    Max purchase limit
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    $1,000
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Terms
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    50% of tokens become freely transferable after a one year cliff, the remaining 50%
                                    vest on a monthly basis over the following year (same as prelaunch VCs)
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Max Supply
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    Max 10%
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Eligible Participants
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    Non-US persons only
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <table class="table auction-table">
                            <tbody>
                            <tr>
                                <td border="0" class="no-border" colspan="2">
                                    <div class="s-fontSize24 u-colorBlack u-fontWeight700 u-text-center">
                                        Auction
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Asset
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    Token Purchase Agreement - FLOW Tokens
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Auction Type
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    <a class="c-link" target="_blank"
                                       href="https://www.investopedia.com/terms/d/dutchauction.asp">Dutch Auction</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Key Auction Dates
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    <div class="s-marginBottom1">
                                        Deposits &amp; bidding open: Sep 23, 2020
                                    </div>
                                    Auction live: Oct 6, 2020 at Noon UTC
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Starting Bid
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    $1
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Reserve Price
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    $0.10
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Minimum Bid
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    $50
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Maximum Bid
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    No maximum
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Terms
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    1 year lock-up, after which fully unlocked
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Supply Available in auction
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    2% (25M FLOW Tokens)
                                </td>
                            </tr>
                            <tr>
                                <td class="s-fontSize24 u-fontWeight700">
                                    Eligible Participants
                                </td>
                                <td class="s-fontSize20 u-fontWeight300">
                                    Non-US persons only
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ services-end  ================ -->


    <!--=================== white-paper-section-end=============== -->
    <section class="burger our-partners " id="partners">
        <div class="container text-center">
            <!-- container-start -->
            <h2 class="mb5">Previous Backers</h2>
            <div class="row partners-list">
                <!-- row start -->
                <div class="col-sm-12 col-xs-12">
                    <!-- column start -->
                    <img src="{{asset($asset_path.'images/partners.png')}}" alt="BIT COin" style="width: 100%;"
                         class="img-responsive">
                </div>

                <!-- column end -->
            </div>
            <!-- row-end -->
        </div>
        <!-- conatainer-end -->
    </section>
    <section class="burger our-partners gray-light-bg" id="partners">
        <div class="container text-center">
            <!-- container-start -->
            <h2 class="mb5">Partners</h2>
            <div class="row partners-list">
                <!-- row start -->
                <div class="col-sm-12 col-xs-12">
                    <!-- column start -->
                    <img src="{{asset($asset_path.'images/part.png')}}" alt="BIT COin" style="width: 100%;"
                         class="img-responsive">
                </div>

                <!-- column end -->
            </div>
            <!-- row-end -->
        </div>
        <!-- conatainer-end -->
    </section>
    <style>
        p {
            font-size: 18px !important;
        }
    </style>
    <section class="burger light-bg" id="reviews">
        <div class="container reviews">
            <!-- container-start -->
            <div class="row">
                <!-- row-start -->
                <div class="col-lg-12 ">
                    <!-- column start -->
                    <h2 class=" text-center mb5">Contributors</h2>
                    <p class="col-md-offset-1">Flow is the only layer-one blockchain built by a team that has
                        consistently delivered great
                        consumer blockchain experiences: CryptoKitties, Dapper Wallet, NBA TopShot.</p>
                    <p class="col-md-offset-1">
                        Flow includes many features that address many of the inherent complexities in decentralized
                        systems, allowing developers to focus on the unique features of their project. This includes
                        drastically simplifying the on-boarding friction that blocks mainstream users from enjoying the
                        power of this transformative technology.</p>
                    <p class="col-md-offset-1">
                        The Flow team is composed of leading researchers and experienced production engineers who have
                        worked together for years defining a novel approach to blockchain architecture. They have
                        delivered a cutting-edge system with strong security guarantees, wrapped up in a package of
                        commercial-quality code being deployed and run across the globe.
                    </p>
                    <div id="review-slider mt3" class=" carousel" data-ride="">
                        <!-- Indicators -->

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="media mt3">
                                    <div class="media-left"><img
                                            src="{{asset($asset_path.'images/Roham-b6326968e1d1efe276b91a2dc1ba8c0a0b8e062d723155b97172c0624e8336be.png')}}"
                                            alt="author"></div>
                                    <div class="media-body media-middle">
                                        <span
                                            class="author-name text-muted"><strong>Roham Gharegozlou,</strong> CEO</span>

                                        <p>CEO of Dapper Labs, the creators of CryptoKitties, Flow and NBA Top Shot.
                                            Previously founder and CEO of Axiom Zen, co-founder of ZenHub. He holds a
                                            bachelor's degree in Economics and bachelor's and master's degrees in
                                            Biological Sciences from Stanford University.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-inner mt3">
                            <div class="item active">
                                <div class="media">
                                    <div class="media-left"><img
                                            src="{{asset($asset_path.'images/Deter-9bd87fc4d28509a70b9bb78532daed1e7569c7d7116ad37246a79ef160ec9527.png')}}"
                                            alt="author"></div>
                                    <div class="media-body media-middle">
                                        <span
                                            class="author-name text-muted"><strong>Dieter “dete” Shirley,</strong> Founder and CTO</span>

                                        <p>CTO of Dapper Labs. Co-created CryptoKitties and authored the ERC-721
                                            proposal that defined non-fungible tokens on Ethereum. Dete also acted as
                                            the CTO of Axiom Zen for four years, and prior to that as the Head of
                                            Development at Atimi Software and a senior software engineer at Apple.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column end -->
            </div>
            <!-- row end -->
        </div>
        <!-- row container -->
    </section>
    <!--=================== partners-section-end=============== -->
    <section class="burger faq " id="faq-section">
        <div class="container ">
            <!-- container-start -->
            <h2 class="text-center mb5">Quotes</h2>
            <div class="row align-item-center">
                <!-- row start -->
                <div class="faq-box">
                    <div class="faq-icon">

                    </div>
                    <div class="col-sm-12">
                        <!-- column start -->
                        <p>
                            “Blockchain technology has the potential to revolutionize consumer ownership on the
                            internet,” said Andre Iguodala, three time NBA champion, tech entrepreneur, and current
                            Miami Heat forward. “Projects like Dapper Labs’ Flow is already driving consumer adoption,
                            with NBA Top Shot proving the experience is not only engaging, but smooth and fan friendly.”
                        </p>

                        <h3><strong>Andre Iguodala, NBA Miami Heat</strong></h3>
                        <hr/>
                        <p>
                            “Blockchain is going to fundamentally alter the financial industry and have a major impact
                            on consumers,” said Spencer Dinwiddie, Point Guard on the Brooklyn Nets and avid blockchain
                            enthusiast. “Flow can create the vehicle for consumers to enter the space through products
                            like NBA Top Shot where they have fun, but at the same time create a new self-sovereignty.”
                        </p>
                        <h3><strong>Spencer Dinwiddie, NBA Brooklyn Nets</strong></h3>
                        <hr/>
                        <p>
                            “Flow’s innovative multi-role architecture, resource-oriented programming, developer
                            ergonomics, easy consumer onboarding, resource pricing, and storage deposits will be an
                            asset to the industry at large.”
                        </p>
                        <h3><strong>Joe Lallouz, CEO of Bison Trails</strong></h3>
                    </div>
                    <!-- column end -->
                </div>
            </div>
            <!-- row-end -->
        </div>
        <!-- conatainer-end -->
    </section>
    <!--=================== Faq-section-end=============== -->
@endsection
