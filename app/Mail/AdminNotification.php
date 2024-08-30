<?php

namespace App\Mail;

use App\Http\Controllers\CoinsController;
use App\Http\Controllers\TokenController;
use App\Transactions;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Transactions $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = formatNotifyCaption($this->transaction->type);
        $user = User::find($this->transaction->user_id);
        $token = new TokenController();
        $coin = new CoinsController();


        if ($this->transaction->comment === 'token_stake') {
            $token_detail = $token->getTokenCoinInfo(null, $this->transaction->coin_id);
        } else {
            $coin_detail = $coin->getCoin(null, $this->transaction->coin_id);
        }
        $reference =  $coin->getCoin(null, $this->transaction->reference_id);
        if((int) $this->transaction->status === Transactions::ACTIVE)
        {
            $status = 'Completed';
        }elseif((int) $this->transaction->status === Transactions::PENDING)
        {
            $status = 'Pending';
        }else{
            $status = "Expired";
        }

        return $this->subject($subject)->markdown('emails.admin_notify',
            [
                'transaction' => $this->transaction,
                'user' => $user,
                'subject' => $subject,
                'coinslug' =>  $this->transaction->comment === 'token_stake' ? $token_detail->slug : $coin_detail->coin_slug,
                'coin_qty' => $this->transaction->coin_qty,
                'coin_qty_2' => $this->transaction->reference_id_qty,
                'coinslug_2' => is_object($reference) ? $reference->coin_slug : 'null',
                'status' => $status
            ]
        );
    }
}
