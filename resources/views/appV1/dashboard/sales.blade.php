@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Token Sale Orders')
@section('content')
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('page_title')</h4>
                    <p class="text-muted mb-0">
                    </p>
                </div><!--end card-header-->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
{{--                    <h4 class="card-title">Presale Orders</h4>--}}
                    <p class="text-muted mb-0">
                    </p>
                </div><!--end card-header-->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Coin Name</th>
                            <th>Quantity</th>
                            <th>Fiat Value</th>
                            <th>Timestamps</th>
                            <th>transID</th>
                            <th></th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($pre_orders as $sale)

                            <tr>

                                    <td>{{$sale->coinsaledata->coin}}</td>
                                    <td>{{$sale->no_token_purchased}}&nbsp;{{strtoupper($sale->coinsaledata->coin_slug)}}</td>
                                <td>${{number_format($sale->no_token_purchased * $sale->price_per_token)}}</td>
                                <td>{{$sale->created_at}}</td>
                                <td>{{$sale->trans_id}}</td>
                                <td>
                                    @if($sale->status === \App\UserCoinsales::ACTIVE)
                                        <span class="badge badge-pill badge-outline-success">Received</span>

                                    @elseif($sale->status === \App\UserCoinsales::PENDING)
                                        <span class="badge badge-pill badge-outline-primary">Pending</span>


                                    @elseif($sale->status === \App\UserCoinsales::DEACTIVATION)
                                        <span class="badge badge-pill badge-outline-danger">Cancelled</span>

                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_css')
    <!-- DataTables -->
    <link href="{{asset('appV1/dashb/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('appV1/dashb/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{asset('appV1/dashb/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection


@section('page_js')
    <script src="{{asset('appV1/dashb/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('appV1/dashb/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{asset('appV1/dashb/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
@endsection


