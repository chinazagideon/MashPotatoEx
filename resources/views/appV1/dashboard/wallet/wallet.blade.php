@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'My Wallet')
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
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="button" id="sendBtnLarge" data-toggle="modal"
                                            data-target="#exampleModalCoin"
                                            role="button" class="btn btn-lg btn-outline-primary px-3 mt-2 btn-block">Send
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" id="recBtnLarge" data-toggle="modal"
                                            data-target="#exampleModalCoin"
                                            role="button" class="btn btn-lg btn-outline-primary px-3 mt-2 btn-block">Receive
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('wallet_history')}}" class="btn btn-lg btn-outline-primary px-3 mt-2 btn-block">
                                        <i class="dripicons-article"></i> Wallet history
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('import')}}" class="btn btn-lg btn-outline-primary px-3 mt-2 btn-block">
                                        <i class="dripicons-upload"></i> Import Wallet
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div>
            </div>
        </div>

        <div class="row" v-if="loaded">

            <div class="col-lg-12">
                <div class="card hidden-sm">
                    <div class="card-header ">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Wallet Balance</h4>
                            </div><!--end col-->

                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="row">
                    <div class="col-md-6">
                        <div class="earning-data text-center">

                            <img src="{{asset('appV1/assets/images/money-beg.png')}}" alt="" class="money-bag my-3"
                                 height="60">
                            <h5 class="earn-money mb-1" id="">@{{ coin_balance+" BTC" }}</h5>
                            {{--                        <h5 class="earn-money mb-1" id="fiat_balance_2">$0.00</h5>--}}

                            <p class="text-muted font-15 mb-4">Total Balance</p>

                        </div>

                    </div>
                    <div class="col-md-6">
                    <div class="card-body border-bottom-dashed">

                            <div class="earning-data text-center">

                                <img src="{{asset('appV1/assets/images/money-beg.png')}}" alt="" class="money-bag my-3"
                                     height="60">
                                <h5 class="earn-money mb-1" id="">$@{{ user_balance }}</h5>

                                <p class="text-muted font-15 mb-4">Total USD Balance</p>

                            </div>
                        </div>
                    </div><!--end card-body-->
                    </div>
                    <div class="card-footer ">

                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" id="sendBtnLarge" data-toggle="modal"
                                        data-target="#exampleModalCoin"
                                        role="button" class="btn btn-lg btn-outline-primary px-3 mt-2 btn-block">Send
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" id="recBtnLarge" data-toggle="modal"
                                        data-target="#exampleModalCoin"
                                        role="button" class="btn btn-lg btn-outline-primary px-3 mt-2 btn-block">Receive
                                </button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('wallet_history')}}" class="btn btn-lg btn-outline-primary px-3 mt-2 btn-block">
                                    <i class="dripicons-article"></i> Wallet history
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('import')}}" class="btn btn-lg btn-outline-primary px-3 mt-2 btn-block">
                                    <i class="dripicons-upload"></i> Import Wallet
                                </a>
                            </div>
                        </div>
                    </div>

                </div>


            </div><!--end col-->

        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6" v-for="coin in singles">
                <div class="card report-card">
                    <div class="card-body">
                        <div class="row d-flex ">
                            <div class=" col">
                                <p class="text-dark mb-0"><img style="width: 25px; height: 25px" :src="base_image_url+coin.coin_image">&nbsp;@{{ coin.coin_name }}</p>
                                <h4 class="font-weight-semibold m-0"><strong>@{{coin.coin_qty}}</strong> @{{ coin.coin_slug }}</h4>
                                <p class="mb-0 text-truncate text-muted"><span class="text-success"> $@{{ coin.coin_fiat_balance }}</span></p>                                        </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div>

        </div>

    </div>

    <input type="hidden" name="usrid" value="{{Auth::user()->id}}"/>
@endsection


@section('page_js')
    <input type="hidden" id="usrid" value="{{Auth::user()->id}}"/>
    <script>

        let image_root_url = $('[name=image_root_url]');
        new Vue({
            el: "#app",
            data() {
                return {
                    base_image_url: image_root_url.val(),
                    user: $('#usrid').val(),
                    user_balance: {
                        type: Object
                    },
                    coin_balance: {
                        type: Object,
                    },
                    loaded: false,
                    singles: {
                        type: Object,
                    },
                    token_singles: {
                      type: Object,
                    }
                }
            },
            mounted: function () {
                this.loaded = false;
                this.getBalance();
                this.mainWalletBalance();
                this.tokenWalletBalance();
                setInterval(this.getBalance, 5000);
                setInterval(this.mainWalletBalance, 5000);
                setInterval(this.tokenWalletBalance, 5000);
            },
            methods: {
                getBalance: function () {
                    axios.get("/api/user/" + this.user + "/balance/fiat")
                        .then(response => (
                            this.coin_balance = response.data.btc_coin_balance,
                            this.user_balance = addCommas(response.data.fiat_balance)
                        ))
                        .catch(error => {
                            console.log("Error", error)
                        }).finally(()=> {
                            this.loaded = true;
                        });
                },
                mainWalletBalance: function(){
                    axios.get("/api/user/" + this.user + "/balances/fiat")
                        .then( response => {
                            this.singles = response.data.fiat_balances;

                    }).catch(error => {
                        console.log("Error", error);
                    });
                },
                // tokenWalletBalance: function(){
                //     axios.get("/api/token/balances/" + this.user)
                //         .then(response => {
                //             this.token_singles = response.data.fiat_balances;
                //         }).catch(error => {
                //             console.log("Error", error);
                //     })
                // }
            }
        });


        //user
        let user_id = $('[name=usrid]');
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
@section('page_css')

    <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

