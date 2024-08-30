@extends('appV1.layouts.front')
@section('page_title', 'Legal')
@section('content')
    <style>

        table, tr, td {
            border-color: #FFFFFF !important;
        }
    </style>
    <div class="titlebar titlebar-sm scheme-light text-center bg-none liquid-parallax-bg" data-parallax="true" data-parallax-options="{ &quot;parallaxBG&quot;: true }" style="background-image: url({{asset('appV1/assets/demo/bg/bg-28.jpg')}});">
        <div class="liquid-parallax-container"><figure class="liquid-parallax-figure" style="height: 120%; background-image: url(&quot;{{asset('appV1/assets/demo/bg/bg-28.jpg')}}&quot;); background-position: 0% 0%; transform: translateY(-14.0889%);"></figure></div>
        <div class="titlebar-inner">
            <div class="container titlebar-container">
                <div class="row titlebar-container">
                    <div class="titlebar-col col-md-12">
                        <h1 data-fittext="true" data-fittext-options="{ &quot;maxFontSize&quot;: 80, &quot;minFontSize&quot;: 32 }" style="font-size: 80px;">@yield('page_title')</h1>
                        <a class="titlebar-scroll-link" href="#content" data-localscroll="true"><i class="fa fa-angle-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="vc_row  pb-35">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-lg-12">
                    <h3 class="text-center mb-5">Legal</h3>
                    <div class="tabs tabs-nav-side tabs-nav-shadowed">
                        <ul class="nav tabs-nav" role="tablist">
                            <li role="presentation" class="h5 active">
                                <a href="#ld-tab-pane-21" aria-expanded="false" aria-controls="ld-tab-pane-21"
                                   role="tab" data-toggle="tab"> Supported Countries </a>
                            </li>
                            <li role="presentation" class="h5">
                                <a href="#ld-tab-pane-22" aria-expanded="false" aria-controls="ld-tab-pane-22"
                                   role="tab" data-toggle="tab">Fees </a>
                            </li>
                            <li role="presentation" class="h5">
                                <a href="#ld-tab-pane-23" aria-expanded="false" aria-controls="ld-tab-pane-23"
                                   role="tab" data-toggle="tab"> Licenses </a>
                            </li>
                          {{--  <li role="presentation" class="h5">
                                <a href="#ld-tab-pane-24" aria-expanded="false" aria-controls="ld-tab-pane-24"
                                   role="tab" data-toggle="tab"> BSA/AML Program </a>
                            </li>--}}
                        </ul>
                        <div class="tabs-content">
                            <div id="ld-tab-pane-21" role="tabpanel" class="tabs-pane fade active in">
                                <div class=""
                                     data-rc="index/legal/supported_countries">

                                    <h4>Supported Countries & States</h4>
                                    <p>       {{config('app.name')}} is not available to residents of
                                    </p>
                                    <div class="s-grid">
                                        <div class="s-grid-colSm12">
                                            <ul class="u-listUnstyled">
                                                <li>
                                                    🇮🇷
                                                    Iran
                                                </li>
                                                <li>
                                                    🇰🇵
                                                    Korea (North)
                                                </li>
                                                <li>
                                                    🇸🇾
                                                    Syrian Arab Republic
                                                </li>
                                                <li>
                                                    🇨🇺
                                                    Cuba
                                                </li>
                                                <li>

                                                    Crimea region of Ukraine
                                                </li>
                                                <li>

                                                    Any other jurisdictions as {{config('app.name')}} determines
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="s-marginTop2">
                                        {{config('app.name')}} is not available to residents of the following U.S
                                        States:
                                    </p>
                                    <div class="s-grid">
                                        <div class="s-grid-colSm8">
                                            <ul class="u-listUnstyled">
                                                <li>
                                                    Alaska
                                                </li>
                                                <li>
                                                    Hawaii
                                                </li>
                                                <li>
                                                    Minnesota
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="s-grid-colSm8">
                                            <ul class="u-listUnstyled">
                                                <li>
                                                    Nevada
                                                </li>
                                                <li>
                                                    New York
                                                </li>
                                                <li>
                                                    Puerto Rico
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="s-grid-colSm8">
                                            <ul class="u-listUnstyled">
                                                <li>
                                                    Virgin Islands, U.S.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ld-tab-pane-22" role="tabpanel" class="tabs-pane fade">
                               <div class="row">
                                   <div class="col-md-12">
                                       <section class="" id="fees">
                                           <h2>
                                               Fees
                                           </h2>
                                           <div class="s-grid">
                                               <div class="s-grid-colSm24 s-marginBottom2">
                                                   <div class=" index-fees-fees_table" data-rc="index/fees/fees_table"><h3>
                                                           Transaction fees -
                                                           <strong class="u-colorBlack">{{config('app.url')}}</strong>
                                                       </h3>
                                                       <p>
                                                           We charge 0.5% per transaction, in the counter asset currency:
                                                       </p>

                                                       <p>
                                                           <span class="u-colorBlue">*</span>
                                                           Minimum fee of $0.25 or crypto-equivalent
                                                       </p>

                                                       <p>
                                                           Your fee tier is based on your total USD trading volume over the last 30 days. Trades in
                                                           markets not quoted in USD are converted to a USD traded amount based on a recent index price
                                                           (a composite based on the price of the quote asset across external exchanges) recorded at or
                                                           shortly after the time of the trade.
                                                       </p>
                                                       <p>
                                                           {{config('app.name')}} Pro minimum order sizes and price increments by asset:
                                                       </p>
                                                       <table class="c-table c-table--bordered c-table--responsive index-fees-fees_table__fees-table s-marginBottom1 u-text-left">
                                                           <thead>
                                                           <tr>
                                                               <th class="c-table__col9">
                                                                   <div class="u-fontWeight700 u-colorGray4">
                                                                       Pair
                                                                   </div>
                                                               </th>
                                                               <th class="c-table__col6">
                                                                   <div class="u-fontWeight700 u-colorGray4">
                                                                       Minimum Order Size
                                                                   </div>
                                                               </th>
                                                               <th class="c-table__col7">
                                                                   <div class="u-fontWeight700 u-colorGray4">
                                                                       Minimum Price Increment
                                                                   </div>
                                                               </th>
                                                           </tr>
                                                           </thead>
                                                           <tbody>
                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4">
