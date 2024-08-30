@extends('appV2.layouts.nav')
@section('page_title', 'Trade History')
@section('content')
    <div id="exchange">
        <div class="settings mtb15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-3">
                        <div class="nav flex-column nav-pills settings-nav" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link" href="{{route('account')}}"><i class="icon ion-md-person"></i>
                                Profile</a>
                            <a class="nav-link active" id="settings-wallet-tab" data-toggle="pill"
                               href="#settings-wallet"
                               role="tab"
                               aria-controls="settings-wallet" aria-selected="false"><i class="icon ion-md-wallet"></i>
                                Trade Bot</a>

                            <a class="nav-link" href="{{route('trader')}}"><i class="icon ion-md-arrow-back"></i>
                                Return to Trader</a>
                            <a class="nav-link" href="{{route('dashboard')}}" role="tab"
                               aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i>
                                Goto dashboard</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="alert alert-success col-8" v-if="transfer.alert">
                                <p>@{{ transfer.msg }}</p>
                            </div>

                            <div class="tab-pane fade show active" id="settings-wallet" role="tabpanel"
                                 aria-labelledby="settings-wallet-tab">
                                <div class="wallet">
                                    <div class="row">

                                        <div class="col-md-12 col-lg-8">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="coinBTC" role="tabpanel">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Balances</h5>
                                                            <ul>
                                                                <li class="d-flex justify-content-between align-items-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="icon ion-md-cash"></i>
                                                                        <h2>Total Equity</h2>
                                                                    </div>
                                                                    <div>
                                                                        <h3>@{{trade_bal.trade_balance}}
                                                                            @{{trade_bal.currency}}</h3>
                                                                    </div>
                                                                </li>
                                                                <li class="d-flex justify-content-between align-items-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <i class="icon ion-md-checkmark"></i>
                                                                        <h2>Available Margin</h2>
                                                                    </div>
                                                                    <div>
                                                                        <h3>@{{margin.margin_balance}}
                                                                            @{{trade_bal.currency}}</h3>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <button v-on:click="redirectToS" class="btn green">Fund
                                                                trading account
                                                            </button>
                                                            <button class="btn red" type="button"
                                                                    class="btn btn-outline-warning" data-toggle="modal"
                                                                    data-target="#transferTradeFund">Transfer to Wallet
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Latest Trades</h5>
                                                            <div class="wallet-history">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Time</th>
                                                                        <th>Amount</th>
                                                                        <th>profit</th>
                                                                        <th>Symbol</th>
                                                                        <th>Exchange</th>
                                                                        <th>Type</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr v-for="(order, index) in recent_orders" class=""
                                                                        key="">

                                                                        <td>@{{ order.time }}</td>
                                                                        <td>@{{order.qty}}</td>
                                                                        <td v-if="order.profit < 0"><span class="text-danger">@{{order.profit}}</span></td>
                                                                        <td v-else> <span class="text-success">@{{order.profit}}</span></td>
                                                                        <td>@{{ order.pair }}</td>
                                                                        <td>@{{ order.exchange }}</td>
                                                                        <td v-if="order.type === 'bid'" class="red"><i
                                                                                class="icon ion-md-checkmark-circle-outline red"></i>@{{order.type}}
                                                                        </td>
                                                                        <td v-if="order.type === 'ask'" class="green"><i
                                                                                class="icon ion-md-checkmark-circle-outline green"></i>@{{order.type}}
                                                                        </td>
                                                                        <td>
                                                                            <a type="button"
                                                                               v-on:click="getSingleOrder(order.refcode)"><i
                                                                                    class="icon ion-md-open dark-bb"></i></a>
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
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-7 col-lg-7 align-self-center">
                                                            <div class="timer-data">
                                                                <div class="icon-info mt-1 mb-3">
                                                                    <i class="dripicons-phone bg-soft-dark"></i>
                                                                </div>
                                                                <h3 class="mt-0 text-dark">0m:27s</h3>
                                                                <h4 class="mt-0 header-title text-truncate font-15 mb-0">
                                                                    Avg.Speed of botTrade</h4>
                                                                <p class="text-muted mb-0 "
                                                                   v-if="bot_status.status === 1"> Suspend bot
                                                                    trading.<br/>NB: Bot Trading activities will halt
                                                                    for your account.</p>
                                                                <p class="text-muted mb-0"
                                                                   v-if="bot_status.status === 0"> Start bot
                                                                    trading.<br/>NB: Bot Trading activities will start
                                                                    for your account.</p>
                                                                <br/>
                                                                <button class="btn btn-success"
                                                                        v-if="bot_status.status === 0"
                                                                        v-on:click="botTraderStatus"> Start Trader
                                                                </button>
                                                                <button class="btn btn-danger"
                                                                        v-if="bot_status.status === 1"
                                                                        v-on:click="botTraderStatus"> Shutdown Trader
                                                                </button>

                                                            </div>
                                                        </div><!--end col-->

                                                    </div><!--end row-->
                                                </div><!--end card-body-->
                                            </div><!--end card-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="transferTradeFund" tabindex="-1" role="dialog"
                             data-backdrop="static" data-keyboard="false"
                             aria-labelledby="exampleModalDefaultLogin"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="padding-bottom: 0px !important;" id="coin_header">
                                        Transfer to wallet
                                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="icon ion-md-close"></i></span>
                                        </button>
                                    </div><!--end modal-header-->
                                    <div class="modal-body">

                                        <div class="card-body">

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active p-3 pt-3" id="Send_Coin" role="tabpanel">
                                                    <h4 class="text-info">@{{ transfer.error_pane }}</h4>
                                                    <form class="form-horizontal auth-form my-4" method="post"
                                                          action="{{route('transfer_wallet')}}" id="">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Select transfer
                                                                coin</label>
                                                            <select class="form-control" v-model="selected_coin"
                                                                    v-on:change="fetchFiatValue();validateVal()">
                                                                <option selected value="null" disabled>Select coin
                                                                </option>
                                                                <option v-for="(coin, index) in coinlist"
                                                                        v-bind:value="coin.coin_slug">
                                                                    @{{coin.coin_name}}
                                                                </option>

                                                            </select>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="example-input3-group1">Amount</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-dollar-sign"></i>$</span>
                                                                        </div>
                                                                        <input type="text" id="amount"
                                                                               v-on:input="fetchCoinPrice();validateVal()"
                                                                               name="amount_to_send"
                                                                               v-model="amount_fiat"
                                                                               class="form-control amount_send_input"
                                                                               placeholder="..">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-3">

                                                                <div class="form-group">
                                                                    <label for="example-input3-group1">Qty</label>
                                                                    <div class="input-group">
                                                                        <input type="text" id="qty_send"
                                                                               v-on:input="fetchFiatValue();validateVal()"
                                                                               name="send_qty"
                                                                               class="form-control qty_send_input"
                                                                               placeholder=".." v-model="amount_crypto">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                  id="sendCoin">@{{ selected_coin }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Select
                                                                Destination</label>
                                                            <select class="form-control" id="desitnation"
                                                                    name="destination">
                                                                <option value="balance" selected>Wallet Balance</option>
                                                            </select>
                                                        </div>


                                                        <div class="form-group mb-0 row">

                                                            <div class="col-12 mt-2">
                                                                <small class="text-muted">*withdrawal fees applied</small>
                                                                <button v-if="transfer.loading"
                                                                        class="btn btn-primary btn-block waves-effect waves-light"
                                                                        id="transfer_fund" :disabled="trf_btn === 0"
                                                                        v-on:click="transferWallet"
                                                                        type="button">
                                                                    <i class="la la-spinner text-primary la-spin progress-icon-spin"></i>
                                                                    Transferring fund... <i
                                                                        class="fas fa-sign-in-alt ml-1"></i></button>
                                                                <button v-else
                                                                        class="btn btn-primary btn-block waves-effect waves-light"
                                                                        id="transfer_fund" :disabled="trf_btn === 0"
                                                                        v-on:click="transferWallet"
                                                                        type="button">Transfer to wallet <i
                                                                        class="fas fa-sign-in-alt ml-1"></i></button>
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
                        <button type="button" style="display: none" id="OrderModelBtn"
                                class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModalScrollable">

                        </button>
                        <div class="modal fade" v-if="model_active" id="exampleModalScrollable" tabindex="-1"
                             role="dialog" data-backdrop="static" data-keyboard="false"
                             aria-labelledby="exampleModalDefaultLogin"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title m-0" id="exampleModalScrollableTitle">Trade (@{{
                                            single_order.pair }}) </h6>
                                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="icon ion-md-close"></i></span>
                                        </button>
                                    </div><!--end modal-header-->

                                    <div class="modal-body">
                                        <p>@{{ single_order.trade_time }}</p>

                                        <div class="market-trade">

                                            <div class="tab-content">

                                                <div id="pills-trade-limit" role="tabpanel"
                                                     class="tab-pane fade show active">
                                                    <div class="d-flex justify-content-between">

                                                        <div class="market-trade-buy">

                                                            <p>@{{ single_order.pair }} <span><strong>@{{ single_order.exchange }}</strong></span>
                                                            </p>

                                                            <p>Amount: <span> @{{ single_order.amount }}@{{ single_order.currency }}</span>
                                                            </p>
                                                            <p>Total Profit: <span>@{{ single_order.total_profit }} @{{ single_order.currency }}</span>
                                                            </p>
                                                            <p>Invite Profit: <span>@{{ single_order.invite_profit }}@{{ single_order.currency }}</span>
                                                            </p>

                                                            <button disabled="disabled"
                                                                    v-if="single_order.trade_type === 'bid'"
                                                                    class="btn sell">@{{
                                                                allCaps(single_order.trade_type) }}
                                                            </button>
                                                            <button disabled="disabled"
                                                                    v-if="single_order.trade_type === 'ask'"
                                                                    class="btn buy">@{{ allCaps(single_order.trade_type)
                                                                }}
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="text-center"><h6><span
                                                                class="badge badge-danger"></span> BOT TRADING IS
                                                            ACTIVE</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end modal-body-->

                                </div><!--end modal-content-->
                            </div><!--end modal-dialog-->
                        </div><!--end modal-->

                        <input type="hidden" value="{{Auth::user()->id}}" id="uid"/>
                        @endsection


                        @section('page_js')
                            <script>
                                var usrid = $('#uid').val();

                                new Vue({
                                    el: "#exchange",
                                    data() {
                                        return {
                                            user_d: usrid,
                                            trade_bal: {
                                                type: Object,
                                            },
                                            model_active: false,
                                            recent_orders: [],
                                            margin: {
                                                type: Object,
                                            },
                                            single_order: {
                                                type: Object,
                                            },
                                            timer: null,
                                            selected_coin: null,
                                            coinlist: [],
                                            amount_fiat: null,
                                            amount_crypto: null,
                                            trf_btn: 0,
                                            transfer: {
                                                error_pane: {
                                                    type: Object,
                                                },
                                                loading: false,
                                                alert: false,
                                                msg: {
                                                    type: Object,
                                                }
                                            },
                                            shutdown: false,
                                            bot_status: {
                                                type: Object,
                                            },

                                        }
                                    },
                                    mounted() {
                                        this.getCurrentBotStatus();
                                        this.transfer.msg = null;
                                        this.transfer.error_pane = null;
                                        this.fetchCoinList();
                                        this.fetchTradeBalance();
                                        this.fetchRecentOrders();
                                        this.timer = setInterval(this.fetchRecentOrders, 10000);

                                    },
                                    methods: {
                                        fetchTradeBalance: function () {
                                            axios.get('/api/trade/balance/' + this.user_d)
                                                .then(response => {
                                                    this.trade_bal = response.data.data;
                                                    this.margin = response.data.data;
                                                }).catch(error => {
                                                console.log("Error", error);
                                            })
                                        },
                                        getSingleOrder: function (refcode) {
                                            axios.get('/api/trade/order/' + refcode)
                                                .then(response => {
                                                    this.single_order = response.data.data;
                                                    if (response.data.status === 200) {
                                                        this.model_active = true;
                                                        $('#OrderModelBtn').click();
                                                    }
                                                }).catch(error => {
                                                console.log("Error", error);
                                            })
                                        },
                                        allCaps: function (charr) {
                                            return charr.toUpperCase();
                                        },

                                        fetchRecentOrders: function () {
                                            axios.get('/api/orders/traded/' + this.user_d)
                                                .then(response => (

                                                    this.recent_orders = response.data.data
                                                ))
                                                .catch(error => {
                                                    console.log("Error", error)
                                                });
                                        },
                                        redirectToS: function () {
                                            window.location.href = "/trader/subscribe";
                                        },
                                        fetchCoinList: function () {
                                            axios.get("/api/coins/v/list")
                                                .then(response => {
                                                    this.coinlist = response.data.data;
                                                }).catch(error => {
                                                console.log("Error", error)
                                            })
                                        },
                                        fetchCoinPrice: function () {
                                            this.errorMsg = null;
                                            axios.get("/api/coins/info/single/" + this.selected_coin)
                                                .then(response => {
                                                    this.amount_crypto = this.amount_fiat / response.data.data.coin.coin_info.price;
                                                    // this.qty_send = this.selected_coin === 'USDT' ? this.coin_equ.toFixed(2) : this.coin_equ.toFixed(4);
                                                    this.coin_name = response.data.data.coin.coin_name;
                                                }).catch(error => {
                                                console.log("Error", error)
                                            });
                                        },
                                        fetchFiatValue: function () {
                                            this.errorMsg = null;
                                            axios.get("/api/coins/info/single/" + this.selected_coin)
                                                .then(response => {
                                                    this.amount_fiat = this.amount_crypto * response.data.data.coin.coin_info.price;
                                                    this.coin_name = response.data.data.coin.coin_name;
                                                }).catch(error => {
                                                console.log("Error", error)
                                            });
                                        },
                                        transferWallet: function () {
                                            this.trf_btn = 0;
                                            this.transfer.loading = true;
                                            this.transfer.error_pane = "";
                                            axios.post("/api/trader/transfer",
                                                {
                                                    'usr_id': this.user_d,
                                                    'amount_crypto': this.amount_crypto,
                                                    'amount_fiat': this.amount_fiat,
                                                    'coin_slug': this.selected_coin,
                                                },
                                                {
                                                    headers: {
                                                        'Content-type': 'application/x-www-form-urlencoded',
                                                    }
                                                }).then(response => {
                                                if (response.data.status === 200) {

                                                    this.transfer.error_pane = response.data.msg;
                                                    setInterval($('.close').click(), 5000);
                                                    this.transfer.alert = true;
                                                    this.transfer.msg = response.data.msg;

                                                    setTimeout(function () {
                                                        window.location.reload()
                                                    }, 5000);

                                                } else {
                                                    this.transfer.error_pane = response.data.msg;
                                                    this.trf_btn = 1;
                                                }
                                            }).catch(error => {
                                                console.log("error", error);
                                            }).finally(() => {
                                                this.transfer.loading = false;
                                            });
                                        },
                                        validateVal: function () {
                                            if (this.amount_crypto > 0 && this.amount_fiat > 0 && this.selected_coin !== null) {
                                                this.trf_btn = 1;
                                            } else {
                                                this.trf_btn = 0;
                                            }
                                        },
                                        botTraderStatus: function () {
                                            axios.get("/api/bot/status/" + this.user_d)
                                                .then(response => {
                                                    this.getCurrentBotStatus();
                                                }).catch(error => {
                                                console.log("Error", error);
                                            })
                                        },
                                        getCurrentBotStatus: function () {
                                            axios.get('/api/bot/status/' + this.user_d + '/current')
                                                .then(response => {
                                                    this.bot_status = response.data.data;
                                                }).catch(error => {
                                                console.log("Error", error);
                                            });
                                        },
                                    },
                                    // Ready
                                    ready: function () {
                                    }
                                });
                            </script>
                        @endsection

                        @section('page_css')
                            {{--    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>--}}

                            <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
                            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection
