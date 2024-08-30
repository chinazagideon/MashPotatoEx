@extends('appV1.layouts.front')
@section('page_title', 'What are the risks of purchasing virtual currencies?')
@section('content')
    <style>
        h4 {
            color: #130909 !important;
        }
        li {font-size: 17px; line-height: 2.0}
    </style>
    <section class="vc_row py-5 d-flex flex-wrap align-items-center bg-cover"
             style="background-image:  linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);"></section>
    <section id="design-and-development" class="vc_row pt-100 pb-80">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-md-8  text-left mb-50">
                    <header class="fancy-title">
                        <h2 class="mt-0 mb-3">@yield('page_title')</h2>
                    </header>


                    <div class="lqd-column col-md-12 text-left">
                        <div class="s-grid-colSm14 s-grid--pushSm5">
                            <ul>
                                <li>virtual currency is not legal tender, is not backed by the government, and accounts
                                    and value balances are not subject to Federal Deposit Insurance Corporation or
                                    Securities Investor Protection Corporation protections;
                                </li>
                                <li>legislative and regulatory changes or actions at the state, federal, or
                                    international level may adversely affect the use, transfer, exchange, and value of
                                    virtual currency;
                                </li>
                                <li>transactions in virtual currency may be irreversible, and, accordingly, losses due
                                    to fraudulent or accidental transactions may not be recoverable;
                                </li>
                                <li>some virtual currency transactions shall be deemed to be made when recorded on a
                                    public ledger, which is not necessarily the date or time that the customer initiates
                                    the transaction;
                                </li>
                                <li>the value of virtual currency may be derived from the continued willingness of
                                    market participants to exchange fiat currency for virtual currency, which may result
                                    in the potential for permanent and total loss of value of a particular virtual
                                    currency should the market for that virtual currency disappear;
                                </li>
                                <li>there is no assurance that a person who accepts a virtual currency as payment today
                                    will continue to do so in the future;
                                </li>
                                <li>the volatility and unpredictability of the price of virtual currency relative to
                                    fiat currency may result in significant loss over a short period of time;
                                </li>
                                <li>the nature of virtual currency may lead to an increased risk of fraud or cyber
                                    attack;&nbsp;
                                </li>
                                <li>the nature of virtual currency means that any technological difficulties experienced
                                    by the licensee may prevent the access or use of a customer’s virtual currency; and
                                </li>
                                <li>any bond or trust account maintained by the licensee for the benefit of its
                                    customers may not be sufficient to cover all losses incurred by customers.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
