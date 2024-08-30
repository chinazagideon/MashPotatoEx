@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Transaction History')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('page_title')</h4>
                    <p class="text-muted mb-0">
                    </p>
                </div><!--end card-header-->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>ID</th>
                            <th>Action</th>
                            <th>Value</th>
                            <th>Fiat Amount</th>
                            <th>Timestamp</th>
                            <th>Status</th>
                        </tr>
                        </thead>


                        <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach($transactions as $coin)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$coin->trans_id}}</td>
                                <td>{{formatNotifyCaption($coin->type)}}</td>
                                @if($coin->comment == 'token_stake')
                                    @php
                                        $token_info = new \App\Http\Controllers\TokenController();
                                    $token_details = $token_info->getTokenCoinInfo(null, $coin->coin_id);
                                    @endphp
                                    <td> {{$coin->coin_qty . '' .$token_details->slug}} Staking completed</td>

                                @else
                                <td>{{ readAbleTransactionFormat($coin->type, $coin->coin_id, $coin->reference_id, $coin->coin_qty) }}</td>
                                @endif
                                <td>{{number_format($coin->fiat_amount, 2) .' '. $coin->fiat_currency}}</td>

                                <td>{{$coin->created_at}}</td>
                                <td>
                                @if($coin->status === \App\Transactions::ACTIVE)
                                        <span class="badge badge-pill badge-outline-success">Completed</span>
                                @elseif($coin->status == \App\Transactions::PENDING)
                                        <span class="badge badge-pill badge-outline-primary">Pending</span>
                                @elseif($coin->status === \App\Transactions::CANCELLED)
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
