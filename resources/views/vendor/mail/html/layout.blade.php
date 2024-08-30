<!DOCTYPE html>
<html>
<body style="background-color: #222533; padding: 20px; font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
<div style="max-width: 600px; margin: 10px auto 20px; font-size: 12px; color: #A5A5A5; text-align: center;">If you are
    unable to see this message, <a href="#" style="color: #A5A5A5; text-decoration: underline;">click here to view in
        browser</a>
</div>
<div style="max-width: 600px; margin: 0px auto; background-color: #fff !important; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
    <table style="width: 100%;">
        <tr>
            <td style="background-color: #fff;"><img alt="" src="{{asset('appV1/assets/img/misc/logo-ave-2.png')}}" style="width: 50%; padding: 20px"></td>
            <td style="text-align: right; padding-right: 10px">
                <a href="{{route('login')}}" style="color: #261D1D; text-decoration: underline; font-size: 14px; letter-spacing: 1px;">Sign
                    In</a>
            </td>
        </tr>
    </table>
    <div style="padding: 40px 20px; border-top: 1px solid rgba(0,0,0,0.05);">

        {{ Illuminate\Mail\Markdown::parse($slot) }}

        {{ $subcopy ?? '' }}

        <h4 style="margin-bottom: 10px;">Need Help?</h4>
        <div style="color: #A5A5A5; font-size: 12px;">
            <p>If you have any questions you can simply reply to this email or
                find our contact information below. Also contact us at
                <a href="mailto:{{config('app.email')}}" style="text-decoration: none; color: #1c247d;">{{config('app.email')}}</a>
            </p>
        </div>
    </div>
    <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">


        <div style="margin-bottom: 20px;">
            <a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">Contact Us</a>
            <a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">Privacy Policy</a>
            <a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261D1D;">Unsubscribe</a>
        </div>
        <div style="color: #A5A5A5; font-size: 12px; margin-bottom: 20px; padding: 0px 50px;">You are receiving this
            email because you signed up on {{config('app.url')}}. We use {{config('app.name')}} to send our emails
        </div>
        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
            <div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">{{config('app.address')}}
            </div>
            <div style="color: #A5A5A5; font-size: 10px;"> {{ $footer ?? '' }}

            </div>
        </div>
    </div>
</div>
</body>
</html>
