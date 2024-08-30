@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Transaction Accelerator')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-lg-8 col-lg-offset-2 ">
<br/>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('page_title')</h4>
                    <p class="text-muted mb-0">Transaction still Pending? use accelerator to hasten the confirmation</p>
                </div><!--end card-header-->
                <div class="card-body">
                    <form action="{{route('trans_accelerator')}}" method="post">
                        @csrf
                            <div class="form-group row">
                                <label for="ddlCreditCardType" class="col-lg-2 col-form-label">Select Coin</label>
                                <div class="col-lg-10">
                                    <select id="staking_list" name="coin_slug"
                                            class="form-control">

                                    </select>
                                </div>
                            </div><!--end form-group-->
                        <div class="form-group row">
                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Coin Amount</label>
                            <div class="col-sm-10">
                                <input type="text" name="coin_qty" id="coin_qty" class="form-control"
                                       placeholder="Enter coin quantity"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Transaction Hash</label>
                            <div class="col-sm-10">
                                <input type="text" name="hash" class="form-control form-control-lg"
                                       placeholder="Enter Blockchain Transaction Hash"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="horizontalInput1" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Accelerate</button>
                            </div>
                        </div>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div>
    </div>

    <input name="app_url" value="{{url('/api')}}" type="hidden"/>

@endsection

@section('page_js')
<script type="text/javascript">
    let app_url = $('[name=app_url]').val();


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
    addOtherStakeCoins();
</script>
@endsection
