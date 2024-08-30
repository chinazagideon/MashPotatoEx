@component('mail::message')
<h2 style="margin-top: 0px;">Transaction Notification Alert!</h2>
<div style="color: #636363; font-size: 14px;">Dear {{$user->username}}, a transaction have been performed in your account, find the details of the transaction below. <br/>
If you don't recognize the transaction, contact our support.

        </div>
<table style="margin-top: 30px; width: 100%;">
            <tr>
                <td style="padding-right: 30px;">
                    <div style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; font-weight: bold; color: #B8B8B8; margin-bottom: 5px;">
                        Trans ID: #{{$transaction->trans_id}}
                    </div>
                    <div style="font-size: 12px; color: #111; font-weight: bold; margin-bottom: 20px;">{{date('M jS, Y', strtotime($transaction->created_at))}}
                    </div>

                </td>
                <td style="max-width: 150px;">

                </td>
            </tr>
        </table>
<table style="margin-top: 40px; width: 100%;">
            <tr>
                <td style="text-transform: uppercase; letter-spacing: 1px; color: #B8B8B8; font-size: 10px; font-weight: bold;">
                    Transaction Type
                </td>

            </tr>
            <tr>
                <td style="padding: 15px 0px;border-bottom: 1px solid rgba(0,0,0,0.05);">
                    <div style="color: #111; font-size: 14px; font-weight: bold;">{!! $trans_detail !!} </div>
                    <div style="color: #B8B8B8; font-size: 12px;"></div>
                </td>

            </tr>

        </table>

<div style="color: #636363; font-size: 14px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05); margin-bottom: 50px;">
           {{$transaction->status == \App\Transactions::ACTIVE ? 'Transaction successful' : 'Transaction have been submitted'}}
        </div>

@endcomponent
