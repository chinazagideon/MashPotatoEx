@extends('appV1.admin.layout.nav')
@section('page_title', 'Presale Orders')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>


                <div class="element-box"><h5 class="form-header">@yield('page_title')</h5>
                    <div class="form-desc">Presale Orders.</div>
                    <style>
                        table{
                            color: grey !important;
                        }
                    </style>
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Coin Name</th>
                                <th>Quantity</th>
                                <th>Fiat Value</th>
                                <th>Timestamps</th>
                                <th>transID</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th>User</th>
                                <th>Coin Name</th>
                                <th>Quantity</th>
                                <th>Fiat Value</th>
                                <th>Timestamps</th>
                                <th>transID</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>

                            {{--                            @dd($mining)--}}
                            @foreach($presale_orders as $sale)
                                <tr>

                                    <td>{{is_object($sale->user) ? $sale->user->email : 'no user'}}</td>
                                    <td>{{$sale->coinsaledata->coin}}</td>
                                    <td>{{$sale->no_token_purchased}}&nbsp;{{strtoupper($sale->coinsaledata->coin_slug)}}</td>
                                    <td>${{number_format($sale->no_token_purchased * $sale->price_per_token)}}</td>
                                    <td>{{$sale->created_at}}</td>
                                    <td>...{{strtoupper(substr($sale->trans_id, strlen($sale->trans_id) - 8, strlen($sale->trans_id)))}}</td>
                                    <td>
                                        @if($sale->status === \App\UserCoinsales::ACTIVE)
                                            <span class="badge badge-pill badge-outline-success">Approved</span>

                                        @elseif($sale->status === \App\UserCoinsales::PENDING)
                                            <span class="badge badge-pill badge-outline-primary">Pending</span>


                                        @elseif($sale->status === \App\UserCoinsales::DEACTIVATION)
                                            <span class="badge badge-pill badge-outline-danger">Cancelled</span>

                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            @if($sale->status === \App\UserCoinsales::PENDING)
                                            <a href="{{route('admin.preorder_status', ['action' => 'approve', 'trans_id' => $sale->trans_id])}}" class="btn btn-success">Approve</a>
                                            <a href="{{route('admin.preorder_status', ['action' => 'cancel', 'trans_id' => $sale->trans_id])}}"  class="btn btn-danger">Cancel</a>
                                            @endif

                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--------------------START - Chat Popup Box-------------------->
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{asset('appV1/admin/js/dataTables.bootstrap4.min.js')}}"></script>
@endsection
