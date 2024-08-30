<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>{{config('app.name')}} - @yield('page_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('appV1/assets/img/misc/favicon.png')}}"/>
    @yield('page_css')
    <!-- App css -->
    <link href="{{asset('appV1/dashb/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('appV1/dashb/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('appV1/dashb/assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('appV1/dashb/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('appV1/dashb/assets/css/app.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('appV1/dashb/assets/custom/css/responsive.css')}}" rel="stylesheet" type="text/css"/>


    <!-- Sweet Alert -->
    <link href="{{asset('appV1/dashb/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('appV1/dashb/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css">


    <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="13bd3a65-60e9-4fa4-8197-188e30a16420";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

</head>

<body class="dark-sidenav">


@yield('sidebar')

<div class="page-wrapper">
    @yield('header')
    <div class="page-content">

        <!-- Page Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col">
                                <h4 class="page-title"></h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{config('app.name')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">@yield('page_title')</li>
                                </ol>
                            </div><!--end col-->

                        </div><!--end row-->
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->
            <!-- Page-Title -->
            <main id="content" class="content">
                @if((int) Auth::user()->wallet_backup !== \App\User::WALLET_BACKUP_COMPLETE)
                    <div class="alert alert-danger border-0" role="alert">
                        <strong class=''>Wallet Backup Required!</strong> Backup your wallet now to avoid loosing
                        access.

                        <a href="{{route('backup')}}" class="btn btn-primary btn-sm">Backup Wallet</a>
                    </div>
                @endif
                @if(!empty(session('status')))
                    <div class="alert alert-success border-0" role="alert">
                        <strong>Oh Yeah!</strong> {{session('status')}}
                    </div>
                @endif
                @if(!empty(session('status2')))
                    <div class="alert alert-danger border-0" role="alert">
                        <strong>Oh snap!</strong> {{session('status2')}}
                    </div>
                @endif
                @yield('content')
                <button id="sa-success" hidden class="btn btn-outline-primary">here</button>

            </main>
            @yield('footer')

            <div class="toast" role="alert" data-toggle="toast"
                 style="position: absolute; top: 0px; right: 0;width: 300px; color: #FFFFFF" data-delay="4000">
                <div class="toast-header">
                    {{--                <img src="{{asset('appV1/dashb/assets/images/logo-sm.png')}}" alt="" height="20" class="mr-1">--}}
                    <h5 class="mr-auto" id="toast-caption"></h5>
                    {{--                <small>11 mins ago</small>--}}
                    <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-close"></i></span>
                    </button>
                </div>
                <div class="toast-body" id="toast-descr">
                </div>
            </div> <!--end toast-->
            <!--end /div-->
        </div><!-- container -->

        <footer class="footer text-center text-sm-left">
            &copy; {{config('app.name')}} <span class="d-none d-sm-inline-block float-right"><i
                    class="mdi mdi-heart text-danger"></i> </span>
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<!-- jQuery  -->
<script src="{{asset('appV1/dashb/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('appV1/dashb/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('appV1/dashb/assets/js/metismenu.min.js')}}"></script>
<script src="{{asset('appV1/dashb/assets/js/waves.js')}}"></script>
<script src="{{asset('appV1/dashb/assets/js/feather.min.js')}}"></script>
<script src="{{asset('appV1/dashb/assets/js/simplebar.min.js')}}"></script>
<script src="{{asset('appV1/dashb/assets/js/moment.js')}}"></script>
<script src="{{asset('appV1/dashb/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('appV1/dashb/plugins/clipboard/clipboard.min.js')}}" type="text/javascript"></script>

<!-- Sweet-Alert  -->
<script src="{{asset('appV1/dashb/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('appV1/dashb/assets/pages/jquery.sweet-alert.init.js')}}"></script>


<!-- App js -->
<script src="{{asset('appV1/dashb/assets/js/app.js')}}"></script>

<div class="modal fade" id="exampleModalCoin" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
     aria-labelledby="exampleModalDefaultLogin"
     aria-hidden="true">
    <div id="coindeposit">
        <button type="button" style="display: none" id='closeTab' class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="la la-times"></i></span>
        </button>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding-bottom: 0px !important;" id="coin_header" v-if="seen">
                    <ul class="nav-border nav nav-pills" role="tablist" style="font-size: 24px; ">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-semibold" data-toggle="tab"
                               href="#Send_Coin" role="tab" id="send_tab">Withdraw</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-semibold" data-toggle="tab"
                               href="#Receive_Coin" role="tab" id="receive_tab">Deposit</a>
                        </li>
                    </ul>
                    <button type="button" id='close' class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <div class="modal-body">

                    <div class="card-body">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active p-3 pt-3" id="Send_Coin" role="tabpanel">
                                <form class="form-horizontal auth-form my-4" action="#" id="send_coin_form" v-if="seen">

                                    <div class="form-group">

                                        <label for="exampleFormControlSelect1">Select coin</label>
                                        <select class="form-control" @change="fetchCoinPrice" v-model="selected"
                                                id="coinlist" name="coin_slug">
                                            <option selected value="null" disabled>Select coin</option>
                                            <option v-for="(coin, index) in coin_list" v-bind:value="coin.coin_slug">
                                                @{{coin.coin_name}}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-3">
                                            <div class="form-group">

                                                <label for="example-input3-group1"><span v-if="!coin_name">@{{ coin_name }}</span>
                                                    Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-dollar-sign"></i></span>
                                                    </div>
                                                    <input type="text" id="amount"
                                                           v-on:input="fetchCoinPrice();validateValues()"
                                                           v-on:keypress="NumbersOnly" name="amount_to_send"
                                                           v-model="amount_send"
                                                           class="form-control amount_send_input" placeholder="..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-3">

                                            <div class="form-group">
                                                <label for="example-input3-group1">Qty</label>
                                                <div class="input-group">
                                                    <input type="text" id="qty_send" name="send_qty"
                                                           v-on:keypress="NumbersOnly"
                                                           v-on:input="fetchFiatValue();validateValues()"
                                                           v-model="qty_send"
                                                           class="form-control qty_send_input" placeholder="..">
                                                    <div class="input-group-append" v-if="selected">
                                                        <span class="input-group-text"
                                                              id="sendCoin">@{{ selected }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Receiver Address</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" v-model="rec_address"
                                                   v-on:input="validateValues" name="receiver_wallet_address"
                                                   id="wallet_address" ref="receiver_address"
                                                   placeholder="Receiver Wallet Address">
                                        </div>
                                    </div><!--end form-group-->

                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label for="userpassword">Description</label>--}}
                                    {{--                                        <div class="input-group mb-3">--}}
                                    {{--                                        <textarea class="form-control" name="description" id="description"--}}
                                    {{--                                                  placeholder="Description">--}}
                                    {{--                                        </textarea>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div><!--end form-group-->--}}


                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-primary btn-block waves-effect waves-light"
                                                    id="send_coin_btn" :disabled="completed === 1"
                                                    v-on:click="seen = !seen"
                                                    type="button">Send <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->

                                <div class="row" id="send_window" v-if="!seen">
                                    <div class="col-lg-12">
                                        <h5 class="font-size-18 text-center">Transaction Summary</h5>
                                        <ul class="list-group">

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="la la-check text-muted font-16 mr-2"></i>Coin
                                                </div>
                                                <h4 class="font-size-16" id="send_coin_name">@{{ coin_name + ' '
                                                    +selected }}</h4>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="la la-check text-muted font-14 mr-2"></i>@{{coin_name}}
                                                    Address
                                                </div>
                                                <br/>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                                <p class="font-size-10" style="word-wrap:break-word;width: 100%"
                                                   id="send_receiver_address">@{{ rec_address }}</p>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="la la-check text-muted font-16 mr-2"></i>@{{coin_name}}
                                                    Amount
                                                </div>
                                                <h4 class="font-size-16" id="send_amount">@{{ qty_send+" "+ selected
                                                    }}</h4>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="la la-check text-muted font-16 mr-2"></i>Amount (USD)
                                                </div>
                                                <h4 class="font-size-16" id="send_fiat_amount">$@{{
                                                    numberFormatVar(amount_send) }}</h4>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="la la-check text-muted font-16 mr-2"></i>Fee
                                                </div>
                                                <h4 class="font-size-16" id="send_fee">$@{{ fee }}</h4>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="la la-check text-muted font-16 mr-2"></i>Total Amount
                                                </div>
                                                <h4 class="font-size-16" id="send_total_amount">$@{{ total_amount
                                                    }}</h4>
                                            </li>

                                        </ul><!--end list-group-->
                                        <br/>

                                        <div id="transauth" v-if="!complete_send">
                                            <p>Transaction Authentication </p>
                                            <h6><a href="#" id="sendOTP" v-if="turnoff"
                                                   v-on:click="sendAuthPin(); turnoff = !turnoff">-click to send
                                                    pin-</a></h6>
                                            <div class="input-group">
                                                <input type="text" name="trans_otp" id="trans_otp"
                                                       placeholder="Enter OTP" v-model="auth_pin" class="form-control">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-warning "
                                                            :disabled="isActive === true"
                                                            v-on:click="ConfirmPin"
                                                            id="confirm_pin"
                                                            type="button">Verify
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-primary" v-if="turnoff" id="msgPane">@{{errorMsg}}</p>
                                        <br/>

                                        <button v-if="isComplete" class="btn btn-outline-success btn-block">
                                            Transferring...
                                        </button>
                                        <div v-else>
                                            <button class="btn btn-outline-success btn-block" v-if="complete_send"
                                                    v-on:click="transferCoin" id="send_complete_btn">
                                                Complete Transaction
                                            </button>

                                            <button class="btn btn-outline-primary btn-block" v-on:click="seen = !seen"
                                                    id="go_back_send">Go Back
                                            </button>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane px-3 pt-3" id="Receive_Coin" role="tabpanel">
                                <form class="form-horizontal auth-form my-4" action="#" name="Receive_Coin">
                                    <div id="wallet_var_area" v-if="display_qr">
                                        <div class="card-body p-0 auth-header-box">
                                            <div class="text-center p-3">
                                                <p class="mt-3 mb-1 font-weight-semibold font-18">Scan QR Image</p>
                                                <h4 class="text-muted  mb-0">Send ONLY <code
                                                        id="">@{{ deposit_info.coinname }} (@{{ deposit_info.currency }}<small v-if="deposit_info.network !== 'NULL'"> @{{ deposit_info.network }}</small>)</code>
                                                    to this address</h4>
                                                <p class="text-muted mb-0">
                                                    <img :src="deposit_info.qr_code" alt="qr image"/>
                                                    {{--                                                    <span id="wallet_network"></span>--}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tag_name"><span id="">Wallet address</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" readonly value=""
                                                       name="wallet_address"
                                                       id="receiver_wallet" v-model="deposit_info.wallet_hash"
                                                       placeholder="Wallet Address">
                                                <span class="input-group-btn input-group-append"><button
                                                        class="btn btn-primary bootstrap-touchspin-up"
                                                        id="receiverWallet"
                                                        data-clipboard-action="copy"
                                                        data-clipboard-target="#receiver_wallet"
                                                        type="button">Copy</button></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pending_amount"><span id="">Coin Amount (@{{ deposit_info.currency }})</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" readonly value=""
                                                       name="coin_amount"
                                                       id="coin_amount" v-model="deposit_info.invoice_total_sum"
                                                       placeholder="Coin Amount">
                                                <span class="input-group-btn input-group-append"><button
                                                        class="btn btn-primary bootstrap-touchspin-up" id="copyAmount"
                                                        data-clipboard-action="copy"
                                                        data-clipboard-target="#coin_amount"
                                                        type="button">Copy</button></span>
                                            </div>
                                        </div>
                                        <div class="form-group" v-if="!!deposit_info.tag">
                                            <label for="tag_name"><span id="">Tag ID</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" readonly value=""
                                                       name="tag_id"
                                                       id="tag_id" v-model="deposit_info.tag"
                                                       placeholder="Wallet Address">
                                                <span class="input-group-btn input-group-append"><button
                                                        class="btn btn-primary bootstrap-touchspin-up"
                                                        id="tagID"
                                                        data-clipboard-action="copy"
                                                        data-clipboard-target="#tag_id"
                                                        type="button">Copy</button></span>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger">
                                            <strong>PLEASE NOTE!</strong><br/>
                                            <small class="text-muted">- QR Code is unique to the token <strong>@{{ deposit_info.currency }}</strong> <strong v-if="deposit_info.network !== 'NULL'"> @{{ deposit_info.network }}</strong> and network  <strong>@{{ deposit_info.currency }}</strong> <strong v-if="deposit_info.network !== 'NULL'"> @{{ deposit_info.network }}</strong> that you have selected.</small><br/>
                                            <small class="text-muted">- Send only <strong>@{{ deposit_info.currency }}</strong><strong v-if="deposit_info.network !== 'NULL'"> @{{ deposit_info.network }}</strong> to this address.</small><br/>
                                            <small class="text-muted">- Sending tokens other than <strong>@{{ deposit_info.currency }}</strong><strong v-if="deposit_info.network !== 'NULL'"> @{{ deposit_info.network }}</strong> will result in the loss of your assets.</small><br/>
                                            <small class="text-muted">- Sending <strong>@{{ deposit_info.currency }}</strong> <strong v-if="deposit_info.network !== 'NULL'"> @{{ deposit_info.network }}</strong> to a different network other than  <strong>@{{ deposit_info.currency }}</strong><strong v-if="deposit_info.network !== 'NULL'"> @{{ deposit_info.network }}</strong> will result in the loss of your assets.</small>
                                        </div>


                                    </div>

                                    <div id="receive_coin_param" v-else>

                                        <div class="form-group">
                                            <label for="example-input3-group"><!---->
                                                USD Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="fas fa-dollar-sign"></i></span></div>
                                                <input type="text" id="amount" v-model="amount_to_rec"
                                                       v-on:input="enableGenerateBtn" name="amount_to_receive"
                                                       placeholder=".."
                                                       class="form-control amount_send_input"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="mo_number">Select Coin</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" @change="enableGenerateBtn"
                                                        v-model="selected_active">
                                                    <option selected value="null" disabled>Select coin</option>
                                                    <option v-for="(active, index) in active_coinlist"
                                                            v-bind:value="active.coin_slug">
                                                        @{{active.coin_name}}
                                                    </option>
                                                </select>
                                            </div>

                                        </div><!--end form-group-->

                                    </div>
                                    <p class="text-danger" id="msgPane">@{{deposit_msg}}</p>

                                   <div class="form-group mb-0 row"  v-if="payment_btn">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-primary btn-block waves-effect waves-light disabled"
                                                    type="button" v-if="loading">
                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                Generating Address...
                                            </button>
                                            <button v-else :disabled="generate_btn === 1" v-on:click="redirectToPay"
                                                    class="btn btn-primary btn-block waves-effect waves-light"
                                                    id="generate_wallet"
                                                    type="button">
                                                Deposit fund <i class="fas fa-cogs ml-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 row" v-else>
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-success btn-block waves-effect waves-light"
                                                    id="copyWallet" data-clipboard-action="copy"
                                                    data-clipboard-target="#receiver_wallet"
                                                    type="button">Copy Address <i class="fas fa-copy ml-1"></i>
                                            </button>

                                            <button class="btn btn-primary btn-block waves-effect waves-light"
                                                    id="generate_wallet" v-on:click="confirmPayment"
                                                    type="button">I have paid <i class="fas fa-cogs ml-1"></i>
                                            </button>
                                        </div>
                                    </div> <!--end form-group-->

                                </form><!--end form-->

                            </div>
                        </div>
                    </div><!--end card-body-->
                </div>
            </div><!--end modal-body-->

        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div><!--end modal-->


{{--notification modal--}}
<div class="modal fade" id="notificationPane" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center">
            <div class="modal-header" id="modal_header">
                <h6 class="modal-title m-0" id="exampleModalCenterTitle">Caption</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="la la-times"></i></span>
                </button>
            </div><!--end modal-header-->
            <div class="modal-body">
                <div class="row">
{{--                    <div class="col-lg-3 text-center align-self-center">--}}
{{--                        <img src="{{asset('appV1/dashb/assets/images/widgets/project1.jpg')}}" alt=""--}}
{{--                             class="img-fluid">--}}
{{--                    </div><!--end col-->--}}
                    <div class="col-lg-12">
                        <p id="msg_content"></p>


                    </div>

                </div><!--end row-->
            </div><!--end modal-body-->
            <div class="modal-footer">
                <code>System message</code>
                {{--                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>--}}
{{--                <button type="button" class="btn btn-primary btn-sm" id="complete_swap">Complete Swap</button>--}}
            </div><!--end modal-footer-->
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div><!--end modal-->

<input type="hidden" value="/api/coins/list" name="coin_list_url"/>
<input type="hidden" value="/api/coins/info" name="coin_info_url"/>
<input type="hidden" value="/" name="base_url"/>
<input type="hidden" value="{{Auth::user()->id}}" name="user_id"/>
<input type="hidden" name="image_root_url" value="{{env('CRYPTO_COMPARE_URL')}}">
<script type="text/javascript" src="{{asset('appV1/dashb/assets/custom/js/script.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('appV1/dashb/crypto-custom/js/index.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('appV1/dashb/crypto-custom/js/test.js')}}"></script>--}}


