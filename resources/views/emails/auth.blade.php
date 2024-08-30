@component('mail::message')
<h2 style="margin-top: 0px;">Pending Transaction ***DO NOT SHARE OTP**</h2>
<div style="color: #636363; font-size: 14px;">Dear {{$name}},<br/> A transaction have been initiated in your account, to complete transaction use the code below.

        </div>
<table style="margin-top: 30px; width: 100%; text-align: center">
            <tr>
                <td style="padding-right: 30px; text-align: center">
                    <div style="text-transform: uppercase; font-size: 18px; letter-spacing: 1px; font-weight: bold; color: #B8B8B8; margin-bottom: 5px; text-align: center">
                        <h2>{{$code}}</h2>
                    </div>

                </td>
                <td style="max-width: 150px;">

                </td>
            </tr>
        </table>


<div style="color: #636363; font-size: 14px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05); margin-bottom: 50px;">
    If you don't recognize the transaction, contact our support.
        </div>

@endcomponent
