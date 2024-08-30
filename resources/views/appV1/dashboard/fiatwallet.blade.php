@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Other Wallet Balance')
@section('content')
    <div class="row justify-content-center" id="token_balance">

    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Deposit Coin</h4>
                    <p class="text-muted mb-0">
                    </p>
                </div><!--end card-header-->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>

                        <tr>
                            <th rowspan="5">Coin</th>
{{--                            <th></th>--}}
                            <th colspan="2"></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wallets as $token_wallet)

                            <tr>
                            <td>{{$token_wallet['coin_name']}} Coin</td>
{{--                            <td></td>--}}
                            <td> <button class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#exampleModalToken" role="button" type="button">Deposit Coin</button></td>
                            <td> <button class="btn btn-sm btn-block btn-primary" data-toggle="modal" data-target="#exampleModalWithdraw" role="button" type="button">Withdraw Coin</button></td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("page_js")
    <div class="modal fade" id="exampleModalWithdraw" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalDefaultLogin"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding-bottom: 0px !important;" id="coin_header">
                    <h4>Withdraw Coin</h4>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <div class="modal-body">

                    <div class="card-body">

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active px-3 pt-3" role="tabpanel">
                                <form class="form-horizontal auth-form my-4" method="post" action="{{route('withdraw')}}">
                                    @csrf
                                    <div id="" style="">

                                        <div class="form-group">
                                            <label for="mo_number">Select Coin</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" name="coin_slug" id="list_other_coins_2">

                                                </select>
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group">
                                            <label for="username">Amount (Qty)</label>

                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="withdraw_coin_qty" value="" id="coin_qty"
                                                       placeholder="Coin Qty">
                                                <span class="input-group-append">
                                                    <button class="btn btn-secondary" type="button" id="with_coin_slug">BTC</button>
                                                </span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="fiat_value" readonly value="" id="fiat_value"
                                                       placeholder="Fiat Value">
                                                <span class="input-group-append">
                                                    <button class="btn btn-secondary" type="button">USD</button>
                                                </span>
                                            </div>
                                        </div><!--end form-group-->
                                        <div class="form-group">
                                            <label for="username">Withdrawal Address</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" value="" name="withdrawal_address" id="withdrawal_address"
                                                       placeholder="Withdrawal Address">
                                            </div>
                                        </div><!--end form-group-->
                                    </div>

                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <span id="errorMsg" style="display: none;" class="text-danger">Error here</span>

                                            <button disabled class="btn btn-primary btn-block waves-effect waves-light" id="withdraw_token_btn"
                                                    type="submit">Process Withdrawal <i class="fas fa-download ml-1"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->

                            </div>
                        </div>
                    </div><!--end card-body-->

                </div><!--end modal-body-->

            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div><!--end modal-->

    <div class="modal fade" id="exampleModalToken" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalDefaultLogin"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding-bottom: 0px !important;" id="coin_header">
                    <h4>Deposit Coin</h4>

                    <button type="button" class="close" data-dismiss="modal"  onclick="event.preventDefault();location.reload();" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-times"></i></span>
                    </button>
                </div><!--end modal-header-->
                <div class="modal-body">

                    <div class="card-body">

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active px-3 pt-3" role="tabpanel">
                                <form class="form-horizontal auth-form my-4" action="#">
                                    <div id="wallet_var_area1" style="display: none">
                                        <div class="card-body p-0 auth-header-box">
                                            <div class="text-center p-3">
                                                <span id="qrimage1"></span>
{{--                                                <h4 class="mt-3 mb-1 font-weight-semibold font-18"></h4>--}}
                                                <p class="text-muted  mb-0">Send ONLY <span id="coin_warning_name1"></span> to this address</p>
                                                                                                <p id="wallet_token_network"></p>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Deposit Address</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="wallet_address001"
                                                       placeholder="Deposit Address">
                                            </div>
                                        </div><!--end form-group-->
                                        
                                        <span id="add_token_tag"></span>

                                    </div>

                                    <div class="form-group">
                                        <label for="mo_number">Select Coin</label>
                                        <div class="input-group mb-3">
                                            <select class="form-control" id="list_other_coins">

                                            </select>
                                        </div>
                                    </div><!--end form-group-->



                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" disabled id="copyWallet1" data-clipboard-action="copy" data-clipboard-target="#wallet_address001"
                                                    type="button">Copy Address <i class="fas fa-copy ml-1"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->

                            </div>
                        </div>
                    </div><!--end card-body-->

                </div><!--end modal-body-->

            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div><!--end modal-->
    <input type="hidden" name="other_coins_url" value="{{url('/api/other/coins/list')}}" />
    <input type="hidden" name="token_address_url" value="{{url('/api/deposit/token/address/')}}">
    <input type="hidden" name="withdraw_calc_url" value="{{url('/api/token/withdrawal/')}}">
    <input type="hidden" name="base_url1" value="{{url('/')}}"/>
    <input type="hidden" name="image_base_url_1" value="{{env('CRYPTO_COMPARE_URL')}}" />


    <input type="hidden" value="{{Auth::user()->id}}" name="user_id"/>

    <script type="text/javascript">
        var clipboard = new ClipboardJS("#copyWallet1");
        clipboard.on("success", function (o) {
            console.log(o)
        }), clipboard.on("error", function (o) {
            console.log(o)
        });

        var user_id = $('[name=user_id]').val();
        var base_url = $('[name=base_url1]').val();
        var image_base_url_1 = $('[name=image_base_url_1]').val();


        $('#list_other_coins').on('change', function(){
            depositWallet($('#list_other_coins').val());
        });


        $('#list_other_coins_2').on('change', function(){
            calculateWithdrawal($('#list_other_coins_2').val());
        });

        $('#coin_qty').on('input', function(){
            calculateWithdrawal($('#list_other_coins_2').val());
        });



        function listCoins(){
            $.ajax({
                url: $('[name=other_coins_url]').val(),
                type: "GET",
                data: '',
                success: function(data){
                    var list_other_coins = '';
                    list_other_coins += "<option value='null'>Select Coin</option>";
                    $.each(data.other_coins, function (index, value) {
                       list_other_coins += "<option value='"+value.slug+"'>"+value.caption+"</option>"
                    });
                    $('#list_other_coins').html(list_other_coins);
                    $('#list_other_coins_2').html(list_other_coins);
                },
                error: function(e){
                    console.log(e);
                }
            });
        }

        function depositWallet(coin_slug) {

            $.ajax({
                url: $('[name=token_address_url]').val()+"/"+coin_slug+"/"+user_id,
                type:'GET',
                data: '',
                success: function (data) {
                    if(data.status === true){
                        $('#wallet_var_area1').show();
                        $('#wallet_address001').attr('readonly', 'true');
                        $('#coin_warning_name1').html(data.coin_name);
                        $('#wallet_address001').val(data.address.wallet_address);
                        $('#qrimage1').html("<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl="+data.address.wallet_address+"' style='width: 60%;' alt='qr image'/>");
                        $('#copyWallet1').removeAttr('disabled');
                        if(data.address.tag_name === null){
                            $('#add_token_tag').html(" <p></p>");
                        }else {
                            $('#add_token_tag').html("<div class=\"form-group\">\n" +
                                "                                            <label for=\"username\">" + data.address.tag_name + "</label>\n" +
                                "                                            <div class=\"input-group mb-3\">\n" +
                                "                                                <input type=\"text\" value='" + data.address.tag_value + "' readonly class=\"form-control\" id=\"tag_token_value\"\n" +
                                "                                                       placeholder=\"Tag Value\">\n" +
                                "                                            </div>\n" +
                                "                                        </div>");
                            $('#wallet_token_network').html('<small>Wallet Network (' + data.address.wallet_network + ")</small>");
                        }
                        
                    }else{
                        $('#wallet_var_area1').hide();
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

        function calculateWithdrawal(coin_slug){
            var coin_qty = $('[name=withdraw_coin_qty]').val();

                $('#with_coin_slug').html(coin_slug);

                $.ajax({
                    url: $('[name=withdraw_calc_url]').val(),
                    type: 'POST',
                    data: {'user_id': user_id, 'coin_slug': coin_slug, 'coin_qty': coin_qty},
                    success: function (data) {
                        if (data.status === true) {
                            $('#errorMsg').hide();
                            $('#with_coin_slug').html(coin_slug);

                            $('#withdraw_token_btn').removeAttr('disabled');
                            $('#fiat_value').val('$'+data.fiat_amount);
                        } else {
                            $('#errorMsg').show();
                            $('#errorMsg').html(data.msg);
                            $('#fiat_value').val('$0.0');
                            $('#with_coin_slug').html(coin_slug);

                            $('#withdraw_token_btn').attr('disabled', 'true');
                        }
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
        }
        function getTokenBalances()
        {
            $.ajax({
                url: base_url+"/api/token/balances/"+user_id,
                type: "GET",
                data: '',
                async: false,
                success:function(data){

                    let token_bal_display = "";
                    var count = 1;
                    $.each(data.fiat_balances, function(index, value){

                        if(count === 4 || count === 2 || count === 5){
                            var grid_size = 2;
                        }else{
                            var grid_size = 3;
                        }
                        count ++;

                        token_bal_display += "<div class=\"col-md-"+grid_size+" col-lg-"+grid_size+"\">\n" +
                            "                            <div class=\"card report-card\">\n" +
                            "                                <div class=\"card-body\">\n" +
                            "                                    <div class=\"row d-flex \">\n" +
                            "                                        <div class=\" col\">\n" +
                            "                                            <p class=\"text-dark mb-0\">"+
                            "<img style='width: 25px; height: 25px' src='"+ image_base_url_1 +value.coin_image +"'/>&nbsp;"+ value.coin_name + " Balance</p>\n" +
                            "                                            <h4 class=\"font-weight-semibold m-0\"><strong>"+value.coin_qty +"</strong> "+ value.coin_slug+"</h4>\n" +
                            "<p class=\"mb-0 text-truncate text-muted\"><span class=\"text-success\"> $" + value.coin_fiat_balance + "</span></p>" +
                            "                                        </div>\n" +
                            "                                    </div>\n" +
                            "                                </div><!--end card-body-->\n" +
                            "                            </div><!--end card-->\n" +
                            "                        </div> <!--end col-->"

                    });
                    $("#token_balance").html(token_bal_display);

                },
                error: function(e){
                    console.log(e);
                }
            });

        }


        let interval = 5000;
        clearTimeout(interval);
        setInterval(function(){
            getTokenBalances();
        },  Number(interval) + 1000);

        listCoins();

    </script>
@endsection

