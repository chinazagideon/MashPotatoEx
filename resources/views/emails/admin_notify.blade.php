@component('mail::message')

####Admin Notification
#####Dear Admin,

#New Transaction Alert.

##Transaction ID: #{{$transaction->trans_id}}
##Account Related: {{$user->email}}
##Transaction Type: {{$subject}}
###Coin Type: {{$coinslug}}
###Coin Qty: {{$coin_qty}}{{$coinslug}}
@if($transaction->type == "send")
###Wallet Address: {{$transaction->address}}
@endif

@if($transaction->type === 'swap')
###Swap Qty: {{$coin_qty_2}}{{$coinslug_2}}
@endif

##Transaction Status: {{$status}}


@component('mail::button', ['url' => route('admin.manage_users')])
Verify Transaction
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
