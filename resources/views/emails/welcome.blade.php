@component('mail::message')
<h1 style="margin-top: 0px;">Welcome to {{config('app.name')}}!</h1>
<div style="color: #636363; font-size: 14px;"><p>Hi {{$user->username}}, Thank you for signing up with {{config('app.name')}}, we are
            happy to welcome you into our family. We have a lot of cool features available on our website, you can
            checkout a quick outline of the most popular features below.</p>
</div>
<div style="border: 2px solid #000e4b; padding: 40px; margin: 40px 0px;">

<h4 style="margin-bottom: 20px; margin-top: 0px; font-size: 18px; display: inline-block; border-bottom: 1px dotted #111;">
            Get started </h4>

<table style="width: 100%;">
   <tr>
       <td style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                    <div style="font-weight: bold; color: #000e4b; font-size: 16px;">Borrow</div>
                    <div style="font-size: 14px; color: #B8B8B8;">Get instant Coin Loan with our platform</div>
       </td>
   </tr>
   <tr>
          <td style=" border-bottom: 1px solid rgba(0,0,0,0.05);">
                    <div style="font-weight: bold; color: #000e4b; font-size: 16px;">Lending</div>
                    <div style="font-size: 14px; color: #B8B8B8;">Create streams of income with our lending system.</div>
          </td>
   </tr>
   <tr>
        <td style="">
                    <div style="font-weight: bold; color: #000e4b; font-size: 16px;"> Staking</div>
                    <div style="font-size: 14px; color: #B8B8B8;">Diversify your investment and grow financially</div>
        </td>
   </tr>
</table>
<table style="width: 100%; border-top: 1px solid #eee">
            <tr>
                <td style="font-size: 14px;">Your email: <strong>{{$user->email}}</strong></td>
            </tr>
    <br/>
    <tr>
                <td style="text-align: right;">

                    <a href="{{route('login')}}" style="padding: 8px 20px; background-color: #000e4b; color: #fff; font-weight: bolder; font-size: 16px; display: inline-block; margin: 10px 0px; text-decoration: none;">Sign
                        In
                    </a>
                </td>
            </tr>
</table>
</div>
@endcomponent
