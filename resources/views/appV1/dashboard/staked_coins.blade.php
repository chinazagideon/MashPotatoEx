@extends('appV1.dashboard.layouts.sidebar')
@section('page_title','Staked Coins')
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
                    <h4 class="card-title">Staking Notice!!</h4>
                    <p class="text-muted mb-0">
                        Click <strong>UNSTAKE</strong> to terminate stake account, you will be charged {{\App\Staking::UNSTAKE_FEE}}% from your accumulated profits,
                        <br/><strong>DO NOT</strong> click <strong>UNSTAKE</strong> if you are not ready to terminate it.
                    </p>
                </div><!--end card-header-->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Coin Name</th>
                            <th>Quantity</th>
                            <th>APY</th>
                            <th>Gains</th>
                            <th>Timestamps</th>
                            <th>transID</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($staked_coins as $coins)
                            @php
                            $gains = \App\Returns::where('transaction_id', $coins->trans_id)->sum('accumulated_returns');
                            @endphp
                        <tr>
                            @if($coins->comment === 'token_stake')

                            @php
                            $tokens = new \App\Http\Controllers\TokenController();
                            $token_info = $tokens->getTokenCoinInfo(null, $coins->coin_id);
                            @endphp
                                <td>{{$token_info->caption}}</td>
                                <td>{{$coins->coin_qty}}{{$token_info->slug}}</td>
                                <td>{{$token_info->apy}}%</td>
                            @else

                            <td>{{$coins->coin->coin_name}}</td>
                            <td>{{$coins->coin_qty}}{{$coins->coin->coin_slug}}</td>
                            <td>{{$coins->coin->apr}}%</td>
                            @endif
                            <td>${{number_format($gains)}}</td>
                            <td>{{$coins->created_at}}</td>
                            <td>{{$coins->trans_id}}</td>
                            <td>
                                @if($coins->status === \App\Transactions::ACTIVE)
                                    <span class="badge badge-pill badge-outline-success">Running</span>

                                @elseif($coins->status === \App\Transactions::PENDING)
                                    <span class="badge badge-pill badge-outline-primary">Pending</span>


                                @elseif($coins->status === \App\Transactions::CANCELLED)
                                    <span class="badge badge-pill badge-outline-danger">DEACTIVATED</span>

                                @endif
                            </td>
                            <td>
                                @if($coins->status === \App\Transactions::ACTIVE)
                                    <a href="{{route('unstake', ['transid' => $coins->trans_id])}}" class="btn btn-outline-danger">Unstake </a>

                                @elseif($coins->status === \App\Transactions::CANCELLED)
                                    <button class="btn btn-outline-danger disabled" >Unstaked</button>
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
