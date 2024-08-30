@extends('appV1.admin.layout.nav')
@section('page_title', 'Staking')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>


                <div class="element-box"><h5 class="form-header">@yield('page_title')</h5>
                    <div class="form-desc">Locked coin.</div>
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
                                <th>Coin Qty</th>
                                <th>Coin Name</th>
                                <th>Gain</th>
                                <th>APY</th>
                                <th>Timestamp</th>
                                <th>Status</th>
{{--                                <th>Maturity Date</th>--}}
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>User</th>
                                <th>Coin Qty</th>
                                <th>Coin Name</th>
                                <th>Gain</th>
                                <th>APY</th>
                                <th>Timestamp</th>
                                <th>Status</th>
{{--                                <th>Maturity Date</th>--}}
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($staking as $stake)
                                @php
                                    $gains = \App\Returns::where('transaction_id', $stake->trans_id)->sum('accumulated_returns');

                                                $tokens = new \App\Http\Controllers\TokenController();
                                            $token_info = $tokens->getTokenCoinInfo(null,$stake->coin_id);

                                @endphp

                                <tr>
                                    <td>{{is_object($stake->user) ? $stake->user->email: 'User Deleted'}}</td>
                                    <td class="">
                                        {{$stake->coin_qty}}{{$stake->comment === 'token_stake' ? $token_info->slug : $stake->coin->coin_slug}}
                                    </td>
                                    <td>

                                        @if($stake->comment ==='token_stake')
                                           {{ $token_info->caption}}
                                    @else
                                        {{$stake->coin->coin_name}}
                                    @endif

                                    </td>

                                    <td>${{ number_format($gains) }}</td>
                                    <td>
                                        @if($stake->comment === 'token_stake')
                                        {{$token_info->apy}}%
                                        @else
                                            {{$stake->coin->apr}}%
                                        @endif

                                    </td>
                                    <td>{{$stake->created_at}}</td>
                                    <td>{{$stake->status == \App\Transactions::ACTIVE ? "Running" : "Un-staked"}}</td>
{{--                                    <td>{{$stake->created_at->addDays($stake->duration)->diffForHumans()}}</td>--}}
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
