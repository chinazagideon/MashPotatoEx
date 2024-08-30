@extends('admin.layout.nav')
@section('page_title', 'List matched')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>
                <div class="element-box"><h5 class="form-header">Matched List</h5>
                    <div class="form-desc">Users that are not matched are indicated as <b>Not Matched</b>, </div>
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
                                <th>Receiver</th>
                                <th>Payer</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Receiver</th>
                                <th>Payer</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($orders as $order)

                                <tr>
                                    <td>#{{!empty($order->trans_id) ? $order->transaction->trans_id : 'Not Set'}}</td>
                                    <td>{{!empty($order->user_id) ? $order->receiver->name : 'Not Matched'}}</td>
                                    <td>{{!empty($order->payer_id) ? $order->payer->name : 'Not Matched' }}</td>
                                    <td>₦{{$order->amount > 0 ? number_format($order->amount) : '0.00'}}</td>

{{--                                    <td>₦{{$pay->total_amount > 0 ? number_format($pay->total_amount) : '0.00'}}</td>--}}
                                    <td>{{$order->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($order->status == \App\Orders::APPROVED)
                                            Approved
                                        @elseif($order->status == \App\Orders::PENDING)
                                            Pending
                                        @elseif($order->status == \App\Orders::CANCELLED)
                                            Cancelled
                                        @endif
                                    </td>
                                    <td><button class="mr-2 mb-2 btn {{$order->status == \App\Orders::APPROVED ? 'btn-outline-success' : 'btn-outline-danger'}} " type="button"> {{$order->status == \App\Orders::PENDING ? 'Pending' : 'Approved'}}</button></td>
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
