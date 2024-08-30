@extends('appV1.layouts.front')
@section('page_title', 'Verify Email')
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
                                    <h2>{{ __('Verify Your Email Address') }}</h2>
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
                                  @if (session('resent'))
                        <div class="alert alert-success" style="color: #00ff80 !important;" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                                <div class="contact-form contact-form-inputs-underlined contact-form-button-circle">
                                    <div class="contact-form-result hidden"></div>
                                    <br/>
                                    <br/>
                                     {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}"  class="font-size-13 ltr-sp-1 font-weight-bold">{{ __('click here to request another') }}</a>.
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
