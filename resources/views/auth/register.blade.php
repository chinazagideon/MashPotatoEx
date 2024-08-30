@extends('appV1.layouts.front')
@section('page_title', 'Create Account')
@section('content')
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
                            <div class="lqd-column col-md-6 col-md-offset-2">
                                <header class="fancy-title">
                                    <h2>@yield('page_title')</h2>
                                    <p>Fill the form to get started</p>
                                </header>
                            </div>
                            <div class="lqd-column col-md-4 hidden-sm hidden-xs text-right">
                                <div class="iconbox text-right iconbox-xl" data-animate-icon="true"
                                     data-plugin-options='{"resetOnHover":true,"color":"rgb(216, 219, 226)","hoverColor":"rgb(0, 0, 0)"}'>
                                    <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container">
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"> <polygon
        stroke-width="2" stroke-linejoin="bevel" stroke-miterlimit="10" points="1,30 63,1 23,41"/> <polygon
        stroke-width="2" stroke-linejoin="bevel" stroke-miterlimit="10" points="34,63 63,1 23,41"/> </svg>
</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="lqd-column col-md-7 col-md-offset-3">
                                <div class="contact-form contact-form-inputs-underlined contact-form-button-circle">
                                    <div class="contact-form-result hidden"></div>
                                    <br/>
                                    <br/>
                                    <form action="{{route('register')}}" method="post">
                                        @csrf
                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-12 mb-20">

                                                <div class="lqd-column col-md-12 mb-20">

                                                    <input class="lh-25 mb-30" type="text" value="{{old('fname')}}" name="fname"
                                                           aria-required="true" aria-invalid="false"
                                                           placeholder="Your First Name" required autofocus>
                                                    @error('fname')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror

                                                    <input class="lh-25 mb-30" type="text" value="{{old('username')}}" name="username"
                                                           aria-required="true" aria-invalid="false"
                                                           placeholder="Create Username" required >
                                                    @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <input class="lh-25 mb-30" type="tel" name="phone" value="{{old('phone')}}"
                                                           aria-required="true" aria-invalid="false"
                                                           placeholder="Enter Mobile Number" required >
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror


                                                    <input class="lh-25 mb-30" type="email" name="email" value="{{old('email')}}"
                                                       aria-required="true" aria-invalid="false"
                                                       placeholder="Your email address" required>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror


                                                <input class="lh-25 mb-30" type="password" name="password"
                                                       aria-required="true"
                                                       aria-invalid="false" placeholder="Create password" required>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror

                                                    <input class="lh-25 mb-30" type="password" name="password_confirmation"
                                                           aria-required="true"
                                                           aria-invalid="false" placeholder="Confirm password" required>
                                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror

                                                    <input class="lh-25 mb-30" type="text" name="referrer" {{!empty($referrer) ? 'readonly' : ''}}
                                                           aria-required="true" value="{{!empty($referrer) ? $referrer : old('referrer')}}"
                                                           aria-invalid="false" placeholder="Referrer Username"/>
                                                    @error('referrer')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                            </div>

                                                <div class="lqd-column col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name='terms' required>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            I agree with the <a href="{{asset('appV1/assets/documents/PennHaven_Terms_and_Conditions.pdf')}}" target="_blank">Terms and Conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            <div class="lqd-column col-md-12 {{ $errors->has('CaptchaCode') ? ' has-error' : '' }}" >
                                                @captcha
                                                <input type="text" id="captcha" name="captcha" autocomplete="off">
                                                @error('captcha')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                            </div>

                                            <div class="lqd-column col-md-12 text-md-right mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="" href="{{ route('login') }}">
                                                        {{ __('Already Registered? Login') }}
                                                    </a>
                                                @endif

                                                <input type="submit" value="Create Account"
                                                       class="font-size-13 ltr-sp-1 font-weight-bold">

                                            </div>
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
@section('page_js')

    <script src="https://www.google.com/recaptcha/api.js"></script>
    @endsection
