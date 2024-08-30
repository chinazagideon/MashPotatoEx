@component('mail::message')
# Deposit Transaction Alert
@if($is_pending)
##User about to send payment
@else
###Pending transaction details
@endif
##User Email: {{$user}}
##Coin Type: {{$coin_slug}}
##Coin Qty: {{$coin_qty}}{{$coin_slug}}
@if($is_pending)
##Receiver Wallet Address: {{$trans_id}}
@else
##Transaction ID: {{$trans_id}}
@endif

@component('mail::button', ['url' => route('admin.manage_users')])
Update Transaction
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
