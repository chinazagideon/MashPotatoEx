@extends('appV1.admin.layout.nav')
@section('page_title', "Borrow Application")
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>


                <div class="element-box"><h5 class="form-header">Loan Applications</h5>
                    <div class="form-desc"></div>
                    <style>
                        table{
                            color: grey !important;
                        }
                    </style>
                    <div class="table-responsive">
                        <p>Coin Value is calculated with live market rate</p>
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Fiat Amount</th>
                                <th>Loan Coin Qty</th>
                                <th>Coin</th>
                                <th>Collateral</th>
                                <th>Collat. Bal</th>
                                <th>Status</th>
                                <th>Timestamp</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>User</th>
                                <th>Fiat Amount</th>
                                <th>Loan Coin Qty</th>
                                <th>Coin Name</th>
                                <th>Collat. Coin</th>
                                <th>Collat. Bal</th>
                                <th>Status</th>
                                <th>Timestamp</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($borrows as $lend)
                                @php
                                $balance = new \App\Http\Controllers\CoinsBalanceController();
                                $coin_info = new \App\Http\Controllers\CoinInfoController();
                                $coin = new \App\Http\Controllers\CoinsController();
                                $loan_coin = $coin->getCoin(null, $lend->coin_id);

                                $loan_coin_info= $coin_info->getCoinInfo($lend->coin_id);
                                $collateral_coin = $coin->getCoin(null, $lend->collateral_coin_id);
                                $coin_bal = $balance->getUserCoinBalance($lend->user_id, $collateral_coin->coin_slug);

                                $collateral_coin_info = $coin_info->getCoinInfo($lend->collateral_coin_id);
                                @endphp

                                <tr>
                                    <td>{{is_object($lend->user) ? $lend->user->email: ' User Unavailable'}}</td>
                                    <td class="text-left">${{number_format($lend->coin_qty * $loan_coin_info->price, 2)}}</td>
                                    <td class="text-left">{{$lend->coin_qty. $loan_coin->coin_slug}}</td>
                                    <td>{{$loan_coin->coin_name}}</td>
                                    <td>{!! $lend->collateral_coin_qty . ' '.$collateral_coin->coin_slug !!}</td>
                                    <td>{!! $coin_bal > 0 ? $coin_bal : '0.0' !!}{{$collateral_coin->coin_slug}}</td>
                                    <td>
                                        @if($lend->status === \App\Borrow::ACTIVE)
                                            Approved
                                         @elseif($lend->status === \App\Borrow::CANCELLED)
                                            Cancelled
                                         @else
                                            Pending
                                         @endif
                                    </td>
                                    <td>{{$lend->created_at}}</td>
                                    <th>
                                        @if($lend->status === \App\Borrow::ACTIVE)
                                            <button class="btn btn-sm btn-success">Approved</button>
                                        @elseif($lend->status === \App\Borrow::CANCELLED)
                                            <button class="btn btn-sm btn-danger">Cancelled</button>
                                        @else
                                            <button class="btn btn-sm btn-primary" data-target="#approveLoan{{$lend->id}}"
                                                     data-toggle="modal" type="button">Change Status</button>
                                        @endif

                                    </th>
                                </tr>
                                <div aria-hidden="true" class="onboarding-modal modal fade animated"
                                     id="approveLoan{{$lend->id}}" role="dialog" tabindex="-1" data-backdrop="static"
                                     data-keyboard="false">
                                    <div class="modal-dialog modal-centered" role="document">
                                        <div class="modal-content text-center">
                                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                <span class="close-label"></span><span
                                                    class="os-icon os-icon-close"></span></button>
                                            <div class="onboarding-content with-gradient">

                                                <div class="">
                                                    <h5 class="form-header"></h5>

                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            Approve Loan Application,
                                                        </label>
                                                        <p>On Approval, Coin will be added to user Balance and Collateral will be subtracted.</p>
                                                    </div>

                                                    <fieldset class="form-group">
                                                        <a href="{{route('admin.loan_status', ['id' => $lend->id, 'action' =>'approve'])}}" class="btn btn-outline-success btn-md">Approve Application</a>
                                                        <a href="{{route('admin.loan_status', ['id' => $lend->id, 'action' =>'cancel'])}}" class="btn btn-outline-danger btn-md">Reject Application</a>
                                                    </fieldset>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
