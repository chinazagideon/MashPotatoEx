@extends('admin.layout.nav')
@section('page_title', 'Messages')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>
                <div class="element-box"><h5 class="form-header">Contact messages</h5>
{{--                    <div class="form-desc">Users that are not matched are indicated as <b>Not Matched</b>, </div>--}}
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($reports as $report)

                                <tr>
                                    <td>{{$report->id}}</td>
                                    <td>{{!empty($report->name) ? $report->name : 'Not set'}}</td>
                                    <td>{{!empty($report->email) ? $report->email : 'Not set' }}</td>
                                    <td>{{!empty($report->phone) ? $report->phone : 'Not set' }}</td>
                                    <td>{{!empty($report->subject) ? substr($report->subject, 0, 25).'...' : 'Not set' }}</td>
                                    <td>{{$report->created_at->diffForHumans()}}</td>

                                    <td><button class="mr-2 mb-2 btn btn-outline-success" data-target="#onboardingTextModal{{$report->id}}" data-toggle="modal" type="button"> Read</button></td>
                                    <div class="onboarding-modal modal fade animated" id="onboardingTextModal{{$report->id}}"
                                         role="dialog" tabindex="-1" aria-modal="true">
                                        <div class="modal-dialog modal-centered" role="document">
                                            <div class="modal-content text-center">
                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                    <span class="close-label">Cancel</span><span
                                                        class="os-icon os-icon-close"></span></button>
{{--                                                <div class="onboarding-media"><img alt="" src="{{asset('dashboard/img/bigicon2.png')}}"--}}
{{--                                                                                   width="200px"></div>--}}
                                                <div class="onboarding-content with-gradient"><h4 class="onboarding-title">
                                                        {{$report->subject}}</h4>
                                                    <div class="onboarding-text ">
                                                        {!! nl2br($report->message) !!}
                                                    </div>
                                                    <a
                                                        href="{{route('admin.delete', ['id' => $report->id])}}"
                                                        class="btn btn-outline-success btn-lg"><i
                                                            class="os-icon os-icon-grid-10"></i> Delete Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
