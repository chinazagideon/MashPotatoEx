@extends('appV1.admin.layout.nav')
@section('page_title', 'Withdrawal Requests')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>


                <div class="element-box"><h5 class="form-header">@yield('page_title')</h5>
                    <div class="form-desc">Other Coin Withdrawal</div>
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
                                <th>Address</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>User</th>
                                <th>Coin Qty</th>
                                <th>Coin Name</th>
                                <th>Address</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($withdrawals as $withdraw)


                                <tr>
                                    <td>{{is_object($withdraw->user)? $withdraw->user->email :'deleted accounts'}}</td>
                                    <td class="">
                                        {{$withdraw->coin_qty}}{{$withdraw->token->slug}}
                                    </td>
                                    <td>
                                            {{$withdraw->token->caption}}
                                    </td>
                                    <td>{{$withdraw->address}}</td>
                                    <td>{{$withdraw->created_at}}</td>
                                    <td>
                                        @if($withdraw->status === \App\Withdrawal::APPROVED)
                                            Approved
                                         @elseif($withdraw->status === \App\Withdrawal::CANCEELED)
                                            Cancelled
                                         @else
                                            Pending
                                         @endif
                                    </td>
                                    <td>
                                        @if($withdraw->status === \App\Withdrawal::CANCEELED)
                                            <button class="btn btn-sm btn-danger">Cancelled</button>
                                        @elseif($withdraw->status === \App\Withdrawal::APPROVED)
                                            <button class="btn btn-sm btn-success">Approved</button>
                                        @else
                                        <a href="{{route('admin.approve_withdraw', ['trans_id' => $withdraw->trans_id, 'action' => 'approve'])}}" class="btn btn-sm btn-success">Approve Withdrawal</a>
                                        <a href="{{route('admin.approve_withdraw', ['trans_id' => $withdraw->trans_id, 'action' => 'cancel'])}}" class="btn btn-sm btn-danger">Cancel Withdrawal</a>
                                        @endif
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
