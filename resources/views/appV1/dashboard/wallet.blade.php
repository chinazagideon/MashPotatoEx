@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Supported Coins')
@section('content')

    <div class="row">
        <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
            <p class="text-muted mb-0">Supported Coins
            </p>
        </div><!--end card-header-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0 table-centered">
                    <thead>
                    <tr>
                        <th>Coin</th>
                        <th>Price</th>
                        <th>Percent Change 1h</th>
                        <th></th>
                        <th class="text-right"></th>
                    </tr>
                    </thead>
                    <tbody id="my_wallet_ticker"></tbody>

                </table><!--end /table-->
            </div><!--end /tableresponsive-->
        </div><!--end card-body-->
    </div><!--end card-->
    </div> <!-- end col -->
    </div>

@endsection


@section('page_js')

    <input type="hidden" name="base_url" value="{{url('')}}"/>
    <input type="hidden" name="image_root_url" value="{{config('app.coin_image_url')}}">

    <script type="text/javascript">
        let base_url = $('[name=base_url]');

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
        function fetchChart(coinslug){
            $.ajax({
                url:  base_url.val()+"/coin/widget/"+coinslug,
                data:{},
                type: 'GET',
                success:function(result){
                    console.log(result);
                },
                error: function(e){
                    console.log(e);
                },
            });
        }

        function priceTicker2() {

            let image_root_url = $('[name=image_root_url]');
            $.ajax({
                type: 'GET',
                url: $('[name=coin_info_url]').val()+"/10",
                data: '',
                success: function (data) {
                    let segment = "";
                    let grid_size = '';
                    let count = 1;
                    $.each(data.coins, function (name, value) {
                        segment += " <tr>\n" +
                            "                        <td><img src=\"https://www.cryptocompare.com/"+value.image_url+"\" alt=\"\" class=\"rounded-circle thumb-xs me-1\">\n" +
                            "                            "+value.coin.coin_name+" ("+ value.coin.coin_slug +")\n" +
                            "                        </td>\n" +
                            "                        <td>$"+addCommas(value.price)+"</td>\n" +
                            "                        <td>"+(value.percent_change_24h.substr(0,1) !== "-" ? "<span class=\"text-success\">+" : "<span class=\"text-danger\">") +(value.percent_change_24h)+"%</td>\n" +
                            "                        <td><a class='btn btn-sm btn-primary' href='"+ base_url.val() + "/coin/"+value.coin.coin_slug+"/chart' >View Chart</a></td>\n" +
                            "                        <td class=\"text-right\">\n" +
                            "                            <div class=\"dropdown d-inline-block\">\n" +
                            "                                <a class=\"dropdown-toggle arrow-none\" id=\"dLabel11\" data-bs-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"false\" aria-expanded=\"false\">\n" +
                            "                                    <i class=\"las la-ellipsis-v font-20 text-muted\"></i>\n" +
                            "                                </a>\n" +
                            "                                <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"dLabel11\">\n" +

                            "                                </div>\n" +
                            "                            </div>\n" +
                            "                        </td>\n" +
                            "                    </tr>";

                        count = count +1;

                    });
                    $('#my_wallet_ticker').html(segment);
                },
                error:function (e) {
                    console.log(e);
                }

            });

        }

        let interval2 = 5000;
        clearTimeout(interval2);
        setInterval(function(){
            priceTicker2();
        },  Number(interval2) + 1000);

    </script>
    <div class="modal fade bd-example-modal-lg" id="exampleModalLarge" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title m-0" id="myLargeModalLabel">Large Modal</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><!--end modal-header-->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <img src="{{asset('appV1/dashb/assets/images/widgets/flame-5.png')}}" alt="" class="img-fluid">
                        </div><!--end col-->
                        <div class="col-lg-8 align-self-center">
                            <div class="error-content text-center">
                                <h1>404!</h1>
                                <h4 class=" mb-3">Looks like you've got lost...</h4>
                                <button type="button" class="btn btn-soft-primary">Back to Dashboard</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                </div><!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div><!--end modal-footer-->
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div><!--end modal-->
@endsection
