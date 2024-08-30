{{--buy tokens and collect payment--}}
@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Buy Token')
@section('content')

    <div class="row offset-md-3 mb-5" id="detailsPane">
        <div class="col-lg-8">
            <div class="">
                <h4 class="display-4">Buy Token - {{$coin->coin}}</h4>
                <h4>Purchase new tokens</h4>
            </div>

            <span id="errorSpan" class="text-danger"></span>
            <hr/>
            <form action="{{route('buyin_sale')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">Sale options</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="token_option">
                            <option>Select Sale Option</option>
                            @foreach($coin_sale_data as $sale_data)
                                <option
                                    value="{{$sale_data->id}}">{{$sale_data->option. ' ('.$sale_data->currency.$sale_data->price_per_token.')'}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">Tokens</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="amount" placeholder="Enter amount of token"
                               value="{{!empty(old('amount'))}}"
                               id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">Fiat Amount</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="fiat_amount" readonly placeholder="Fiat Amount"
                               value="{{!empty(old('fiat_amount'))}}"
                               id="example-text-input">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">Pay with</label>
                    <div class="col-sm-10">

                        <select class="form-control" name="coin_slug" id="swap_coin_list_2">
                        </select>
                        <small class="text-primary text-right" id="bal_amt"></small>
                    </div>
                </div>
                <div class="form-group row" id="buy_token_btn" style="display: none">
                    <small class="text-danger">NB: Sales will be processed with the wallet selected for the purchase,
                        and the tokens will be credited after
                        the general sales is completed.
                    </small>
                    <input type="submit" class="btn btn-primary btn-block" id="submit_token" disabled name="submit" value="Buy Token">
                </div>
            </form>
        </div>
    </div>
    <input name="pre_base_url" value="{{url('api/')}}" type="hidden">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>

@endsection
@section('page_js')
    <script type="text/javascript">

        var option = $('[name=token_option]');
        var no_tokens = $('[name=amount]');
        var user_id = $('[name=user_id]').val();
        var coin_slug = $('[name=coin_slug]');
        var errorSpan = $('#errorSpan');

        option.on('change', function () {
            getSaleDetail(option.val(), 0);
        });

        coin_slug.on('change', function () {
            getCoinBalance(coin_slug.val(), user_id);
        });

        no_tokens.on('input', function () {
            if(no_tokens.val() >= 1) {
                getSaleDetail(option.val(), 0);
                if (coin_slug.val() !== null || coin_slug.val() !== '') {
                    getCoinBalance(coin_slug.val(), user_id);
                }
            }
        });

        function getSaleDetail(sale_id, bal) {
            $.ajax({
                url: $('[name=pre_base_url]').val() + '/presale/' + sale_id,
                type: 'GET',
                data: '',
                success: function (data) {
                    if (data.status === true) {
                        errorSpan.hide();

                        var fiat_amount = data.sale.price_per_token * no_tokens.val();
                        $('[name=fiat_amount]').val(data.sale.currency + '' + fiat_amount);
                        if (
                            (data.sale.min_purchase !== null ? Number(fiat_amount) >= Number(data.sale.min_purchase) : Number(fiat_amount) > 1)
                            &&
                            (Number(data.sale.max_purchase) !== null ? Number(fiat_amount) <= Number(data.sale.max_purchase) : '')
                                &&
                            Number(bal) > 0
                        ) {

                            $.ajax({
                                url: $('[name=pre_base_url]').val()+'/validate/balance/'+coin_slug.val()+'/'+fiat_amount+'/'+user_id,
                                type:'GET',
                                data: '',
                                success: function(data1){
                                    if(data1.status === true) {
                                        errorSpan.hide();

                                        $('#buy_token_btn').show();
                                        $('#submit_token').removeAttr('disabled');
                                    }else{
                                        errorSpan.show();
                                        errorSpan.html("<h5 class='text-danger'>"+data1.msg+"</h5>");
                                        $('#buy_token_btn').hide();
                                        $('#submit_token').attr('disabled', 'disabled');
                                    }

                                },
                                error: function (e1){
                                    console.log(e1);
                                }

                            });

                        }else if(bal === false)
                        {   
                            errorSpan.show();
                            errorSpan.html("<h5 class='text-danger'>Insufficient fund to buy tokens, fund your account to continue.</h5>");
                            $('#buy_token_btn').hide();
                            $('#submit_token').attr('disabled', 'disabled');
                        
                        }else {
                            errorSpan.show();
                            errorSpan.html("<h5 class='text-danger'>Sale minimum is "+(data.sale.min_purchase == null ? '1' : data.sale.currency+data.sale.min_purchase)+", and Maximum is "+(data.sale.max_purchase == null ? 'no limit' : data.sale.currency+data.sale.max_purchase )+"</h5>");
                            $('#buy_token_btn').hide();
                            $('#submit_token').attr('disabled', 'disabled');
                        }
                    } else {
                        console.log('invalid presale id selected');
                    }

                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

        function getCoinBalance(coin, user) {
            $.ajax({
                url: $('[name=pre_base_url]').val() + "/coin/balance/" + user + "/" + coin,
                type: 'GET',
                data: '',
                success: function (data) {

                    if(data.status === true) {
                        $('#bal_amt').html(coin + " Balance: " + data.coin_balance + coin);

                        if (data.coin_balance > 0 && option.val() !== null) {
                            getSaleDetail(option.val(), data.coin_balance);
                        } else {
                            $('#buy_token_btn').hide();
                            $('#submit_token').attr('disabled', 'disabled');
                        }
                    }else{
                        getSaleDetail(option.val(), false);
                        console.log('insufficient balance false');
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

    </script>
@endsection
