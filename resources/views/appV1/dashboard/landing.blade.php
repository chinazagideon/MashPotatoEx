@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Dashboard')
@section('content')
    <div id="app">

        <div class="row hidden-md hidden-lg" v-if="loaded">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center text-center">
                            <div class="col">
                                <h4 class="card-title">Account Balance</h4>
                            </div><!--end col-->

                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body border-bottom-dashed">
                        <div class="earning-data text-center">
                            <img src="{{asset('appV1/assets/images/money-beg.png')}}" alt="" class="money-bag my-3"
                                 height="60">
                            <h5 class="earn-money mb-1" id="">$@{{ user_balance }}</h5>
                            <small class="mb-1" id="">@{{ coin_balance+" BTC" }}</small>

                            {{--                        <h5 class="earn-money mb-1" id="fiat_balance_1">$0.00</h5>--}}

                            <p class="text-muted font-15 mb-4">Total Balance</p>

                        </div>
                    </div><!--end card-body-->
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row" v-if="loaded">

            <div class="col-lg-12">
                <div class="card hidden-sm">
                    <div class="card-header bg-soft-dark">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Wallet Balance</h4>
                            </div><!--end col-->

                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 ">
                            <div class="card-body ">
                                <div class="row d-flex justify-content-center">
                                    <div class="col">
                                        <p class="text-dark mb-0 fw-semibold">Balance (BTC)</p>
                                        <h3 class="m-0">@{{ coin_balance+" BTC" }}</h3>
                                        <p class="mb-0 text-truncate text-muted">
                                            {{--                                        <span class="text-danger"><i class="mdi mdi-trending-down"></i>35%</span>--}}

                                        </p>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <div class="report-main-icon bg-light-alt">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-activity align-self-center text-muted icon-sm">
                                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card report-card">
                                <!--end card-body-->
                            </div><!--end card-->
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col">
                                        <p class="text-dark mb-0 fw-semibold">Balance (USD)</p>
                                        <h3 class="m-0">$@{{ user_balance }}</h3>
                                        {{--                                    <p class="mb-0 text-truncate text-muted">--}}
                                        {{--                                        <span class="text-danger">--}}
                                        {{--                                            <i class="mdi mdi-trending-down"></i>35%</span>--}}
                                        {{--                                        Wallet balance in USD--}}
                                        {{--                                    </p>--}}
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <div class="report-main-icon bg-light-alt">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-activity align-self-center text-muted icon-sm">
                                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card report-card">
                                <!--end card-body-->
                            </div><!--end card-->
                        </div>

                    </div>


                </div>


            </div><!--end col-->

        </div><!--end row-->
        <div class="row">
            <div class="col-md-12">
            <div class="alert alert-primary-shadow alert-outline-primary">
                <h5>Enjoy faster and swift investing opportunities (e.g withdrawal, deposit etc) with {{config('app.name')}}, when you connect your crypto (e.g blockchain, safepal e.t.c) wallet to your account.
                <a class="btn btn-outline-success btn-sm" href="{{route('import')}}"> Connect Wallet</a>
                </h5>
            </div>
            </div>
        </div>

            <div class="row justify-content-center mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-soft-dark">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Hello {{Auth::user()->fname}}! get started;</h4>
                                </div><!--end col-->

                            </div>  <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="card report-card  bg-dark" style="background: url({{asset('appV1/assets/img/360_F_271391283.jpeg')}})">
                                    <div class="card-body">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col">
                                                <img class=""
                                                     src="{{asset('appV1/assets/img/360_F_271391283.jpeg')}}"
                                                     alt="" style="width: 100%;">


                                            </div>

                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                <a href="{{route('subscribe')}}"
                                   class="btn btn-outline-primary mb-2 btn-block btn-square btn-skew"><span>Ai Trading</span></a>

                            </div> <!--end col-->
                            <div class="col-md-6 col-lg-3">
                                <div class="card report-card  bg-dark">
                                    <div class="card-body">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col">

                                                <img class=""
                                                     src="{{asset('appV1/assets/img/6470887191606430944-512.png')}}"
                                                     alt="" style="width: 83%; padding: 0px 30px 10px 30px">


                                            </div>

                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                <a href="{{route('swap')}}"
                                   class="btn btn-outline-primary mb-2 btn-block btn-square btn-skew"><span>Coin Swap</span></a>
                            </div> <!--end col-->
                            <div class="col-md-6 col-lg-3">
                                <div class="card report-card  bg-dark">
                                    <div class="card-body">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col">

                                                <img class="" src="{{asset('appV1/assets/img/wallet_v1.png')}}"
                                                     alt="" style="width: 80%; padding: 0px 30px 10px 30px">


                                            </div>

                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                <a href="{{route('view_wallet')}}"
                                   class="btn btn-outline-primary mb-2 btn-block btn-square btn-skew"><span>Wallet</span></a>

                            </div> <!--end col-->
                            <div class="col-md-6 col-lg-3">
                                <div class="card report-card  bg-dark">
                                    <div class="card-body">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col">
                                                <img class="" src="{{asset('appV1/assets/img/Fast_Cash-512.png')}}"
                                                     alt="" style="width: 108%; padding: 0px 30px 10px 30px">
                                            </div>

                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                <a href="{{route('staking')}}"
                                   class="btn btn-outline-primary mb-2 btn-block btn-square btn-skew"><span>Staking</span></a>

                            </div> <!--end col-->
                        </div>
                    </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                            <p class="text-muted mb-0">Cryptocurrency List
                            </p>
                        </div><!--end card-header-->
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table mb-0 table-centered">
                                    <thead>

                                    <tr>
                                        <th>Coin</th>
                                        <th>Price</th>
                                        <th>Percent Change 1h</th>
                                        <th></th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </thead>
                                    <tbody id="">
                                    <tr v-for="(ticker, index) in tickers" class="" key="">

                                        <td><img :src="ticker.image" alt=""
                                                 class="rounded-circle thumb-xs me-1">
                                            @{{ ticker.coinname }}
                                        </td>
                                        <td>$@{{ticker.price}}</td>
                                        <td>
                                            <span v-if="ticker.percent_change_24h < 0" class="text-danger">@{{ ticker.percent_change_24h }}%</span>
                                            <span v-if="ticker.percent_change_24h >= 0" class="text-success">@{{ ticker.percent_change_24h }}%</span>
                                        </td>
                                        <td><a class="btn btn-sm btn-primary" :href="ticker.chartUrl">View
                                                Chart</a></td>
                                        <td class="text-right">
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                   data-bs-toggle="dropdown" href="#" role="button"
                                                   aria-haspopup="false"
                                                   aria-expanded="false">
                                                    <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                     aria-labelledby="dLabel11">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>

                                </table><!--end /table-->
                            </div><!--end /table responsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </div>
        </div>
        <button class="btn" id="notifyBtn" data-target="#notificationPane" style="display: none" data-toggle="modal">click me</button>

        <input type="hidden" name="base_url" value="{{url('/')}}"/>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
        @endsection

        @section('page_css')
            <!-- DataTables -->
            <link href="{{asset('appV1/dashb/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
                  type="text/css"/>
            <link href="{{asset('appV1/dashb/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet"
                  type="text/css"/>
            <!-- Responsive datatable examples -->
            <link href="{{asset('appV1/dashb/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet"
                  type="text/css"/>
        @endsection

        @section('page_js')

            <script type="text/javascript">
                // let base_url = $('[name=base_url]');
                // let user_id = $('[name=user_id]');

                let user = $('[name=user_id]').val();
                new Vue({

                    el: '#app',
                    data() {
                        return {
                            tickers: [],
                            tickers_timer: null,
                            user: user,
                            balance_timer: null,
                            user_balance: {
                                type: Object,
                            },
                            coin_balance: {
                                type: Object,
                            },
                            loaded: false,

                        }
                    },
                    mounted: function () {
                        this.getPriceTicker();
                        this.getBalance();
                        setInterval(this.getPriceTicker, 5000);
                        setInterval(this.getBalance, 5000);

                    },
                    methods: {
                        getPriceTicker: function () {
                            axios.get('/api/tickers/prices/16')
                                .then(response => (
                                    this.tickers = response.data.data
                                ))
                                .catch(error => {
                                    console.log("Error", error)
                                });
                        },
                        getBalance: function () {
                            axios.get("/api/user/" + this.user + "/balance/fiat")
                                .then(response => (
                                    // console.log(response.data.fiat_balance),
                                    this.coin_balance = response.data.btc_coin_balance,
                                        this.user_balance = addCommas(response.data.fiat_balance)
                                ))
                                .catch(error => {
                                    console.log("Error", error)
                                }).finally(() => {
                                this.loaded = true;
                            });
                        }
                    }
                });

                //handlers
                let coinlist = $("#coinlist");
                let swap_coin_list = $('#swap_coin_list');
                let swap_coin_list_2 = $('#swap_coin_list_2');
                let rec_coin_list = $("#rec_coin_list");
                let image_root_url = $('[name=image_root_url]');
                let coin_header = $("#coin_header");


                //user
                let user_id = $('[name=user_id]');


                //base_url
                let base_url = $('[name=base_url]');

                function addCommas(nStr) {
                    nStr += '';
                    x = nStr.split('.');
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                    }
                    return x1 + x2;
                }

            </script>

@endsection
