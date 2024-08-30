@extends('appV1.layouts.front')
@section('page_title', "Two Factor Authentication")
@section("content")
    <div class="titlebar-inner pt-50 pb-210 bg-dark">
        <div class="container titlebar-container">
            <div class="row titlebar-container">
                <div class="titlebar-col col-md-12">
                </div>
            </div>
        </div>
    </div>
    <main id="content" class="content bg-gray">
        <section class="vc_row">
            <div class="container">
                <div class="row">
                    <div class="lqd-column col-md-12 px-4 pt-45 pb-30 bg-white box-shadow-1 pull-up">
                        <div class="row d-flex flex-wrap align-items-center">
                            <div class="lqd-column col-md-10 col-md-offset-1">
                                <header class="fancy-title">
                                    <h2>@yield('page_title')</h2>
                                    <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>
                                </header>
                            </div>

                        </div>
                        <div class="row">
                            <div class="lqd-column col-md-6 col-md-offset-3">
                                <div class="contact-form contact-form-inputs-underlined contact-form-button-circle">
                                    <div class="contact-form-result hidden"></div>
                                    <br/>
                                    <br/>

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            <h4 style="color: #28a722 !important;">{{ session('status') }}</h4>
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            <h4 style="color: #f60003 !important;">{{ session('error') }}</h4>
                                        </div>
                                    @endif

                                    <form action="{{ route('2faVerify') }}" method="post">
                                        @csrf
                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-12 mb-20 {{ $errors->has('one_time_password-code') ? ' has-error' : '' }}">

                                                <label for="one_time_password" class=" control-label">One Time Password</label>
                                                <input class="lh-25 mb-30" type="text" name="one_time_password"
                                                       aria-required="true" aria-invalid="false"
                                                       placeholder="OTP Code" required autofocus>
                                                @error('one_time_password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror

                                            </div>

                                            <div class="lqd-column col-md-12 text-md-right">

                                                <input type="submit" value="Authenticate"
                                                       class="font-size-13 ltr-sp-1 font-weight-bold">

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
