@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Swap')
@section('content')
    <div id="el_swap">
        <div class="page-content">
            <div class="container-fluid">
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-lg-8 col-md-8">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Swap Coin</h4>
                                <p class="text-muted mb-0">
                                </p>
                            </div><!--end card-header-->
                            <form id="swapForm" action="{{route('save_swap')}}" method="post">
                                @csrf
                                <div class="card-body bootstrap-select-1">
                                    <div class="row">
                                        <div class="alert alert-primary-shadow col-md-12">
                                            <h3>{{config('app.name')}} SWAP is Swift and Fast</h3>
                                            <p>Select the coin you want to swap from and the one you want.</p>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="mb-1">Swap from</label>
                                            <select class="select2 form-control mb-3 custom-select" v-model="coin_from"
                                                    @change="swapCoin();getCoinBalance()" name="from_coin_slug"
                                                    id="" style="width: 100%; height:36px;">
                                                <option value="null" disabled>Please select coin</option>
                                                <option v-for="(crypto, index) in supported_cryptos"
                                                        v-bind:value="crypto.coin_slug">
                                                    @{{ crypto.coin_name }}
                                                </option>

                                            </select>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label class="mb-1">Swap to</label>
                                            <select class="select2 form-control mb-3 custom-select" v-model="coin_to"
                                                    @change="swapCoin" name="to_coin_slug"
                                                    id="" style="width: 100%; height:36px;">
                                                <option disabled selected value="null">Please select coin</option>
                                                <option v-for="(crypto, index) in supported_cryptos"
                                                        v-bind:value="crypto.coin_slug">
                                                    @{{ crypto.coin_name }}
                                                </option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-4">
                                            <label class="mb-2">Coin Quantity</label>

                                            <div class="input-group">
                                                <input type="text" id="from_coin_qty" @input="swapCoin" @change="swapCoin"
                                                       v-model="amount_from" name="from_coin_qty"
                                                       class="form-control"
                                                       value=""/>
                                                <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="UseMax"
                                                        id="use_max_btn">Use Max</button>
                                                </span>

                                            </div>
                                            <div class="text-right">
                                                <label class="">Coin Balance: <span
                                                        id="">@{{ coin_from_balance }}</span></label>
                                            </div>


                                        </div><!-- end col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-input1-group1">Est. Coin to Receive</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="coin_2_icon"></span>
                                                    </div>
                                                    <input type="text" id="" v-model="amount_to" readonly
                                                           name="to_coin_qty"
                                                           class="form-control" placeholder="Est. Coin Qty to receive">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <p class="text-danger" id="errorMsg"></p>

                                    </div>
                                    <div class="row col-md-12">

                                        <button type="button" @click="swapCoin" v-if="swap_btn === 0" :class="swap_btn === 0 ? 'disabled' : ''" class="btn col-md-5 btn-outline-primary"
                                                id="">
                                            Swap
                                            Coin
                                        </button>
                                        <button type="button" @click="swapCoin" v-if="swap_btn === 1" class="btn col-md-5 btn-outline-primary"
                                                id="swap_coin_btn">
                                            Swap
                                            Coin
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">How to swap.</h4>
                            </div><!--end card-header-->
                            <div class="card-body bg-dark">
                                <div class="slimscroll activity-scroll">
                                    <div class="activity">
                                        <div class="activity-info">
                                            <div class="icon-info-activity">
                                                <i class="las la-check-circle bg-soft-primary"></i>
                                            </div>
                                            <div class="activity-info-text">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0 w-75 text-white">Select from</h6>
                                                    <span class="text-muted d-block"></span>
                                                </div>
                                                <p class="text-muted mt-3">select the crypto you want to exchange for
                                                    another

                                                </p>

                                                <span class="badge badge-soft-secondary">BTC</span>
                                                <span class="badge badge-soft-secondary">USDT</span>
                                                <span class="badge badge-soft-secondary">BNB</span>
                                            </div>
                                        </div>

                                        <div class="activity-info">
                                            <div class="icon-info-activity">
                                                <i class="las la-coins bg-soft-primary"></i>
                                            </div>
                                            <div class="activity-info-text">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0  w-75  mt-2 text-white">Swap to</h6>
                                                    <span class="text-muted"></span>
                                                </div>
                                                <p class="text-muted mt-3">select the crypto you want to receive, i.e
                                                    the
                                                    coin to exchange

                                                </p>
                                                <span class="badge badge-soft-secondary">BTC</span>
                                                <span class="badge badge-soft-secondary">USDT</span>
                                                <span class="badge badge-soft-secondary">BNB</span>
                                            </div>
                                        </div>
                                        <div class="activity-info">
                                            <div class="icon-info-activity">
                                                <i class="las la-clipboard-check bg-soft-primary"></i>
                                            </div>
                                            <div class="activity-info-text">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0  w-75 text-white">Use Max</h6>
                                                    <span class="text-muted"></span>
                                                </div>
                                                <p class="text-muted mt-3">click on use max to exchange all the crypto
                                                    in
                                                    your <strong>select from</strong> wallet

                                                </p>
                                            </div>
                                        </div>

                                        <div class="activity-info">
                                            <div class="icon-info-activity">
                                                <i class="las la-comment-dots bg-soft-primary"></i>
                                            </div>
                                            <div class="activity-info-text">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0 text-white">Estimated Coin</h6>
                                                    <span class="text-muted"></span>
                                                </div>
                                                <p class="text-muted mt-3">The amount of crypto you will receive after a
                                                    successful swap, the value might vary from what
                                                    your see here due to market volatility.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="activity-info">
                                            <div class="icon-info-activity">
                                                <i class="las la-dollar-sign bg-soft-primary"></i>
                                            </div>
                                            <div class="activity-info-text">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0 text-white">Swap Fee</h6>
                                                    <span class="text-muted"></span>
                                                </div>
                                                <p class="text-muted mt-3">Swap fee will be required for each successful
                                                    swap, the fee will be calculated for you to see when you click on
                                                    swap
                                                    coin
                                                </p>
                                            </div>
                                        </div>
                                        <div class="activity-info">
                                            <div class="icon-info-activity">
                                                <i class="las la-check-double bg-soft-primary"></i>
                                            </div>
                                            <div class="activity-info-text">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0 text-white">Process Swap</h6>
                                                    <span class="text-muted"></span>
                                                </div>
                                                <p class="text-muted mt-3">Click on <strong>process swap</strong> to
                                                    confirm
                                                    the fee for the swap amount, then click on <strong>complete
                                                        swap</strong> button to swap coin
                                                </p>
                                            </div>
                                        </div>
                                    </div><!--end activity-->
                                </div><!--end activity-scroll-->
                            </div>  <!--end card-body-->
                        </div><!--end card-->
                    </div>
                </div>
            </div>


            <span id="toasterNotify"></span>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title m-0" id="exampleModalCenterTitle">Complete swap</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="la la-times"></i></span>
                            </button>
                        </div><!--end modal-header-->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-3 text-center align-self-center">
                                    <img src="{{asset('appV1/dashb/assets/images/widgets/btc.png')}}" alt=""
                                         class="img-fluid">
                                </div><!--end col-->
                                <div class="col-lg-9">
                                    <h5>Spend</h5>
                                    <div class="col-lg-12">
                                        <h3><span class="badge bg-soft-success" id="coin_name_1_disp">Bitcoin</span>
                                            <small class="text-success ml-2" id="coin_qty_1_disp">0.20 BTC</small></h3>

                                    </div><!--end col-->
                                    <hr/>
                                    <h5>Receive</h5>
                                    <div class="col-lg-12">

                                        <h3><small class="badge bg-soft-warning" id="coin_name_2_disp">Bitcoin</small>
                                            <small class="text-warning ml-2" id="coin_qty_2_disp">0.00 </small></h3>

                                    </div><!--end col-->
                                    <hr/>
                                    <small class="text-success">Fee: <span id="coin_fee"></span></small>

                                </div>

                            </div><!--end row-->
                        </div><!--end modal-body-->
                        <div class="modal-footer">
                            <p>Due to the coin market volatility, the coin you will receive might vary from the estimated
                                value</p>
                            {{--                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>--}}
                            <button type="button" class="btn btn-success btn-sm" id="complete_swap">Exchange Coin
                            </button>
                        </div><!--end modal-footer-->
                    </div><!--end modal-content-->
                </div><!--end modal-dialog-->
            </div><!--end modal-->
        </div>
    </div>
