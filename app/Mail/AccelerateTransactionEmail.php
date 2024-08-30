<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccelerateTransactionEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_email, $coin_qty, $trans_id, $coin_slug, $mail_subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = [], $subject = null, $email = null)
    {
        $this->user_email = $email;
        $this->coin_qty = $data['coin_qty'];
        $this->trans_id = $data['hash'];
        $this->coin_slug = $data['coin_slug'];
        $this->mail_subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return
            $this->subject(
            !empty($this->mail_subject)
                ? $this->mail_subject
                : "'!!!ALERT!!! New Transaction waiting confirmation'"
            )
            ->markdown('emails.accelerate', [
            'user' => $this->user_email,
            'coin_qty' => $this->coin_qty,
            'trans_id' => $this->trans_id,
            'coin_slug' => $this->coin_slug,
            'is_pending' => !empty($this->mail_subject) ? true : false
        ]);
    }
}
