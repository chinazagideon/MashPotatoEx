@extends('appV2.layouts.nav')
@section('page_title', 'Exchange ')
@section('content')
    <div id="application">

        <div class="container-fluid mtb15 no-fluid">
            <div class="row sm-gutters">
                <div class="col-md-3">
                    <div class="market-pairs">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><i
                                        class="icon ion-md-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search"
                                   aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <ul class="nav nav-pills" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#BTC" role="tab"
                                   aria-selected="true"></a>
                            </li>

                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="BTC" role="tabpanel">
                                <div v-if="loading">
                                    Loading...
                                </div>
                                <table v-else class="table">
                                    <thead class="active">
                                    <tr>
                                        <th>Pairs</th>
                                        <th>Last Price</th>
                                        <th>Change</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="(pair, index) in markets" :key="pair.displayName"
                                        v-on:click="fetchTicker(pair.symbol); fetchAskTicker(pair.symbol)">
                                        <td><i class="icon ion-md-star"></i> @{{ pair.displayName }}</td>
                                        <td>@{{pair.markPrice}}</td>
                                        <td v-if="pair.dailyChange > 0" class="green">@{{pair.dailyChange}}</td>
                                        <td v-if="pair.dailyChange <= 0" class="red">@{{pair.dailyChange}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-chart mb15">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div id="tradingview_e8053"></div>
                            <script src="https://s3.tradingview.com/tv.js"></script>
                            <script>
                                new TradingView.widget(
                                    {
                                        "width": "100%",
                                        "height": 550,
                                        "symbol": "BITSTAMP:BTCUSDT",
                                        "interval": "D",
                                        "timezone": "Etc/UTC",
                                        "theme": "Light",
                                        "style": "1",
                                        "locale": "en",
                                        "toolbar_bg": "#f1f3f6",
                                        "enable_publishing": false,
                                        "withdateranges": true,
                                        "hide_side_toolbar": false,
                                        "allow_symbol_change": true,
                                        "show_popup_button": true,
                                        "popup_width": "1000",
                                        "popup_height": "650",
                                        "container_id": "tradingview_e8053"
                                    }
                                );
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                    <div class="market-trade">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pills-trade-limit" role="tab"
                                   aria-selected="true">Limit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pills-market" role="tab"
                                   aria-selected="false">Market</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pills-stop-limit" role="tab"
                                   aria-selected="false">Stop
                                    Limit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pills-stop-market" role="tab"
                                   aria-selected="false">Stop
                                    Market</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-trade-limit" role="tabpanel">
                                <div class="d-flex justify-content-between">
                                    <div class="market-trade-buy">
                                        <div class="input-group">
                                            <input type="number" class="form-control" readonly placeholder="Price">
                                            <div class="input-group-append">
                                                <span class="input-group-text">BTC</span>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input type="number" class="form-control" readonly placeholder="Amount">
                                            <div class="input-group-append">
                                                <span class="input-group-text">USDT</span>
                                            </div>
                                        </div>
                                        <ul class="market-trade-list">
                                            <li><a href="#!">25%</a></li>
                                            <li><a href="#!">50%</a></li>
                                            <li><a href="#!">75%</a></li>
                                            <li><a href="#!">100%</a></li>
                                        </ul>
                                        <p>Available: <span>@{{ buy_exchange.crypto_bal }} = @{{ buy_exchange.trade_balance }} USDT</span></p>
                                        <p>Volume: <span>@{{ ex_result.amount }} USDT</span></p>
                                        <p>Margin: <span>@{{ ex_result.quantity }} USDT</span></p>
                                        <button class="btn buy" disabled>Buy</button>
                                    </div>
                                    <div class="market-trade-sell">
                                        <div class="input-group">
                                            <input type="number" class="form-control" readonly placeholder="Price">
                                            <div class="input-group-append">
                                                <span class="input-group-text">USDT</span>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input type="number" class="form-control" readonly placeholder="Amount">
                                            <div class="input-group-append">
                                                <span class="input-group-text">BTC</span>
                                            </div>
                                        </div>
                                        <ul class="market-trade-list">
                                            <li><a href="#!">25%</a></li>
                                            <li><a href="#!">50%</a></li>
                                            <li><a href="#!">75%</a></li>
                                            <li><a href="#!">100%</a></li>
                                        </ul>
                                        <p>Available: <span>@{{ buy_exchange.crypto_bal }} = @{{ buy_exchange.trade_balance }} USDT</span></p>
                                        <p>Volume: <span>@{{ ex2_result.amount }} USDT</span></p>
                                        <p>Margin: <span>@{{ ex2_result.quantity }} USDT</span></p>
                                        <button class="btn sell" disabled>Sell</button>
                                    </div>
                                </div>
                                <br/>
                                <div class="text-center">
                                <h6><span class="icon ion-md-play-circle"></span> BOT TRADING IS ACTIVE </h6>


                                </div>
                            </div>
                        </div>

                    </div>
                    <br/>
                    <a class="btn btn-dark btn-sm mt-6 " href="{{route('exchanger')}}"><span class="icon ion-md-settings"></span> Manage Trade Bot</a>

                </div>
                <div class="col-md-3">
                    <div class="order-book mb15">
                        <h2 class="heading">Order Book</h2>
                        <section v-if="errored">
                            <p>We're sorry, we're not able to retrieve this information at the moment, please try back
                                later</p>
                        </section>
                        <section v-else>
                            <div v-if="loading">
                                Loading...
                            </div>


                            <table v-else class="table">
                                <thead>
                                <tr>
                                    <th>Price(USDT)</th>
                                    <th>Amount(@{{ crypto.msg }})</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(bid, index) in bids" :class=" bid.level" :key="bid.id">
                                    <td class='red'>@{{ bid.price }}</td>
                                    <td>@{{ bid.qty }}</td>
                                </tr>

                                </tbody>
                                <tbody class="ob-heading">
                                <tr>
                                    <td>
                                        <span>Open Price</span>
                                        @{{ symbol.open }}
                                    </td>
                                    <td>
                                        <span>Market Price</span>
                                        @{{ symbol.markPrice }}
                                    </td>
                                    <td class="red" v-if="symbol.dailyChange < 0">
                                        <span>Change</span>
                                        @{{ symbol.dailyChange }}
                                    </td>
                                    <td class="green" v-if="symbol.dailyChange >= 0">
                                        <span>Change</span>
                                        @{{ symbol.dailyChange }}
                                    </td>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr v-for="(ask, index) in asks" :class="ask.level" :key="ask.id">
                                    <td class='green'>@{{ ask.price }}</td>
                                    <td>@{{ ask.qty }}</td>
                                </tr>
                            </table>
                        </section>
                    </div>
                    <div class="market-history">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#recent-trades" role="tab"
                                   aria-selected="true">Recent
                                    Trades</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="recent-trades" role="tabpanel">

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Amount</th>
                                        <th>profit</th>
                                        <th>Type</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(order, index) in recent_orders" class="" key="">

                                        <td>@{{ order.time }}</td>
                                        <td>@{{order.qty}}</td>
                                        <td v-if="order.profit < 0"><span class="text-danger">@{{order.profit}}</span></td>
                                        <td v-else> <span class="text-success">@{{order.profit}}</span></td>
                                        <td v-if="order.type === 'bid'" class="red">@{{order.type}}</td>
                                        <td v-if="order.type === 'ask'" class="green">@{{order.type}}</td>

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
    <input type="hidden" ref="uid" id="uid" value="{{Auth::user()->id}}"/>
@endsection

@section('page_js')

    <script>
        let usr = $('#uid').val();
        new Vue({
            el: '#application',
            data() {
                return {
                    bids: [],
                    asks: [],
                    markets: [],
                    market_timer: null,
                    message: null,
                    timer: '',
                    ask_timer: '',
                    errored: false,
                    loading: true,
                    symbol_timer: null,
                    biduri: "/api/ticker/BTC_USDT/bids",
                    askurl: "/api/ticker/BTC_USDT/asks",
                    url: null,
                    recent_orders: [],
                    order_timer: null,
                    usrid: usr,
                    symbol: {
                        type: Object
                    },
                    crypto: {
                        type: Object
                    },
                    buy_exchange: {
                        type: Object
                    },
                    sell_exchange: {
                        type: Object
                    },
                    ex_result: {
                        type: Object,
                    },
                    ex2_result: {
                        type: Object
                    },
                    exchange_timer1: null,
                    exchange_timer2: null,
                }
            },
            mounted: function () {
                this.fetchTicker()
                this.fetchAskTicker()
                this.fetchSymbol()
                this.fetchLastSymbol()
                this.fetchRecentOrders()
                this.exchangeMarket();
                this.exchangeSellMarket();
                // this.exchange_timer2 = setInterval(this.exchangeMarket, 5000)
                // this.exchange_timer1 = setInterval(this.exchangeSellMarket, 5000)
                setInterval(this.fetchTicker, 5000);
                this.ask_timer = setInterval(this.fetchAskTicker, 5000);
                this.market_timer = setInterval(this.fetchSymbol, 5000);
                this.symbol_timer = setInterval(this.fetchLastSymbol, 5000);
                this.order_timer = setInterval(this.fetchRecentOrders, 5000);
            },
            methods: {
                fetchTicker: function (url = null) {
                    axios.get(url === null ? this.biduri : "/api/ticker/" + url + "/bids")
                        .then(response => (
                            this.bids = response.data.data,
                                this.loading = false
                        ))
                        .catch(error => {
                            console.log("Error", error)
                        }).finally(() => this.loading = false);
                },
                fetchAskTicker: function (url = null) {
                    axios.get(url === null ? this.askurl : "/api/ticker/" + url + "/asks")
                        .then(response => (
                            this.asks = response.data.data,
                                this.loading = false
                        ))
                        .catch(error => {
                            console.log("Error", error),
                                this.errored = true
                        }).finally(() => this.loading = false);
                },
                fetchSymbol: function () {
                    axios.get('/api/tickers/market/100')
                        .then(response => (
                            this.markets = response.data.data
                        ))
                        .catch(error => {
                            console.log("Error", error)
                        }).finally(() => this.loading = false)
                },
                fetchLastSymbol: function () {
                    axios.get('/api/tickers/symbol/BTC_USDT')
                        .then(response => (
                            this.symbol = response.data.data,
                                this.crypto = response.data

                        ))
                        .catch(error => {
                            console.log("Error", error)
                        });
                },
                fetchRecentOrders: function(){
                    axios.get('/api/orders/traded/'+this.usrid)
                        .then(response => (
                            this.recent_orders = response.data.data
                        ))
                        .catch(error => {
                            console.log("Error", error)
                        });
                },
                exchangeMarket: function(){
                    axios.get('/api/mrk/exchange/buy/'+this.usrid)
                        .then(response => {
                            this.ex_result = response.data.data.result;
                            this.buy_exchange = response.data.data;
                        }).catch(error => {
                            console.log("Error", error);
                    });
                },
                exchangeSellMarket: function(){
                    axios.get('/api/mrk/exchange/sell/'+this.usrid)
                        .then(response => {
                            this.ex2_result = response.data.data.result;
                        }).catch(error => {
                        console.log("Error", error);
                    });
                }
            }
        });


    </script>
@endsection


@section('page_css')
    {{--    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>--}}

    <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection
