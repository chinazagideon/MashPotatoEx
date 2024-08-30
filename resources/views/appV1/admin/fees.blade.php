@extends('appV1.admin.layout.nav')
@section('page_title', 'Fees')
@section("content")
    <div class="content-i">

        <div class="content-box">
            <div class="element-wrapper">

                <div class="col-md-6 col-sm-12"><a
                        class="element-box el-tablo centered trend-in-corner smaller" href="#">
                        <div class="label">Total Fees</div>
                        <div class="value">
                            &nbsp;{{$total_fees > 0 ? '$'.number_format($total_fees,2) : '0.00'}}
                        </div>
                    </a>
                </div>

                <div class="element-box"><h5 class="form-header">Fees</h5>
                    <div class="form-desc">
                        <p>Fees paid by user</p>

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
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Service</th>
                                <th>Coin</th>
                                <th>Rate (%)</th>
                                <th>TransID</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Service</th>
                                <th>Via Coin</th>
                                <th>Rate (%)</th>
                                <th>TransID</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($fees as $tran)

                                <tr>
                                    <td>fee</td>
                                    <td>${{number_format($tran->amount,2)}}</td>
                                    <td>{!! $tran->currency !!}</td>
                                    <td>{{$tran->service_paid}}</td>
                                    <td>{{$tran->coin_slug}}</td>
                                    <td>{{$tran->percentage}}%</td>
                                    <td>****{{substr($tran->reference_id, strlen($tran->reference_id)- 6, strlen($tran->reference_id))}}</td>
                                    <td>{{$tran->created_at}}</td>
                                    <td>
                                        {{$tran->status == \App\Fees::ACTIVE ? "Paid" : "Pending"}}
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
