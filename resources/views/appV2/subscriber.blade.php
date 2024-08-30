@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Trade Dashboard')
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 align-self-center">
                            <div class="p-5">
                                <span class="bg-soft-dark p-2 rounded">Bot Trading</span>
                                @if(Auth::user()->active_bot_trade)
                                    <span class="bg-soft-success p-2 rounded">ACTIVE</span>
                                @else
                                    <span class="bg-soft-danger p-2 rounded">NOT ACTIVE</span>

                                @endif
                                <h1 class="my-4 font-weight-bold">Manage Your trade With <span class="text-primary">MaxBot</span>.
                                </h1>
                                <p class="font-14 text-muted">Set automated trades and never miss a rally or get caught
                                    in a dip.
                                    {{config('app.name')}}
                                    obsessively seeks out effective market indicators to enable smart allocation of
                                    funds while putting you in control of your machine.
                                </p>
                                @if(Auth::user()->active_bot_trade)
                                    <a href="{{route('activate_trader')}}" type="button"
                                       class="btn btn-outline-primary">View Trader</a>
                                @else
                                    <a href="{{route('activate_trader')}}" type="button"
                                       class="btn btn-outline-primary">Activate Trader</a>
                                @endif
                                <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                                        data-target="#transferTradeFund">Transfer Fund
                                </button>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-5 offset-lg-1 text-center">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{asset('appV1/dashb/assets/images/Forex-Robot.jpg')}}"
                                             class="d-block w-100" alt="...">
                                    </div>
                                </div>

                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div>
    <div id="el_subscriber">
        <div class="row">
            {{--        @if(Auth::user()->active_bot_trade)--}}
            <div class="col-lg-4">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="media">
                                    <img :src="img" alt=""
                                         class="align-self-center" height="40">&nbsp;&nbsp;
                                    <div class="media-body align-self-center ms-3">
                                        <h6 class="m-0 font-20">@{{ numberFormatVar(bal.balance) }}@{{ bal.currency
                                            }}</h6>
                                        <p class="text-muted mb-0">Trade Balance</p>
                                    </div><!--end media body-->
                                </div><!--end media-->
                            </div><!--end col-->
                            <div class="col-auto align-self-center">
                                {{--                            <p class="mb-0"><span class="text-success"><i class="mdi mdi-trending-up"></i>4.8%</span> Then Last Month</p>--}}
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                    <div class="row">
                        <div class="col-12">
                            @include('appV2.includes.widget_chart')
                        </div><!--end col-->
                    </div>
                </div> <!--end card-->

            </div>
            <div class="col-lg-4">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="media">
                                    <img :src="img" alt=""
                                         class="align-self-center" height="40">&nbsp;&nbsp;
                                    <div class="media-body align-self-center ms-3">
                                        <h6 class="m-0 font-20">
                                            @{{ numberFormatVar(bal.profit) }}@{{ bal.currency }}</h6>
                                        <p class="text-muted mb-0">Profit</p>
                                    </div><!--end media body-->
                                </div><!--end media-->
                            </div><!--end col-->
                            <div class="col-auto align-self-center">
                                {{--                            <p class="mb-0"><span class="text-success"><i class="mdi mdi-trending-up"></i>4.8%</span> Then Last Month</p>--}}
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                    <div class="row">
                        <div class="col-12">
                            @include('appV2.includes.widget_chart')
                        </div><!--end col-->
                    </div>
                </div> <!--end card-->

            </div>
            <div class="col-lg-4">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="media">
                                    <img :src="img" alt=""
                                         class="align-self-center" height="40">&nbsp;&nbsp;
                                    <div class="media-body align-self-center ms-3">
                                        <h6 class="m-0 font-20">
                                            @{{ roundFigure((bal.bonus)) }}@{{ bal.currency }} </h6>
                                        <p class="text-muted mb-0">Referral Commission</p>
                                    </div><!--end media body-->
                                </div><!--end media-->
                            </div><!--end col-->
                            <div class="col-auto align-self-center">
                                {{--                            <p class="mb-0"><span class="text-success"><i class="mdi mdi-trending-up"></i>4.8%</span> Then Last Month</p>--}}
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                    <div class="row">
                        <div class="col-12">
                            @include('appV2.includes.widget_chart')
                        </div><!--end col-->
                    </div>
                </div> <!--end card-->

            </div>
            {{--            @endif--}}
        </div>

        <div class="modal fade" id="transferTradeFund" tabindex="-1" role="dialog" data-backdrop="static"
             data-keyboard="false"
             aria-labelledby="exampleModalDefaultLogin"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px !important;" id="coin_header">
                        <ul class="nav-border nav nav-pills" role="tablist" style="font-size: 24px; ">
                            <li class="nav-item">
                                <a class="nav-link active font-weight-semibold" data-toggle="tab"
                                   href="#trnsfr_tab" role="tab" id="trnsfr_tab">Transfer Fund</a>
                            </li>

                        </ul>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                        </button>
                    </div><!--end modal-header-->
                    <div class="modal-body">

                        <div class="card-body">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active p-3 pt-3" id="" role="tabpanel">
                                    <form class="form-horizontal auth-form my-4" method="post"
                                          action="{{route('transfer_fund')}}" id="">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Select coin</label>
                                            <select class="form-control" name="coin_slug" @change="transfer2Trader();coinBalance();transfer2Trader2()" id="slug22"
                                                    v-model="selected_coin">
                                                <option selected value="null" disabled>Select coin</option>
                                                <option v-for="(active, index) in coins"
                                                        v-bind:value="active.coin_slug">
                                                    @{{active.coin_name}}
                                                </option>
                                            </select>
                                            <small>Balance: @{{ selected_coin_balance }} @{{ selected_coin_slug }}</small>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-3">
                                                <div class="form-group">
                                                    <label for="example-input3-group1">Amount</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-dollar-sign"></i></span>
                                                        </div>
                                                        <input type="text" id="" @input="transfer2Trader"
                                                               v-model="amount_fiat" name="amount_to_send"
                                                               class="form-control " placeholder="..">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-3">

                                                <div class="form-group">
                                                    <label for="example-input3-group1">Qty</label>
                                                    <div class="input-group">
                                                        <input type="text" @input="transfer2Trader2" id=""
                                                               v-model="amount_crypto" name="send_qty"
                                                               class="form-control qty_send_input" placeholder="..">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="sendCoin">@{{ selected_coin_slug }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Select Destination</label>
                                            <select class="form-control" id="desitnation" name="destination">
                                                <option value="trade" selected>Trade Balance</option>
                                            </select>
                                        </div>


                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-primary btn-block waves-effect waves-light"
                                                        id="transfer_fund"
                                                        type="submit">Transfer <i class="fas fa-sign-in-alt ml-1"></i>
                                                </button>
                                            </div><!--end col-->

                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <input type="hidden" id="usrid" value="{{Auth::user()->id}}" name="userId"/>
    <input type="hidden" id="image_root_url" value="{{env('CRYPTO_COMPARE_URL')}}">
    </div>


@endsection
@section('page_js')
    <script>
        new Vue({
            el: "#el_subscriber",
            data() {
                return {
                    usr: $('#usrid').val(),
                    coins: {
                        type: Object
                    },
                    selected_coin: null,
                    selected_coin_slug: null,
                    selected_coin_balance: 0,
                    amount_fiat: 0,
                    amount_crypto: 0,
                    transfer_btn: 0,
                    bal: {
                        bonus: {
                            type: Object,
                        },
                        profit: {
                            type: Object,
                        },
                        balance: {
                            type: Object,
                        },
                        currency: {
                            type: Object,
                        },
                        timer: null,
                    },
                    coinslug: "USDT",
                    image_root: $('#image_root_url').val(),
                    img: {
                        type: Object,
                    }
                }
            },
            mounted() {
                this.getBalanceRealT();
                this.getCoinInfo();
                this.getCoinlist();
                this.bal.timer = setInterval(this.getBalanceRealT, 5000);


            },
            methods: {
                getBalanceRealT: function () {
                    axios.get('/api/trade/balance/' + this.usr)
                        .then(response => {
                            this.bal.profit = response.data.data.trade_profit;
                            this.bal.balance = response.data.data.trade_balance;
                            this.bal.bonus = response.data.data.referral_bonus;
                            this.bal.currency = response.data.data.currency;


                        }).catch(error => {
                        console.log('Error', error);
                    })
                },
                getCoinInfo: function () {
                    axios.get('/api/coin/' + this.coinslug)
                        .then(response => {
                            this.img = this.image_root + "/" + response.data.coin.image_url;
                        }).catch(error => {
                        console.log("Error", error);
                    })
                },
                numberFormatVar: function (nStr) {
                    nStr += '';
                    x = nStr.split('.');
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                    }
                    return x1 + x2;
                },
                roundFigure: function (value) {
                    return this.numberFormatVar(value);
                },
                transfer2Trader: function () {
                    axios.get('/api/coins/info/single/' + this.selected_coin)
                        .then(response => {
                            this.selected_coin_slug = response.data.data.coin.coin_slug;
                            let coinprice = response.data.data.coin.coin_info.price;
                            this.amount_crypto = this.amount_fiat / coinprice;
                        });
                },
                transfer2Trader2: function(){
                    axios.get('/api/coins/info/single/' + this.selected_coin)
                        .then(response => {
                            this.selected_coin_slug = response.data.data.coin.coin_slug;
                            let coinprice = response.data.data.coin.coin_info.price;
                            this.amount_fiat = this.amount_crypto * coinprice;
                        });
                },
                getCoinlist: function () {
                    axios.get('/api/coins/list')
                        .then(response => {
                            this.coins = response.data.coins;
                        });
                },
                coinBalance: function(){
                    let coin_slug = $('#slug22').val();
                    let user_id = $('#usrid').val();
                    axios.get('/api/coin/balance/'+ user_id +'/' + coin_slug)
                        .then(response => {
                            this.selected_coin_balance = response.data.coin_balance;
                        })
                }
            }

        })
    </script>

    <script src="{{asset('appV1/dashb/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->


    <script src="{{asset('appV1/dashb/plugins/apex-charts/apexcharts.min.js')}}"></script>
    {{--    <script src="{{asset('appV1/dashb/assets/pages/jquery.analytics_dashboard.init.js')}}"></script>--}}

@endsection

@section('page_css')

    <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection
