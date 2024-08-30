@extends('appV1.admin.layout.nav')
@section('page_title', "Mining Orders")
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>


                <div class="element-box"><h5 class="form-header">@yield('page_title')</h5>
                    <div class="form-desc">Mining Orders.</div>
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
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Product</th>
                                <th>Timestamp</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>User</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Product</th>
                                <th>Timestamp</th>
                            </tr>
                            </tfoot>
                            <tbody>

{{--                            @dd($mining)--}}
                            @foreach($mining as $mine)
                                <tr>
                                    <td>{{is_object($mine->user) ? $mine->user->name :'no name' }}</td>
                                    <td>{{is_object($mine->user) ? $mine->user->delivery_phone: 'no address'}}</td>
                                    <td class="">{{is_object($mine->user) ? $mine->user->delivery_email : 'no email'}}</td>
                                    <td class="">{{$mine->qty}}</td>
                                    <td>${{number_format($mine->price)}}</td>
                                    <td>${{number_format($mine->price * $mine->qty)}}</td>
                                    <td>{{$mine->products->caption}}</td>
                                    <td>{!! $mine->created_at !!}</td>
{{--                                </tr>--}}
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
