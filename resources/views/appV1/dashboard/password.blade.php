@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', "Change Password")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('page_title')</h4>
                    <p class="text-muted mb-0">
                    </p>
                </div><!--end card-header-->
                <div class="card-body">
                    <form id="update_account" method="post" action="{{route('change_password')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">Current Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="current_password" placeholder="" value=""
                                               id="example-text-input">
                                        @error('current_password')
                                            <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">New Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="password" placeholder="" value=""
                                               id="example-text-input">

                                        @error('password')
                                            <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-left">Confirm Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="password_confirmation" placeholder="" value=""
                                               id="example-text-input">
                                        @error('password_confirmation')
                                        <span class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <button type="submit" id="" name="change_password"
                                        class="btn btn-block btn-sm btn-outline-primary px-3 mt-2">
                                    Change Password
                                </button>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
