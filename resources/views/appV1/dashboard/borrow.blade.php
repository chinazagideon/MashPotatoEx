@extends('appV1.dashboard.layouts.sidebar')
@section('page_title','Borrow Crypto')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Setup Guide</h4>
                    <p class="text-muted mb-0">Borrow funds and start trading</p>
                    <h4></h4>
                </div><!--end card-header-->
                <div class="card-body">
                    <form id="borrow_form" onsubmit="event.preventDefault();"
                          class="form-horizontal form-wizard-wrapper">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <div class="col-md-2"></div>

                                <div class="col-md-6">
                                    <br/>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-lg-9 alert alert-primary">
                                            <h5 class="text-dark"><strong>NB:</strong>100% crypto collateral for 50% loan <strong>0.8%
                                                    interest.</strong></h5>
                                            <h5>Minimum Fiat amount: <span class="text-dark">$50,000</span></h5>
                                            <h5>Maximum Fiat amount: <span class="text-dark">$500,000</span></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="ddlCreditCardType" class="col-lg-3 col-form-label">Borrow
                                                Crypto</label>
                                            <div class="col-lg-9">
                                                <select id="swap_coin_list" name="coin_slug" class="form-control">

                                                </select>
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Amount to
                                                Borrow</label>
                                            <div class="col-lg-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="coin_id_image"></span>
                                                    </div>
                                                    <input type="text" id="coin_qty" name="coin_qty"
                                                           class="form-control" placeholder="..">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="coin_append_slug"></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="ddlCreditCardType" class="col-lg-3 col-form-label">Collateral
                                                Crypto</label>
                                            <div class="col-lg-9">
                                                <select id="swap_coin_list_2" name="collateral_coin_slug"
                                                        class="form-control">

                                                </select>
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->


                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="txtNameCard" class="col-lg-3 col-form-label"></label>
                                            <div class="col-lg-9">
                                                <small class="text-danger" id="errorPane" style="display: none"></small>
                                                <button type="submit" id="borrow_btn" name="borrow_btn"
                                                        class="btn btn-block btn-sm btn-outline-primary px-3 mt-2">
                                                    Process Loan
                                                </button>
                                            </div>
                                        </div><!--end form-group-->
                                    </div><!--end col-->


                                </div><!--end row-->
                                <div class="col-lg-4 col-md-4" id="calc_pane">
                                    <div class="card">

                                        <div class="card-body border-bottom-dashed">
                                            <div class="earning-data text-center">
                                                <span id=""></span>
                                                <h5 class="earn-money mb-1" id="borrow_fiat_value">$0.0</h5>
                                                <p class="text-muted font-15 mb-4">USD Borrow Amount</p>

                                            </div>
                                        </div><!--end card-body-->
                                        <div class="card-body my-1">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="media">

                                                        <i id="borrow_image_disp"
                                                           class="align-self-center icon-md text-secondary mr-2"></i>
                                                        <div class="media-body align-self-center">
                                                            <h6 class="m-0 font-24" id="borrow_qty_disp">0.000</h6>
                                                            <p class="text-muted mb-0">Borrowing</p>
                                                        </div><!--end media body-->
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col">
                                                    <div class="media">
                                                        <i id="collateral_image_disp"
                                                           class="align-self-center icon-md text-secondary mr-2"></i>
                                                        <div class="media-body align-self-center">
                                                            <h6 class="m-0 font-24" id="collateral_qty_disp">0.000</h6>
                                                            <p class="text-muted mb-0">Collateral Needed</p>
                                                        </div><!--end media body-->
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                            <br/>

                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!-- end col-->
                            </div>

                        </fieldset><!--end fieldset-->


                    </form><!--end form-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->

    <input type="hidden" name="app_url" value="{{url('api/')}}"/>
    <input type="hidden" name="crypto_compare_url" value="{{env('CRYPTO_COMPARE_URL')}}"/>
    <input type="hidden" name="borrow_url" value="{{route('save_borrow')}}"/>
@endsection
@section('page_css')

    <!--Form Wizard-->
    <link rel="stylesheet" href="{{asset('appV1/dashb/plugins/jquery-steps/jquery.steps.css')}}">

