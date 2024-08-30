@extends('appV1.layouts.front')
@section('page_title', 'Reset Password')
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
                            <div class="lqd-column col-md-6 col-md-offset-1">
                                <header class="fancy-title">
                                    <h2>@yield('page_title')</h2>
                                    <p>We'll send you a password reset link if the email exist in our database</p>
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
                                    <form action="{{ route('password.email') }}" method="post">
                                        @csrf
                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-12 mb-20">

                                                <input class="lh-25 mb-30" type="email" name="email"
                                                       aria-required="true" aria-invalid="false"
                                                       placeholder="Your email address" required autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror

                                            </div>

                                            <div class="lqd-column col-md-12 text-md-right">
                                                    <a class="" href="{{ route('login') }}">
                                                        {{ __('Login') }}
                                                    </a>
                                                <input type="submit" value="Send Password Reset link"
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
