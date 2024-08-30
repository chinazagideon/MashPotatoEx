<?php

namespace App\Mail;

use App\Transactions;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransactionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $transaction;

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
        $user = User::find($this->transaction->user_id);
        return $this->subject('New Transaction Alert')->markdown('emails.transaction', [
            'user' => $user,
            'transaction' => $this->transaction,
            'trans_detail' => $this->translateEmail(
                $this->transaction->type,
                $this->transaction->coin->coin_name,
                $this->transaction->reference_id,
                $this->transaction->coin_qty,
                $this->transaction->reference_id_qty,
                $this->transaction->status

            )
        ]);
    }

    public function translateEmail($type, $coin_1 = null, $coin_2 = null, $qty_1 = null, $qty_2 = null, $status = null)
    {
        $coins = new \App\Http\Controllers\CoinsController();
        $coin_2_name = $coins->getCoin('', $coin_2);
        if (strtolower($type) === "swap") {
            return "<h4>Coin Swap</h4><br/>" . $qty_1 . ' ' . ucfirst($coin_1) . " swap for " . $qty_2 . ' ' . $coin_2_name->coin_slug . ' completed!';
        } elseif (strtolower($type) === 'borrow') {
            return ucfirst($coin_1) . ' Loan Request submitted';
        } elseif (strtolower($type) == "transfer") {
            return ucfirst($coin_1) . ' received via tradebot';
        } elseif (strtolower($type) == "fee") {
            return "<h4>Fee debited</h4><br/>" . $qty_1 . ' ' . ucfirst($coin_1) . " paid in fees ";

        } elseif (strtolower($type) == "stake") {
            return ucfirst($coin_1) . ' Staking Completed,';
        } elseif (trim(($type)) === 'receive' || trim(($type)) == 'send' || trim(($type)) == 'withdraw' || trim($type) === 'deposit') {
            if ($type == 'receive' || $type === 'deposit') {
                if ($status == Transactions::ACTIVE) {
                    return $coin_1 . " Received.";
                }
                return $coin_1 . " pending deposit.";

            } else {
                if ($status === Transactions::ACTIVE)
                    return $coin_1 . ' withdrawal have been completed.';
                return $coin_1 . ' pending withdrawal.';
            }
        } else {
            return "Transaction submitted";
        }

    }

}
