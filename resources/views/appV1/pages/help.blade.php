@extends('appV1.layouts.front')
@section('page_title', 'Help')
@section('content')
    <style>
        h4 {
            color: #0a0a0a !important;
        }

        div .accordion .accordion-title h4 {
            color: #0a0a0a !important;
        }
    </style>
    <section class="vc_row py-5 d-flex flex-wrap align-items-center bg-cover"
             style="background-image:  linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);"></section>
    <section class="vc_row pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-md-12 mb-4">
                    <header class="fancy-heading text-center">
                        <h2>Help and Support</h2>
                    </header>
                </div>
                <div class="lqd-column col-md-8 col-md-offset-2">
                    <div
                        class="accordion accordion-lg accordion-active-has-shadow accordion-title-bordered accordion-title-round accordion-expander-left"
                        id="accordion-11" role="tablist">
                        <div class="accordion-item panel">
                            <div class="accordion-heading" role="tab" id="accordion-11-heading-1">
                                <h4 class="accordion-title font-size-22">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-11"
                                       href="#accordion-11-panel-1" aria-expanded="false"
                                       aria-controls="accordion-11-panel-1">
                                        Multi-Factor Authentication FAQ
                                        <span class="accordion-expander">
<i class="fa fa-plus"></i>
<i class="fa fa-minus"></i>
</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="accordion-11-panel-1" class="accordion-collapse collapse" role="tabpanel"
                                 aria-labelledby="accordion-11-heading-1" aria-expanded="false" style="height: 0px;">
                                <div class="accordion-content">
                                    <article class="article-body" id="article-body" rel="image-enlarge">
                                        <p class="fd-toc" style="text-align: justify;"><strong dir="ltr">TABLE OF CONTENTS</strong></p><ul><li style="text-align: justify;"><a href="#What-is-2FA?">What is 2FA?</a></li><li style="text-align: justify;"><a href="#How-do-I-set-up-2FA?">How do I set up 2FA?</a></li><li style="text-align: justify;"><a dir="ltr" href="#Enable-Two-Factor-Authentication">Enable Two-Factor Authentication</a></li></ul><p style="text-align: justify;"><br></p><hr style="text-align: justify;"><h3 dir="ltr" id="What-is-2FA?" style="text-align: justify;"><strong dir="ltr">What is 2FA?</strong></h3><p dir="ltr" style="text-align: justify;">{{config('app.name')}} use two-factor authentication (2FA) for every account and most transactions, and we partner with top custodians like BitGo and Gemini Custody so your funds are safe. Funds held in cold storage are insured by our custodian partners' insurance policies. Best of all, crypto storage is free. We don’t charge any custody or wallet fees when using {{config('app.name')}} or the {{config('app.name')}} app.</p><p style="text-align: justify;"><br></p><h3 dir="ltr" id="How-do-I-set-up-2FA?" style="text-align: justify;"><strong dir="ltr">How do I set up 2FA?</strong></h3><p dir="ltr" style="text-align: justify;">In order to use the {{config('app.name')}} mobile app, you must set up device-based 2FA. {{config('app.name')}} does not support SMS or phone-based 2FA.</p><p style="text-align: justify;"><br></p><h3 id="Enable-Two-Factor-Authentication" style="text-align: justify;"><strong dir="ltr">Enable Two-Factor Authentication</strong></h3><p style="text-align: justify;">Use multi-factor authentication to secure your account. Once enabled, you'll be required to enter a code created by an app on your phone like Google Authenticator, Duo Mobile, or Microsoft Authenticator to log in to your {{config('app.name')}} account.</p><p style="text-align: justify;"><br></p><h3 dir="ltr" id="STEP-1" style="text-align: justify; margin-left: 20px;"><strong>STEP 1</strong></h3><p dir="ltr" style="text-align: justify; margin-left: 20px;">Get an authentication app for your phone or tablet by downloading and installing:</p><ul style="margin-left: 20px;"><li dir="ltr" style="text-align: justify;"><a dir="ltr" href="https://support.google.com/accounts/answer/1066447">Google Authenticator</a> (Android · iOS),</li><li dir="ltr" style="text-align: justify;"><a dir="ltr" href="https://duo.com/product/multi-factor-authentication-mfa/duo-mobile-app">Duo Mobile</a> (Android · iOS), or</li><li dir="ltr" style="text-align: justify;"><a dir="ltr" href="https://www.microsoft.com/en-us/account/authenticator">Microsoft Authenticator</a> (Android · iOS)</li></ul><h3 dir="ltr" id="" style="text-align: justify;"><br></h3><h3 dir="ltr" id="STEP-2" style="text-align: justify; margin-left: 20px;"><strong>STEP 2</strong></h3><p dir="ltr" style="text-align: justify; margin-left: 20px;">Open the authentication app, tap the "+" icon in the top right of the app, and scan the QR code image with your phone or tablet's camera.</p><p style="text-align: justify; margin-left: 20px;"><br></p><p dir="ltr" style="text-align: justify; margin-left: 20px;">Make sure to save the backup codes in a safe place. In the event you lose access to your 2FA device these can be used to gain access to your account. {{config('app.name')}} does not store these codes and they are unique to each account owner.</p><p style="text-align: justify; margin-left: 20px;"><br></p><h3 dir="ltr" id="STEP-3" style="text-align: justify; margin-left: 20px;"><strong>STEP 3</strong></h3><p dir="ltr" style="text-align: justify; margin-left: 20px;">Enter code generated by your app when prompted</p><p style="text-align: justify; margin-left: 20px;"><br></p><p dir="ltr" style="text-align: justify; margin-left: 20px;">Once the QR code is scanned, enter the 6-digit code generated by your authentication app in your {{config('app.name')}} account.</p><p style="text-align: justify; margin-left: 20px;"><br></p><p style="text-align: justify; margin-left: 20px;">You are done!</p><p style="text-align: justify;"><br></p><h3 dir="ltr" style="text-align: justify;"><strong>What happens if I no longer have access to my device or the backup codes?</strong></h3><p dir="ltr">If you no longer have access to the device you used when you created your account, then the first step is to use the backup codes you received when you created your account.</p><p dir="ltr"><br></p><p dir="ltr">If you no longer have the backup codes, then you will need to send us an email through our <a href="mailto:{{config('app.email')}}">customer support</a>.&nbsp;</p><p style="text-align: justify;"><br></p><div><p style="text-align: justify;"><br></p></div><p style="text-align: justify;"><br></p><p style="text-align: justify;"><br></p><p style="text-align: justify;"><br></p><p><br></p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item panel">
                            <div class="accordion-heading" role="tab" id="accordion-11-heading-2">
                                <h4 class="accordion-title font-size-22">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-11"
                                       href="#accordion-11-collapse-2" aria-expanded="false"
                                       aria-controls="accordion-11-collapse-2">
                                        How does coin staking works?
                                        <span class="accordion-expander">
<i class="fa fa-plus"></i>
<i class="fa fa-minus"></i>
</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="accordion-11-collapse-2" class="accordion-collapse collapse" role="tabpanel"
                                 aria-labelledby="accordion-11-heading-2" aria-expanded="false">
                                <div class="accordion-content">
                                    <p>
                                        Staking is locking your coin for a period of time to earn a certain interest at the end of the year,
                                        you can un-stake at any point you want and take profit.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item panel">
                            <div class="accordion-heading" role="tab" id="accordion-11-heading-3">
                                <h4 class="accordion-title font-size-22">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-11"
                                       href="#accordion-11-collapse-3" aria-expanded="false"
                                       aria-controls="accordion-11-collapse-3">
                                        How do I swap my Cryptocurrency?
                                        <span class="accordion-expander">
<i class="fa fa-plus"></i>
<i class="fa fa-minus"></i>
</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="accordion-11-collapse-3" class="accordion-collapse collapse" role="tabpanel"
                                 aria-labelledby="accordion-11-heading-3" aria-expanded="false">
                                <div class="accordion-content">
                                    <p>After signup/login, click on swap, select the coin you want to swap for the one you need,
                                        enter the amount of coin you want to swap and click on swap coin button.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
