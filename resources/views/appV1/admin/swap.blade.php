@extends('appV1.admin.layout.nav')
@section('page_title', 'Swap Coin List')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>


                <div class="element-box"><h5 class="form-header">@yield('page_title')</h5>
                    <div class="form-desc"></div>
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
                                <th>Coin </th>
                                <th>Coin Qty</th>
                                <th>Swap Coin</th>
                                <th>Swap Qty</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                                {{--                                <th>Maturity Date</th>--}}
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>User</th>
                                <th>Coin </th>
                                <th>Coin Qty</th>
                                <th>Swap Coin</th>
                                <th>Swap Qty</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                                {{--                                <th>Maturity Date</th>--}}
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($swap_list as $swap)
                                @php
                                $coin = new \App\Http\Controllers\CoinsController();
                                $coin_1 = $coin->getCoin(null, $swap->coin_id);
                                $coin_2 = $coin->getCoin(null, $swap->reference_id);

                                @endphp

                                <tr>
                                    <td>{{is_object($swap->user) ? $swap->user->email : 'User unavailable'}}</td>
                                    <td>{{$coin_1->coin_name}}</td>
                                    <td>{{$swap->coin_qty}}{{$coin_1->coin_slug}}</td>
                                    <td>{{$coin_2->coin_name}}</td>
                                    <td>{{$swap->reference_id_qty . $coin_2->coin_slug}}</td>
                                    <td>{{$swap->created_at}}</td>
                                    <td>{{$swap->status == \App\Transactions::ACTIVE ? "Completed" : "Error"}}</td>
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