@endsection
@section('page_js')
    <script src="{{asset('appV1/dashb/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/assets/pages/jquery.form-wizard.init.js')}}"></script>

    <script type="text/javascript">
        var app_url = $('[name=app_url]').val();
        var form = $("#borrow_form");
        var coin_qty = $('#coin_qty');
        var coin_slug = $('[name=coin_slug]');
        var collateral_coin_slug = $('[name=collateral_coin_slug]');
        var collateral_coin_qty = $('[name=collateral_coin_qty]');
        var image_base_url = $('[name=crypto_compare_url]');
        let borrow_image_disp = $('#borrow_image_disp');
        let collateral_image_disp = $('#collateral_image_disp');
        let borrow_qty_disp = $('#borrow_qty_disp');
        let collateral_qty_disp = $('#collateral_qty_disp');
        let borrow_fiat_value = $('#borrow_fiat_value');
        let errorPane = $('#errorPane');
        let coin_append_slug = $('#coin_append_slug');
        let borrow_btn = $('[name=borrow_btn]');
        borrow_btn.hide();


        let calc_page = $('#calc_pane');
        calc_page.hide();

        coin_qty.on('input', function () {
            calc();
        });

        borrow_btn.on('click', function () {
            saveRequest();
        });

        coin_slug.on('change', function () {
            calc();
            appCoinImage($('#coin_id_image'), coin_slug.val());
            $('#coin_append_slug').html(coin_slug.val());
        });
        collateral_coin_slug.on('change', function () {
            appCoinImage($('#collateral_coin_image'), collateral_coin_slug.val(), coin_append_slug);
            calc();
        });

        form.on('submit', function () {
            calc();
        });

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

        function calc() {
            if (coin_qty.val() > 0 && coin_slug.val() !== 'null' && collateral_coin_slug.val() !== 'null') {
                $.ajax({
                    url: app_url + '/borrow/calc',
                    data: form.serialize(),
                    type: 'GET',
                    async: false,
                    success: function (data) {

                        if (data.status === true) {
                            calc_page.show();
                            errorPane.hide();
                            var fiat = data.response.borrow_coin_rate * coin_qty.val();
                            if (fiat >= 50000 && fiat <= 500000) {
                                borrow_btn.show();
                            } else {
                                errorPane.show();
                                errorPane.show();
                                errorPane.html('Unable to continue, Minimum loan fiat amount is $50,000 USD and maximum of $500,000');
                                borrow_btn.hide();
                            }
                            borrow_fiat_value.html("$" + addCommas(fiat.toFixed(4)));
                            collateral_image_disp.html("<img src='" + data.response.collateral_coin_image + "' width='30px' alt=''/>");
                            collateral_qty_disp.html(data.response.collateral_coin_qty + "<small>" + collateral_coin_slug.val() + "</small>");
                            borrow_image_disp.html("<img src='" + data.response.borrow_coin_image + "' width='30px' alt=''/>");
                            borrow_qty_disp.html(coin_qty.val() + "<small>" + coin_slug.val() + "</small>");
                        } else {
                            borrow_btn.hide();
                            calc_page.hide();
                            errorPane.show();
                            errorPane.html(data.message);
                        }

                    },
                    error: function (e) {

                        console.log(e);
                    }
                });
            } else {
                console.log('invalid form inputs');
            }
        }

        function appCoinImage(element, coinslug) {
            $.ajax({
                url: app_url + '/coin/' + coinslug,
                type: 'GET',
                data: '',
                success: function (data) {
                    element.html("<img src='" + image_base_url.val() + data.coin.image_url + "' style='width:23px' alt='" + data.coin.coin.coin_name + "'/>");

                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

        function saveRequest() {
            $.ajax({
                url: $('[name=borrow_url]').val(),
                data: form.serialize(),
                type: 'POST',
                async: false,
                success: function (data) {

                    $('.toast').toast('show');
                    $('.close').click();
                    $('html, body').animate({scrollTop: '0px'}, 0);
                    if (data.status === true) {
                        $('.toast').attr('class', 'toast bg-success');
                        $('#toast-caption').html('Borrow Notfication');
                        $('#toast-descr').html(data.message);
                        form[0].reset();
                        calc_page.hide();
                    } else {
                        $('.toast').attr('class', 'toast bg-danger');
                        $('#toast-caption').html('Borrow Notification');
                        $('#toast-descr').html(data.message);

                    }
                    console.log(data);
                },
                error: function (e) {
                    console.log(e);
                }
            });

        }

    </script>
@endsection
