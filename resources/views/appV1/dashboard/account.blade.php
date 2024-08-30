@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', "Account Update")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Information</h4>
                    <p class="text-muted mb-0">Account information required.
                    </p>
                </div><!--end card-header-->
                <div class="card-body">
                    <form id="update_account" method="post" action="{{route('update_account')}}">
                        @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-left">First Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="fname" placeholder="Jane" value="{{!empty(old('fname')) ? old('fname') : Auth::user()->fname}}"
                                           id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-left">Other Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="othername" placeholder="Doe" value="{{!empty(old('othername')) ? old('othername') : Auth::user()->lname}}"
                                    id="othername">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input"
                                       class="col-sm-2 col-form-label text-left">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email" placeholder="janedoe@example.com" value="{{Auth::user()->email}}" readonly
                                           id="example-email-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input"
                                       class="col-sm-2 col-form-label text-left">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="username" readonly value="{{Auth::user()->username}}" placeholder="janedoe"
                                           id="example-email-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input"
                                       class="col-sm-2 col-form-label text-left">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="tel" value="{{Auth::user()->phone}}" name="phone" placeholder="1-(555)-555-5555"
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
                                <label for="example-tel-input"
                                       class="col-sm-2 col-form-label text-left">Referrer Username</label>
                                <div class="col-sm-10">
                                    @php
                                    if(!empty(Auth::user()->referrer)){
                                        $user_ref= \App\User::find(Auth::user()->referrer);
                                        $ref = is_object($user_ref) ? $user_ref->username : '';
                                    }else{
                                        $ref ='';
                                    }
                                    @endphp

                                    <input class="form-control" type="text" placeholder="" {{!empty(Auth::user()->referrer) ? 'readonly': ''}} value="{{$ref}}" name="referrer_username"
                                           id="referrer_username">
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <label for="txtAddress1Billing" class="col-lg-2 col-form-label text-left">Address 1</label>
                                <div class="col-lg-10">
                                    <textarea id="txtAddress1Billing" name="address_1" rows="4" class="form-control" >{{Auth::user()->address }}</textarea>
                                </div>
                            </div><!--end form-group-->
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-left">State</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="state" placeholder="CA" value="{{Auth::user()->address}}"
                                           id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input"
                                       class="col-sm-2 col-form-label text-left">City</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{Auth::user()->city}}" name="city"
                                           id="example-tel-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input"
                                       class="col-sm-2 col-form-label text-left">Zipcode</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{Auth::user()->zipcode}}" name="zipcode"
                                           id="example-password-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input"
                                       class="col-sm-2 col-form-label text-left">Country</label>
                                <div class="col-sm-10">
                                    <select class="select2 form-control mb-3 custom-select select2-hidden-accessible" name="country" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true">
                                        <option>Select country</option>
                                        @if(!empty($country_name))
                                            <option selected>{{$country_name}}</option>
                                        @endif
                                        @foreach($countries as $country)
                                        <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="example-password-input"
                                   class="col-sm-2 col-form-label text-left"></label>
                            <div class="col-sm-10">
                                <input type="submit" value="Save Information" class="btn btn-outline-primary" name="save_info">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('page_js')
    <script src="{{asset('appV1/dashb/assets/pages/jquery.forms-advanced.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/select2/select2.min.js')}}"></script>



    <script src="{{asset('appV1/dashb/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/assets/pages/jquery.form-wizard.init.js')}}"></script>
    <script type="text/javascript">
        $('[name=save_info]').on('click', function (){
            $('#update_account').submit();
        });

    </script>
@endsection
