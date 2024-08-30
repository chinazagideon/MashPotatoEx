@extends('admin.layout.nav')
@section('page_title', 'Withdrawals')
@section('content')

    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>
                <div class="element-box"><h5 class="form-header">List of all withdrawals</h5>
                    {{--                    <div class="form-desc">Transaction</div>--}}
                    <style>
                        table{
                            color: grey !important;
                        }
                    </style>
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Balance</th>
                                <th>Amount</th>
                                <th>Wallet Address</th>
                                <th>Coin</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Balance</th>
                                <th>Amount (USD)</th>
                                <th>Wallet Address</th>
                                <th>Coin</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($transactions as $pay)

                                <tr>
                                    <td>#{{$pay->trans_id}}</td>
                                    <td>{{$pay->user->name}}</td>
                                    <td>{{$pay->type == "BTC" ? round($pay->user->btc_balance,2).'BTC' : $pay->user->zec_balance.'ZEC'}}</td>
                                    <td>{{number_format($pay->amount_usd,2)}}</td>
                                    <td>{{$pay->wallet}}</td>
                                    <td>{{$pay->type}}</td>
                                    <td>{{$pay->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($pay->status == \App\Withdrawal::APPROVED)
                                            Completed
                                        @elseif($pay->status == \App\Withdrawal::CANCELLED)
                                            Cancelled
                                        @elseif($pay->status == \App\Withdrawal::PENDING)
                                            Pending
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--------------------
START - Chat Popup Box
-------------------->
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{asset('dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
@endsection