@endsection


@section('page_js')

    <!-- Plugins js -->
    <script src="{{asset('appV1/dashb/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/select2/select2.min.js')}}"></script>

    <script
        src="{{asset('appV1/dashb/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/timepicker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script
        src="{{asset('appV1/dashb/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>


    <script src="{{asset('appV1/dashb/assets/js/jquery.core.js')}}"></script>

    {{--            <script src="{{asset('appV1/dashb/assets/pages/jquery.forms-advanced.js')}}"></script>--}}
    <input type="hidden" name="app_url" value="/api"/>
    <input type="hidden" name="user" value="{{Auth::user()->id}}"/>
    <input type="hidden" name="crypto_compare_url" value="{{env('CRYPTO_COMPARE_URL')}}"/>
    <input type="hidden" name="swap_url" value="{{route('save_swap')}}"/>


    <script type="text/javascript">

        $(document).ready(function () {

            $('#complete_swap').on('click', function () {
                process();
            });

            function process() {
                $('#swapForm').submit();
            }
        });
    </script>

    <script>
        new Vue({
            el: "#el_swap",
            data() {
                return {
                    coin_from: null,
                    coin_to: null,
                    amount_from: 0.00,
                    amount_to: 0.00,
                    supported_cryptos: {
                        type: Object
                    },
                    coin_from_balance: 0,
                    swap_btn: 0,

                }
            },
            mounted() {
                this.coinList();

            },
            methods: {
                swapCoin: function () {
                    axios.post('/api/swap', $('#swapForm').serialize()).then(
                        response => {
                            let errorMsg = $('#errorMsg');
                            let swap_btn = $('#swap_coin_btn');

                            if (response.data.status === true) {
                                let swap = response;
                                this.swap_btn = 1;


                                this.amount_to = swap.data.swap_response.coin_2_qty
                                let coin_to_slug = swap.data.swap_response.coin_2_info.coin.coin_slug;
                                let coin_to_coin_name = swap.data.swap_response.coin_2_info.coin.coin_name;


                                let coin_from_coin_name = swap.data.swap_response.coin_1_info.coin.coin_name;
                                let coin_from_coin_slug = swap.data.swap_response.coin_1_info.coin.coin_slug;
                                let crypto_image = $('[name=crypto_compare_url]');

                                errorMsg.hide();
                                $(errorMsg).html(swap.data.message);



                                swap_btn.html('Process Swap');
                                swap_btn.attr('data-toggle', 'modal');
                                swap_btn.attr('data-target', '#exampleModalCenter');
                                this.amount_to = swap.data.swap_response.coin_2_qty;

                                $('#coin_name_1_disp').html(coin_from_coin_name);
                                $('#coin_name_2_disp').html(coin_to_coin_name);
                                $('#coin_qty_1_disp').html(this.amount_from + this.coin_from);
                                $('#coin_qty_2_disp').html(this.amount_to + coin_to_slug);
                                $('#coin_2_icon').html("<img style='width: 20px' src='" + crypto_image.val() + swap.data.swap_response.coin_2_info.image_url + "' alt='icon image'/>");
                                $('#coin_fee').html((this.amount_from * (swap.data.swap_response.fee / 1000)) + "" + coin_from_coin_slug);
                            } else {
                                this.swap_btn = 0;
                                errorMsg.show();
                                $(errorMsg).html(response.data.message);
                            }
                        }
                    );


                },
                coinList: function () {
                    axios.get('/api/coins/list')
                        .then(response => {
                            this.supported_cryptos = response.data.coins;
                        });
                },
                getCoinBalance: function () {
                    let user_id = $('[name=user]').val();
                    axios.get("/api/coin/balance/" + user_id + '/' + this.coin_from)
                        .then(response => {
                            this.coin_from_balance = response.data.coin_balance + " " + this.coin_from;
                        });
                },
                UseMax: function () {
                    let user_id = $('[name=user]').val();
                    let coin_from = $('[name=from_coin_slug]').val();
                    axios.get("/api/coin/balance/" + user_id + '/' + coin_from)
                        .then(response => {
                            this.amount_from = response.data.coin_balance;
                            $('[name=from_coin_qty]').val(response.data.coin_balance);
                            this.swapCoin();
                        });
                }
            }
        });

    </script>

@endsection

@section('page_css')

    <link href="{{asset('appV1/dashb/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('appV1/dashb/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('appV1/dashb/plugins/timepicker/bootstrap-material-datetimepicker.css')}}"
          rel="stylesheet">
    <link href="{{asset('appV1/dashb/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}"
          rel="stylesheet"/>

    <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection
