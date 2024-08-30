@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Staking')
@section('content')
     <div class="row">
        <div class="col-sm-11 col-md-11 col-md-offset-1">
            <div class="alert alert-primary-shadow mb-0" role="alert">
                <h4 class="alert-heading font-size-24"><strong>PennHaven Staking pools</strong></h4>
                {{--                <br/>--}}
                <h4>Operated by experienced professionals in the industry. We are a single
                    pool operator and dedicated to ensure the security and reliability of our staking pools.
                </h4>
                <p class="mb-0">We’re glad that you chose to delegate your stake with us. </p>


                <p class="mb-2">We are currently running some new pool promotion rewards to anyone who joins our stake
                    pool. </p>

            </div>
        </div>

    </div>
    <br/>
    <!-- end page title end breadcrumb -->
    <div class="row">

        <div class="col-lg-7 col-md-7">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="card-title text-white">Start @yield('page_title')</h4>
                    <p class="text-muted mb-0">
                    </p>
                </div><!--end card-header-->
                <div class="card-body bootstrap-select-1">
                    <form id="staking_form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-3">Select Coin</label>
                                <select class="select2 form-control mb-3 custom-select" id="staking_list" name="coin_slug"
                                        style="width: 100%; height:36px;">
                                </select>

                            </div>
                            <div class="col-md-12">
                                <div class="mt-3">
                                    <label class="mb-2">Coin Quantity</label>

                                    <div class="input-group">
                                        <input type="text" id="coin_qty" name="coin_qty" class="form-control"
                                               value=""/>
                                        <span class="input-group-append">
                                                <span class="btn btn-primary"
                                                      id="coin_slug_append"></span>
                                                </span>

                                    </div>
                                    <div class="text-right">
                                        <label class="">Coin Balance: <span id="coin_balance">0.00</span></label>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                    </form>


                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card" id="calc_pane" style="display: none;">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Staking Profit Estimate</h4>
                                </div><!--end col-->

                            </div>  <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body">
                            <ul class="list-group custom-list-group mb-n3">
                                <li class="list-group-item align-items-center d-flex justify-content-between pt-0">
                                    <div class="media">
                                        <span id="coin_image_1"></span>

                                        <div class="media-body align-self-center">
                                            <h6 class="m-0">Daily Profit</h6>
                                            <p class="mb-0 text-muted">Estimated </p>
                                        </div><!--end media body-->
                                    </div>
                                    <div class="align-self-center">
                                        <h4 id="daily_yield" class="btn btn-md btn-soft-primary">0.0</h4>
                                    </div>
                                </li>

                                <li class="list-group-item align-items-center d-flex justify-content-between py-4">
                                    <div class="media">
                                        <span id="coin_image_2"></span>
                                        <div class="media-body align-self-center">
                                            <h6 class="m-0">Monthly Profit</h6>
                                            <p class="mb-0 text-muted">Estimated </p>
                                        </div><!--end media body-->
                                    </div>
                                    <div class="align-self-center">
                                        <h4 id="monthly_yield" class="btn btn-md btn-soft-primary">0.00</h4>
                                    </div>
                                </li>
                                <li class="list-group-item align-items-center d-flex justify-content-between py-4">
                                    <div class="media">
                                        <span id="coin_image_3"></span>

                                        <div class="media-body align-self-center">
                                            <h6 class="m-0">Yearly Profit</h6>
                                            <p class="mb-0 text-muted">Estimated </p>
                                        </div><!--end media body-->
                                    </div>
                                    <div class="align-self-center">
                                        <h4 id="yearly_yield" class="btn btn-md btn-soft-primary">0.00</h4>
                                    </div>
                                </li>
                            </ul>
                        </div><!--end card-body-->
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="alert alert-danger alert-danger-shadow" style="display: none;" id="stake_msg_pane">
                        <h5 id="stake_errorMsg"></h5>
                    </div>
                    <div class="mt-3">

                        <button type="button" id="stake_btn" class="btn btn-outline-primary btn-block">Start
                            Staking
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4" >
            <div class="card" id="stake_apr_window"  style="display: none">
                <div class="card-body">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="timer-data">
                            <div class="icon-info mt-1 mb-3" >
                                <span id="stake_coin_image"></span>
                            </div>
                            <h3 class="mt-0 text-dark" id="stake_coin_apr"></h3>
                            <h4 class="mt-0 header-title text-truncate font-15 mb-0" id="stake_coin_name"></h4>
                            <p class="text-muted mb-0">Returns are calculated based on the Coin APY</p>
                        </div>
                    </div><!--end col-->

                </div><!--end row-->
            </div>
            </div>
            <div class="">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="card-title text-white">STAKING</h4>
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
                                            <h6 class="m-0 w-75 text-white">SINGLE POOL OPERATOR</h6>
                                            <span class="text-muted d-block"></span>
                                        </div>
                                        <p class="text-muted mt-3">
                                            Always available We ensure the pool is up and running and dedicated to a single pool.
                                        </p>
                                    </div>
                                </div>

                                <div class="activity-info">
                                    <div class="icon-info-activity">
                                        <i class="las la-coins bg-soft-primary"></i>
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="m-0  w-75  mt-2 text-white">RELIABLE</h6>
                                            <span class="text-muted"></span>
                                        </div>
                                        <p class="text-muted mt-3">
                                            99.95% Uptime<br/>
                                            Our nodes are monitored continuously to ensure it is up and running all the time.
                                        </p>
                                    </div>
                                </div>
                                <div class="activity-info">
                                    <div class="icon-info-activity">
                                        <i class="las la-clipboard-check bg-soft-primary"></i>
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="m-0  w-75 text-white">LOW MARGIN</h6>
                                            <span class="text-muted"></span>
                                        </div>

                                        <p class="text-muted mt-3">

                                            Our operating cost is kept to the minimum so we can return the maximum rewards back to you. Margin is used to donate to charities and promote the pool
                                        </p>
                                    </div>
                                </div>

                                <div class="activity-info">
                                    <div class="icon-info-activity">
                                        <i class="las la-comment-dots bg-soft-primary"></i>
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="m-0 text-white">SECURE</h6>
                                            <span class="text-muted"></span>
                                        </div>
                                        <p class="text-muted mt-3">
                                            We follow all best practices to secure our node. Security comes first in what we do so we employ all our users to secure their private keys to maintain the security standard.

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

    <input name="app_url" value="{{url('/api')}}" type="hidden"/>
    <input name="save_stake" value="{{route('save_stake')}}" type="hidden"/>
    <input name="user_id" value="{{Auth::user()->id}}" type="hidden"/>
@endsection

@section('page_js')
    <!-- Plugins js -->
    <script src="{{asset('appV1/dashb/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/timepicker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>

    <script src="{{asset('appV1/dashb/assets/pages/jquery.forms-advanced.js')}}"></script>


    <script type="text/javascript">
        let coin_qty = $('#coin_qty');
        let coin_slug = $('[name=coin_slug]');
        let app_url = $('[name=app_url]').val();
        let stake_form = $('#staking_form');
        let user_id = $('[name=user_id]').val();
        let stake_btn = $('#stake_btn');
        let stake_msg_pane = $('#stake_msg_pane');
        let stake_errorMsg = $('#stake_errorMsg');

        stake_btn.on('click', function () {
            saveStake();
        });

        coin_slug.on('change', function () {
            $('#stake_apr_window').hide();
            coin_qty.val('0');
            $('#coin_slug_append').html(coin_slug.val());
            setCoinBalance();
            calc();
            $('#calc_pane').hide();
        });


        coin_qty.on('input', function () {
            calc();
        });

        addOtherStakeCoins();
        function addOtherStakeCoins() {
            $.ajax({
                url: app_url+"/coin/stake/others",
                type: 'GET',
                data:'',
                success: function (data) {
                    var options;
                    options += "<option value='null'>Select Coin</option>";
                    $.each(data.list_coins,  function (index1, value1) {

                        options += "<option value='"+value1.coin_slug+"'>"+value1.coin_slug+"</option>";
                    });
                    $.each(data.other_coins, function(index, value){
                        options += "<option value='"+value.slug+"'>"+value.caption+"</option>";
                    });
                    $('#staking_list').append(options);
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

        function calc() {
            if (coin_qty.val() > 0) {
                $.ajax({
                    url: app_url + "/staking/calc",
                    type: 'GET',
                    data: stake_form.serialize(),
                    async: false,
                    success: function (data) {
                        $('#calc_pane').show();
                        if(data.status === true) {
                            // console.log(data.response);
                            stake_msg_pane.hide();
                            $('#coin_slug_append').html(coin_slug.val());
                            var image_url = " <img src=\""+ data.response.image_url +"\" height=\"30\"\n" +
                                "                                     class=\"mr-3 align-self-center rounded\" alt=\"...\">";
                            $('#coin_image_1').html(image_url);
                            $('#coin_image_2').html(image_url);
                            $('#coin_image_3').html(image_url);
                            $('#daily_yield').html(data.response.daily_return_crypto + coin_slug.val());
                            $('#monthly_yield').html(data.response.monthly_return_crypto + coin_slug.val());
                            $('#yearly_yield').html(data.response.yearly_return_crypto + coin_slug.val());

                            $('#stake_apr_window').show();
                            $('#stake_coin_apr').html(data.response.apr+"%");
                            $('#stake_coin_image').html(image_url);
                            $('#stake_coin_name').html(data.response.coin_name+" Staking APY");
                        }else{
                            $('#stake_apr_window').hide();

                            stake_msg_pane.show();
                            stake_errorMsg.html(data.msg);
                            $('#calc_pane').hide();
                            coin_qty.html('0');
                        }
                    },
                    error: function (e) {

                        console.log(e);
                    }
                });
            } else {
                stake_msg_pane.hide();
            }
        }

        function setCoinBalance() {
            $.ajax({
                url: app_url + "/coin/balance/" + user_id + "/" + coin_slug.val(),
                type: 'GET',
                success: function (data) {
                    $('#coin_balance').html('' + data.coin_balance + '' + coin_slug.val());

                },
                error: function (e) {
                    console.log(e);
                }
            });


        }

        function saveStake() {
            $.ajax({
                url: $('[name=save_stake]').val(),
                data: stake_form.serialize(),
                type: 'POST',
                async: false,
                success: function (data) {
                    $('.toast').toast('show');
                    $('.close').click();
                    $('html, body').animate({scrollTop: '0px'}, 0);
                    if (data.status === true) {
                        $('.toast').attr('class', 'toast bg-success');
                        $('#toast-caption').html('Staking Notification');
                        $('#toast-descr').html('Staking completed successfully');
                        stake_form[0].reset();
                        $('#calc_pane').hide();

                    } else {
                        $('.toast').attr('class', 'toast bg-danger');
                        $('#toast-caption').html('Staking Notification');
                        $('#toast-descr').html(data.message);


                    }
                },
                error: function (e) {
                    console.log(e);
                }

            });
        }
    </script>
@endsection

@section('page_css')

    <link href="{{asset('appV1/dashb/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('appV1/dashb/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('appV1/dashb/plugins/timepicker/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('appV1/dashb/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}"
          rel="stylesheet"/>
@endsection
