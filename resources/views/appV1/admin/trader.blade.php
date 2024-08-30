@extends('appV1.admin.layout.nav')
@section('page_title', 'Trade history')
@section('content')
    <div class="content-i">

        <div class="content-box">
            <div class="element-wrapper">
                <div class="row">
                    <div class="col-md-6 col-sm-12"><a
                            class="element-box el-tablo centered trend-in-corner smaller" href="#">
                            <div class="label">Trade Wallet</div>
                            <div class="value">
                                &nbsp;{{$user->trade_balance > 0 ? number_format($user->trade_balance,2). \App\Trader::TRADE_RETURN_COIN : '0.00'}}
                            </div>
                        </a>
                    </div>
                </div>
                <div class="element-box"><h5 class="form-header">Trade Balance</h5>
                    <div class="form-desc">

                        <a href="{{route('admin.manage', ['id' => $user->id])}}"
                           class="mr-2 mb-2 btn btn-outline-warning" type="button"> Return to {{$user->fname}}'s Profile</a>
                    </div>
                    <style>
                        table {
                            color: grey !important;
                        }
                    </style>
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Trade Size</th>
                                <th>Profit</th>
                                <th>Exchange</th>
                                <th>Pair</th>
                                <th>Inv. Profit</th>
                                <th>TransID</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Type</th>
                                <th>Trade Size({{\App\Trader::TRADE_RETURN_COIN}})</th>
                                <th>Profit ({{\App\Trader::TRADE_RETURN_COIN}})</th>
                                <th>Exchange</th>
                                <th>Pair</th>
                                <th>Inv. Profit ({{\App\Trader::TRADE_RETURN_COIN}})</th>
                                <th>TransID</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($trades as $tran)

                                <tr>
                                    <td>{{strtoupper($tran->trade_type)}}</td>
                                    <td>{{number_format($tran->amount,2)}}</td>
                                    <td>{!! $tran->total_profit >= 0 ? "<span class='text-success'>".round($tran->total_profit,5)."</span>": "<span class='text-danger'>".round($tran->total_profit,5)."</span>" !!}</td>
                                    <td>{{$tran->exchange}}</td>
                                    <td>{{$tran->pair}}</td>
                                    <td>{{$tran->invite_profit > 0 ? round($tran->invite_profit, 5) : '0.00'}}</td>
                                    <td>#{{$tran->refcode}}</td>
                                    <td>{{$tran->created_at}}</td>
                                    <td>
                                        {{$tran->status == \App\Trader::ACTIVE ? "Completed" : "Pending"}}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('page_js')
    <script src="{{asset('appV1/admin/js/dataTables.bootstrap4.min.js')}}"></script>

@endsection