<span class="u-fontWeight400 u-colorGray8">
BTC-USD, BTC-USDT, ETH-USD, FIL-USD, FIL-USDT
</span>
                                                               </td>
                                                               <td header="Minimum Order Size">
                                                                   0.0001
                                                               </td>
                                                               <td header="Minimum Price Increment">
                                                                   0.01
                                                               </td>
                                                           </tr>
                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4">
<span class="u-fontWeight400 u-colorGray8">
ALGO-USD, CELO-USD, OXT-USD
</span>
                                                               </td>
                                                               <td header="Minimum Order Size">
                                                                   0.0001
                                                               </td>
                                                               <td header="Minimum Price Increment">
                                                                   0.0001
                                                               </td>
                                                           </tr>
                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4">
<span class="u-fontWeight400 u-colorGray8">
ETH-BTC
</span>
                                                               </td>
                                                               <td header="Minimum Order Size">
                                                                   0.0001
                                                               </td>
                                                               <td header="Minimum Price Increment">
                                                                   0.00001
                                                               </td>
                                                           </tr>
                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4">
<span class="u-fontWeight400 u-colorGray8">
CELO-BTC
</span>
                                                               </td>
                                                               <td header="Minimum Order Size">
                                                                   0.0001
                                                               </td>
                                                               <td header="Minimum Price Increment">
                                                                   0.00000001
                                                               </td>
                                                           </tr>
                                                           </tbody>
                                                       </table>
                                                   </div>
                                               </div>
                                               <div class="s-grid-colSm24 s-marginBottom2">
                                                   <div class=" index-fees-crypto_withdrawal_fees" data-rc="index/fees/crypto_withdrawal_fees"><h3>
                                                           Digital asset withdrawal fees &amp; minimums
                                                       </h3>
                                                       <p>
                                                           There is a minimum withdrawal amount and a flat fee to cover
                                                           transaction costs.
                                                       </p>
                                                       <p>
                                                           These values can change without notice and may not always be current.
                                                           Please review the fee information on the withdraw page before you withdraw.
                                                       </p>
                                                       <table class="pr-3">
                                                           <thead>
                                                           <tr>
                                                               <th class="">
                                                                   <div class="u-fontWeight700 u-colorGray4">
                                                                       Assets
                                                                   </div>
                                                               </th>
                                                               <th class="c-table__col5">
                                                                   <div class="u-fontWeight700 u-colorGray4">
                                                                       Withdrawal fee
                                                                   </div>
                                                               </th>
                                                               <th class="c-table__col5">
                                                                   <div class="u-fontWeight700 u-colorGray4">
                                                                       Min withdrawal
                                                                   </div>
                                                               </th>
                                                           </tr>
                                                           </thead>
                                                           <tbody>
                                                           <tr>
                                                               <td class="index-fees-crypto_withdrawal_fees__asset-legend u-fontWeight700" colspan="3">
                                                                   <div class="u-colorBlue u-fontWeight300 s-fontSize15">
                                                                       Crypto
                                                                   </div>
                                                               </td>
                                                           </tr>
                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Ethereum
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.004 ETH
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.001 ETH
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Bitcoin
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.00035 BTC
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.00005 BTC
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Algorand
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.001 ALGO
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.1 ALGO
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Wrapped Bitcoin
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.00034 WBTC
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.00005 WBTC
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Orchid
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   32.49 OXT
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   1 OXT
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Maker
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.003 MKR
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.0005 MKR
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Celo
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.0015 CELO
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.05 CELO
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Tezos
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.2 XTZ
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.1 XTZ
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Compound
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.031 COMP
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.003 COMP
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Chainlink
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.453 LINK
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.04 LINK
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Numeraire
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.258 NMR
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.015 NMR
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Filecoin
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.01 FIL
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.01 FIL
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   NuCypher
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   34.646 NU
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.4 NU
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Uniswap
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.463 UNI
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.2 UNI
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Ocean
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   18.588 OCEAN
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.1 OCEAN
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Flow
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0 FLOW
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.01 FLOW
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Skale
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   33.472 SKL
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   1 SKL
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Terra USD
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   12.065 UST
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   1 UST
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Aave
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.033 AAVE
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.001 AAVE
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Casper
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.000011 CSPR
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   2.5 CSPR
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Internet Computer
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.0001 ICP
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.04 ICP
                                                               </td>
                                                           </tr>

                                                           <tr>
                                                               <td class="index-fees-crypto_withdrawal_fees__asset-legend u-fontWeight700" colspan="3">
                                                                   <div class="u-colorBlue u-fontWeight300 s-fontSize15">
                                                                       Stablecoins
                                                                   </div>
                                                               </td>
                                                           </tr><tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   USD Coin
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   12.06 USDC
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.5 USDC
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Dai
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   11.914 DAI
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.5 DAI
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Tether
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   12.06 USDT
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.5 USDT
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Celo Dollar
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   0.1 CUSD
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   0.5 CUSD
                                                               </td>
                                                           </tr>

                                                           <tr class="s-fontSize18">
                                                               <td class="u-fontWeight700 u-colorGray4" header="Assets">
                                                                   Terra USD
                                                               </td>
                                                               <td header="Withdrawal fee">
                                                                   12.065 UST
                                                               </td>
                                                               <td header="Min withdrawal">
                                                                   1 UST
                                                               </td>
                                                           </tr>


                                                           </tbody>
                                                       </table>
                                                   </div>
                                               </div>
                                               <div class="s-grid-colSm24 s-marginBottom2">
                                                   <div class=" index-fees-wire_fees" data-rc="index/fees/wire_fees"><h3>
                                                           Wire Fees
                                                       </h3>
                                                       <p>
                                                           {{config('app.name')}} Markets does not charge for incoming wires.
                                                       </p>
                                                       <p>
                                                           {{config('app.name')}} Markets charges $10 per outgoing U.S. wire and
                                                           $30 per outgoing foreign wire.
                                                       </p>
                                                   </div>
                                               </div>
                                           </div>
                                       </section>
                                   </div>
                               </div>
                            </div>
                            <div id="ld-tab-pane-23" role="tabpanel" class="tabs-pane fade">
                                <div class="">
                                    <div class="">
                                        <h4>License</h4>
                                        <div class="index-legal-licenses" data-rc="index/legal/licenses">
                                            <table
                                                class="c-table c-table--bordered c-table--responsive index-legal-licenses__fees-table s-marginBottom1 u-text-left">
                                                <thead>
                                                <tr>
                                                    <th class="c-table__col4">
                                                        <div class="u-fontWeight700 u-colorGray4">
                                                            State
                                                        </div>
                                                    </th>
                                                    <th class="c-table__col10">
                                                        <div class="u-fontWeight700 u-colorGray4">
                                                            License
                                                        </div>
                                                    </th>
                                                    <th class="c-table__col10">
                                                        <div class="u-fontWeight700 u-colorGray4">
                                                            State Agency
                                                        </div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Alabama
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Sale of Checks License, 796
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Alabama Securities Commission
                                                        </strong>
                                                        <br>
                                                        445 Dexter Ave., Suite 12000
                                                        <br>
                                                        Montgomery, AL 36104
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(334) 242-2984">(334) 242-2984</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="http://asc.alabama.gov">http://asc.alabama.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Arizona
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter, MT-1000621
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Arizona Department of Financial Institutions
                                                        </strong>
                                                        <br>
                                                        100 N. 15th Avenue, Suite 261
                                                        <br>
                                                        Phoenix, AZ 85007
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(602) 771-2800">(602) 771-2800</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://dfi.az.gov">https://dfi.az.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Connecticut
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter, MT-1785267
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Connecticut Department of Banking
                                                        </strong>
                                                        <br>
                                                        260 Constitution Plaza
                                                        <br>
                                                        Hartford CT 06103-1800
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(860) 240-8299; toll free: (800) 831-7225">(860)
                                                                240-8299; toll free: (800) 831-7225</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://portal.ct.gov/DOB">https://portal.ct.gov/DOB</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Delaware
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Sale of Checks and Transmission of Money, 027874
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Office of the State Bank Commissioner
                                                        </strong>
                                                        <br>
                                                        555 E. Loockerman Street, Suite 210
                                                        <br>
                                                        Dover, DE 19901
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(302) 739-4235">(302) 739-4235</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://banking.delaware.gov">https://banking.delaware.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Florida
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitters Part II, FT230000254
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Florida Office of Financial Regulation
                                                        </strong>
                                                        <br>
                                                        200 E. Gaines Street
                                                        <br>
                                                        Tallahassee, FL 32399
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(850) 413-3137">(850) 413-3137</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://www.flofr.com">https://www.flofr.com</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Georgia
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Seller of Payment Instruments, 66121
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Georgia Department of Banking and Finance
                                                        </strong>
                                                        <br>
                                                        Money Services Businesses
                                                        <br>
                                                        2990 Brandywine Road, Suite 200
                                                        <br>
                                                        Atlanta, GA 30341-5565
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(770) 986-1633">(770) 986-1633</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://dbf.georgia.gov">https://dbf.georgia.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Illinois
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, MT.0000351
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Illinois Department of Financial and Professional Regulation
                                                        </strong>
                                                        <br>
                                                        Consumer Credit Section
                                                        <br>
                                                        100 West Randolph Street 9-100
                                                        <br>
                                                        Chicago, IL 60601
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(888) 473-4858">(888) 473-4858</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://www.idfpr.com">https://www.idfpr.com</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Idaho
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Services License, MTL-247
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Idaho Department of Finance
                                                        </strong>
                                                        <br>
                                                        800 Park Boulevard, Suite 200
                                                        <br>
                                                        Boise, ID 83712
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(208) 332-8000">(208) 332-8000</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://www.finance.idaho.gov">https://www.finance.idaho.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Iowa
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Services License, 2019-0068
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            State of Iowa Division of Banking
                                                        </strong>
                                                        <br>
                                                        200 E. Grand Avenue, Suite 300
                                                        <br>
                                                        Des Moines, IA 50309
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(515) 281-4014">(515) 281-4014</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://www.idob.state.ia.us">https://www.idob.state.ia.us</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Kansas
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, MT.0000155
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Office of the State Bank Commissioner
                                                        </strong>
                                                        <br>
                                                        Consumer and Mortgage Lending Division
                                                        <br>
                                                        700 SW Jackson St., Suite 300
                                                        <br>
                                                        Topeka, KS 66603
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(785) 296-2266">(785) 296-2266</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://www.osbckansas.org">https://www.osbckansas.org</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Louisiana
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Sale of Checks and Money Transmitter
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Louisiana Office of Financial Institutions
                                                        </strong>
                                                        <br>
                                                        Post Office Box 94095
                                                        <br>
                                                        Baton Rouge, LA 70804-9095
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(225) 925-4660">(225) 925-4660</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="http://www.ofi.state.la.us">http://www.ofi.state.la.us</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Maine
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Dept. of Professional &amp; Financial Regulation
                                                        </strong>
                                                        <br>
                                                        Bureau of Consumer Credit Protection
                                                        <br>
                                                        76 Northern Avenue
                                                        <br>
                                                        Gardiner, ME 04345
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(207) 624-8527">(207) 624-8527</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank"
                                                               href="https://www.maine.gov/pfr/consumercredit">https://www.maine.gov/pfr/consumercredit</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Maryland
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, <br>12-1785267
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Maryland Commissioner of Financial Regulation
                                                        </strong>
                                                        <br>
                                                        500 North Calvert Street, Suite 402
                                                        <br>
                                                        Baltimore, Maryland 21202
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(410) 230-6100">(410) 230-6100</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank"
                                                               href="https://www.dllr.state.md.us/finance/">https://www.dllr.state.md.us/finance/</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            New Hampshire
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, 23066-MT
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            New Hampshire Banking Department
                                                        </strong>
                                                        <br>
                                                        53 Regional Drive, Suite 200
                                                        <br>
                                                        Concord, NH 03301
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(603) 271-3561">(603) 271-3561</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://www.nh.gov/banking/">https://www.nh.gov/banking/</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            New Jersey
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, 1903903C22
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            New Jersey Department of Banking and Insurance
                                                        </strong>
                                                        <br>
                                                        20 West State Street, PO Box 325
                                                        <br>
                                                        Trenton, NJ 08625
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(609) 292-7272">(609) 292-7272</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank"
                                                               href="https://www.state.nj.us/dobi/index.html">https://www.state.nj.us/dobi/index.html</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            New Mexico
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Financial Institutions Division
                                                        </strong>
                                                        <br>
                                                        Money Services Business Unit
                                                        <br>
                                                        PO Box 25101
                                                        <br>
                                                        Santa Fe, New Mexico 87504
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(505)476-4500">(505)476-4500</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="http://www.rld.state.nm.us">http://www.rld.state.nm.us</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            North Carolina
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License 185699
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            North Carolina Commissioner of Banks
                                                        </strong>
                                                        <br>
                                                        316 W. Edenton Street
                                                        <br>
                                                        Raleigh, NC 27603
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(919) 733-3016">(919) 733-3016</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://www.nccob.gov/">https://www.nccob.gov/</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Ohio
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, OHMT169
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Ohio Division of Financial Institutions
                                                        </strong>
                                                        <br>
                                                        77 South High Street, 21st Floor
                                                        <br>
                                                        Columbus, OH 43215
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(614) 728-8400">(614) 728-8400</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://www.com.ohio.gov/fiin/">https://www.com.ohio.gov/fiin/</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Oregon
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, #MTX-30232
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Oregon Division of Financial Regulation
                                                        </strong>
                                                        <br>
                                                        350 Winter Street NE Room 410
                                                        <br>
                                                        Salem, OR 97301
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(503) 947-7980">(503) 947-7980</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://dfr.oregon.gov">https://dfr.oregon.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Rhode Island
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Electronic Money Transfers, 20193791MT
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Department of Business Regulation
                                                        </strong>
                                                        <br>
                                                        Division of Banking
                                                        <br>
                                                        1511 Pontiac Avenue
                                                        <br>
                                                        Cranston, Rhode Island 02920
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(401) 462-9500">(401) 462-9500</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="http://www.dbr.ri.gov">http://www.dbr.ri.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            South Carolina
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Office of the Attorney General
                                                        </strong>
                                                        <br>
                                                        Money Services Division
                                                        <br>
                                                        10000 Assembly Street
                                                        <br>
                                                        Columbia, SC 29201
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(803) 734-1221">(803) 734-1221</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank"
                                                               href="http://www.scag.gov/civil/money-services">http://www.scag.gov/civil/money-services</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            South Dakota
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, MT.2171
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            South Dakota Division of Banking
                                                        </strong>
                                                        <br>
                                                        1601 N. Harrison Avenue, Suite 1
                                                        <br>
                                                        Pierre, SD 57501
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(605) 773-3421">(605) 773-3421</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://dlr.sd.gov/banking/">https://dlr.sd.gov/banking/</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Tennessee
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, 1785267
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Tennessee Department of Financial Institutions
                                                        </strong>
                                                        <br>
                                                        Tennessee Tower, 26th Floor
                                                        <br>
                                                        312 Rose L. Parks Avenue
                                                        <br>
                                                        Nashville, TN 37243
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(615) 741-2236">(615) 741-2236</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://www.tn.gov/tdfi.html">https://www.tn.gov/tdfi.html</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Texas
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, 3206
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Texas Department of Banking
                                                        </strong>
                                                        <br>
                                                        2601 North Lamar Blvd.
                                                        <br>
                                                        Austin, Texas, 78705
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(512) 475-1300">(512) 475-1300</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="http://www.dob.texas.gov">http://www.dob.texas.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            District of Columbia
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, MTR1785267
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Department of Insurance, Securities, and Banking
                                                        </strong>
                                                        <br>
                                                        810 First Street, NE, Suite 701
                                                        <br>
                                                        Washington, District of Columbia 20002
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(202) 727-8000">(202) 727-8000</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://disb.dc.gov">https://disb.dc.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Vermont
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, 100-154
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            Department of Financial Regulation
                                                        </strong>
                                                        <br>
                                                        Consumer Services
                                                        <br>
                                                        89 Main Street, Montpelier, VT 05620 - 3101
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(833) 337-4685">(833) 337-4685</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://dfr.vermont.gov">https://dfr.vermont.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            Washington
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License: 550-MT-127592
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            State of Washington - Department of Financial Institutions
                                                        </strong>
                                                        <br>
                                                        Division of Consumer Services
                                                        <br>
                                                        150 Israel Road, S.W., Tumwater, WA 98501
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(877) 746-4334">(877) 746-4334</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank"
                                                               href="https://dfi.wa.gov/consumers/money-services-complaint">https://dfi.wa.gov/consumers/money-services-complaint</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td header="State" valign="top">
                                                        <strong>
                                                            West Virginia
                                                        </strong>
                                                    </td>
                                                    <td header="License" valign="top">
                                                        Money Transmitter License, WVMT-1785267
                                                    </td>
                                                    <td class="s-fontSize14" header="State Agency" valign="top">
                                                        <strong>
                                                            West Virginia Division of Financial Institutions
                                                        </strong>
                                                        <br>
                                                        900 Pennsylvania Avenue, Suite 306
                                                        <br>
                                                        Charleston, WV 25302
                                                        <br>
                                                        <div class="s-fontSize14">
                                                            <a href="tel:(304) 558-2294">(304) 558-2294</a>
                                                        </div>
                                                        <div class="s-fontSize14">
                                                            <a target="_blank" href="https://dfi.wv.gov">https://dfi.wv.gov</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="s-border1 s-marginBottom1">
                                                <strong>
                                                    State Disclosures
                                                    :
                                                    Florida
                                                </strong>
                                                <br>
                                                NOTICE: By the Florida Office of Financial Regulation<br><br>BY GRANTING
                                                COINLIST MARKETS LLC A LICENSE, THE FLORIDA OFFICE OF FINANCIAL
                                                REGULATION IS NOT ENDORSING THE USE OF DIGITAL OR VIRTUAL
                                                CURRENCIES.<br><br>* U.S. currency is legal tender backed by the U.S.
                                                government.<br>* Digital and virtual currencies are not issued or backed
                                                by the U.S. government, or related in any way to U.S. currency, and have
                                                fewer regulatory protections.<br>* The value of digital and virtual
                                                currencies is derived from supply and demand in the global marketplace
                                                which can rise or fall independently of any fiat (government)
                                                currency.<br>* Holding digital and virtual currencies carries exchange
                                                rate and other types of risk.<br><br>POTENTIAL USERS OF DIGITAL OR
                                                VIRTUAL CURRENCIES, INCLUDING BUT NOT LIMITED TO BITCOIN, SHOULD BE
                                                FOREWARNED OF A POSSIBLE FINANCIAL LOSS AT THE TIME THAT SUCH CURRENCIES
                                                ARE EXCHANGED FOR FIAT CURRENCY DUE TO AN UNFAVORABLE EXCHANGE RATE. A
                                                FAVORABLE EXCHANGE RATE AT THE TIME OF EXCHANGE CAN RESULT IN A TAX
                                                LIABILITY. PLEASE CONSULT YOUR TAX ADVISOR REGARDING ANY TAX
                                                CONSEQUENCES ASSOCIATED WITH YOUR HOLDING OR USE OF DIGITAL OR VIRTUAL
                                                CURRENCIES.<br><br>If you have a question or complaint, please contact
                                                the consumer assistance division of {{config('app.name')}} Markets LLC at
                                                {{config('app.team_email')}} or {{config('app.phone')}}.
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ld-tab-pane-24" role="tabpanel" class="tabs-pane fade">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-100">
                </div>
            </div>
        </div>
    </section>
@endsection
