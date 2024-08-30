@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Referral program')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="alert alert-primary-shadow mb-0" role="alert">
                    <h4 class="alert-heading font-size-24"><strong>Create passive income with our referral program</strong></h4>
                    {{--                <br/>--}}

                    <p class="mb-0"> Experience a new way of earning crypto without deposits by inviting your friends, family,
                        community and well wisher to join the {{config('app.name')}} beneficiary. Invite friends and earn crypto
                        together!!!</p>

                    <p class="mb-0"> {{config('app.name')}} is creating an opportunity for everyone to earn cryptos from people they refer to our
                        platform. This means that for every new user you successfully referred to {{config('app.name')}}, the
                        referral would earn up to 1-5% from users participants in staking, swapping and trading their
                        crypto on our platform. </p>

                    <p class="mb-0"> This mean that, for every time a user you referred execute any transaction, you earn some
                        percentages from their profits. That being said, you are now free to invite users to our
                        platform using your referral link and receive commissions </p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class=" col-sm-12 col-md-6 mt-5">
                <div class="input-group">
                    <input readonly type="text" class="form-control" id="clipboardInput"
                           value="{{config('app.url').'/ref/'.Auth::user()->member_id}}">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-success btn-clipboard" data-clipboard-action="copy"
                                data-clipboard-target="#clipboardInput"><i class="far fa-copy mr-2"></i>Copy Link
                        </button>
                        {{--                    <button type="button" class="btn btn-primary  btn-clipboard" data-clipboard-action="cut" data-clipboard-target="#clipboardInput"><i class="fas fa-cut mr-2"></i>Cut</button>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Referral</h4>
                        <p class="text-muted mb-0">List of referrals.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($my_refs as $referrals)
                                @php
                                    $dash_controller = new \App\Http\Controllers\DashboardController();
                                    $ref_status = $dash_controller->verifyRefStatus($referrals->id);

                                @endphp
                                <tr>
                                    <td>{{$referrals->email}}</td>
                                    <td>{{$ref_status ? 'Active' : 'Not Active' }}</td>
                                    <td>
                                        @if($ref_status)
                                            <button type="button" class="btn btn-soft-success btn-icon-circle-sm mr-2">
                                                <i class="mdi mdi-check-all font-16"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-soft-danger btn-icon-circle-sm mr-2">
                                                <i class="mdi mdi-check-all font-16"></i>
                                            </button>
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
    <script src="{{asset('appV1/dashb/assets/pages/jquery.clipboard.init.js')}}" type="text/javascript"></script>

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
    <script src="{{asset('appV1/dashb/assets/pages/jquery.datatable.init.js')}}"></script>
@endsection

