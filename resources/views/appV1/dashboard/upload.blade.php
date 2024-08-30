@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Account Verification')
@section('content')

    <br/>
    <br/>
    <br/>
    <br/>

    @if(Auth::user()->verify_stage === \App\User::PENDING_APPROVAL)
        <div class="row offset-md-3 mb-5" id="detailsPane">
            <div class="col-lg-8">
                <div class="">
                    <h4 class="display-4 text-warning">Account verificatoin Pending</h4>
                    <h4>We are verifying the documents you submitted</h4>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->verify_stage === \App\User::VERIFIED)
        <div class="row offset-md-3 mb-5" id="detailsPane">
            <div class="col-lg-8">
                <div class="">
                    <h4 class="display-4 text-success">Account Verified</h4>
                    <h4>Verification complete</h4>
                </div>
            </div>
        </div>
    @else

    <form action="{{route('upload')}}" method="post" enctype="multipart/form-data" id="upload_documents">
        @csrf

        <div class="row offset-md-3 mb-5" id="detailsPane">
            <div class="col-lg-8">
                <div class="">
                    <h4 class="display-4">Account Verification</h4>
                    <h4>Fill the information as it corresponds with the available means of Identification that will be uploaded in the next stages</h4>
                </div>
                <hr/>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">Full Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="fname" placeholder="Jane"
                               value="{{!empty(old('fname')) ? old('fname') : Auth::user()->fname. '' . Auth::user()->lname}}"
                               id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">Phone</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="phone" placeholder="Phone"
                               value="{{!empty(old('phone')) ? old('phone') : Auth::user()->phone}}"
                               id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="email" placeholder="Email" readonly
                               value="{{Auth::user()->email}}"
                               id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input"
                           class="col-sm-2 col-form-label text-left">Physical Address</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{Auth::user()->address.' '. Auth::user()->city.  (!empty(Auth::user()->zipcode) ? ' ('. Auth::user()->zipcode .') ' : '') . Auth::user()->state}}" name="physical_address"
                               placeholder="Physical Address"
                               id="example-tel-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input"
                           class="col-sm-2 col-form-label text-left">Date of Birth</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="date" placeholder="" value="{{Auth::user()->dob}}" name="dob"
                               id="dob">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-12 col-form-label text-left"><strong>Social Security
                            Number</strong><br/> (or identification number from a government-issued ID for certain types
                        of customers)</label>
                    <div class="col-sm-12">
                        <input class="form-control" type="text" name="ssn" placeholder="SSN " value="{{!empty(old('ssn')) ? old('ssn') : Auth::user()->ssn}}"
                               id="example-text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-6">
                        <p class="text-danger font-size-16">All fields are required, Fill it up before going to next stage.</p>
                        <button type="button" onclick="event.preventDefault();" class="btn btn-primary btn-block"
                                id="details_btn" name="details_btn">Stage II: Upload Document
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <div class="row" id="doc_one">

            <div class="col-md-6 offset-lg-3">

                <div class="card">
                    <div class="card-header">
                        <h4 class="font-size-30">Stage Two</h4>
                        <p class="text-muted mb-0">Upload a Valid means of Identification with clear edges shown.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">

                        <div class="form-group row">

                            <label class="col-sm-3 col-form-label text-left">Document Type*</label>
                            <div class="col-sm-12">
                                <select class="custom-select" name="document_one_type">
                                    <option selected="" value="NULL">Select document </option>
                                    <option value="license">Drivers License</option>
                                    <option value="passport">Intl Passport</option>
                                    <option value="national_id">National ID</option>
                                    <option value="one_other_type">Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-body">
                            <input type="file" id="doc_one_upload" name="doc_one_upload" class="dropify"
                                   data-height="100"/>
                        </div><!--end card-body-->

                    </div><!--end card-->
                    <div class="card-body">

                        <div class="form-group row">

                            <label class="col-sm-3 col-form-label text-left">Document Type*</label>
                            <div class="col-sm-12">
                                <select class="custom-select" name="document_three_type">
                                    <option selected="" value="NULL">Select document </option>
                                    <option value="utility_bill">Utility Bill</option>
                                    <option value="bank_statement">Bank Statement</option>
                                    <option value="three_other_type">Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-body">
                            <input type="file" id="doc_one_upload" name="doc_three_upload" class="dropify"
                                   data-height="100"/>
                        </div><!--end card-body-->

                    </div><!--end card-->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right"></label>
                        <div class="col-sm-6">
                            <button type="button" onclick="event.preventDefault();" class="btn btn-primary btn-block"
                                    id="upload_doc" name="upload_doc">Stage III: Upload Selfie
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row" id="doc_two" style="display: none">
            <div class="col-md-6 offset-lg-3">

                <div class="card">
                    <div class="card-header">

                        <h4 class="font-size-24">Stage Three: Upload Selfie</h4>
                        <p class="font-size-24 mb-0">Upload a clear picture of your face holding your means
                            identification showing all edges.</p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="form-group row">

                            <label class="col-sm-3 col-form-label text-left">Select the document you are holding*</label>
                            <div class="col-sm-12">
                                <select class="custom-select" name="document_two_type">
                                    <option value="selfie" selected >My Selfie</option>
                                </select>
                            </div>
                        </div>

                        <input type="file" id="doc_two_upload" name="doc_two_upload" class="dropify" data-height="100"/>
                    </div><!--end card-->
                </div>
                <div class="card-footer">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right"></label>
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-success btn-block" value="Complete Verification"
                                   id="upload_file" name="upload_file">

{{--                            <button type="button" onclick="event.preventDefault();" class="btn btn-success btn-block"--}}
{{--                                    id="upload_file" name="upload_file">--}}
{{--                            </button>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group row" id="submitBtn">
            <label class="col-sm-3 col-form-label text-right"></label>
            <div class="col-sm-6">
                <input type="submit" class="btn btn-primary btn-block" value="Next: Upload Document II" id="next_btn"
                       name="next_btn">
                <input type="submit" class="btn btn-success btn-block" value="Upload Document: Complete Verification"
                       id="upload_file" name="upload_file" style="display: none">
            </div>
        </div>
    </form>

    @endif
@endsection

@section('page_js')
    <script src="{{asset('appV1/dashb/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/assets/pages/jquery.form-upload.init.js')}}"></script>

    <script type="text/javascript">

        var details = $('#detailsPane');
        var doc_one = $('#doc_one');
        var doc_two = $('#doc_two');

        doc_one.hide();
        $('#submitBtn').hide();

        $('#details_btn').on('click', function () {
            details.hide();
            doc_one.show();
            doc_two.hide();
        });

        $('#upload_doc').on('click', function () {
            details.hide();
            doc_one.hide();
            doc_two.show();
        });

    </script>
@endsection

@section('page_css')
    <link href="{{asset('appV1/dashb/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@endsection