<script type="text/javascript">

    var clipboard = new ClipboardJS("#copyWallet");
    var walletHashCopy = new ClipboardJS("#receiverWallet");
     new ClipboardJS("#copyAmount");
    new ClipboardJS("#tagID");

    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
            textbox.addEventListener(event, function () {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        });
    }

    $('#receiver_amount').on('input', function () {
        setInputFilter(document.getElementById("receiver_amount"), function (value) {
            return /^-?\d*[.,]?\d*$/.test(value);
        });
    });

    $('#qty_send').on('input', function () {
        setInputFilter(document.getElementById("qty_send"), function (value) {
            return /^-?\d*[.,]?\d*$/.test(value);
        });
    });

    $('#amount').on('input', function () {
        setInputFilter(document.getElementById("amount"), function (value) {
            return /^-?\d*[.,]?\d*$/.test(value);
        });
    });

    $('#coin_qty').on('input', function () {
        setInputFilter(document.getElementById("coin_qty"), function (value) {
            return /^-?\d*[.,]?\d*$/.test(value);
        });
    });

    $('#send_qty').on('input', function () {
        setInputFilter(document.getElementById("send_qty"), function (value) {
            return /^-?\d*[.,]?\d*$/.test(value);
        });
    });


    getMessage();
    function getMessage(){
        $.ajax({
            url: '/api/broadcast/messages',
            data: {},
            type: 'GET',
            success: function(result){

                if(result.data.data.status ==="SHOW") {
                    $('#notifyBtn').click();
                    $('#exampleModalCenterTitle').html("<h5 class='text-white'>" + result.data.data.caption + "</h5>");
                    $('#msg_content').html("<p>" + result.data.data.msg + "</p>");

                    $("#modal_header").addClass(result.data.data.msg_type)
                }
            },
            error: function(e){
                console.log(e);
            }
        });
    }
</script>
@yield('page_js')

</body>

</html>
