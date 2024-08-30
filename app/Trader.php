<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    const INVITE_PERCENTAGE = 0.043;
    const TRADE_RETURN_COIN = "USDT";
    const WITHDRAWAL_FEE = 5;
    const ACTIVE = 1;
    const DEACTIVATED = 0;
    const MAX_ALLOWED_LOSS_PER_TRADE = 1;
    const MAX_ALLOWED_GAINS_PER_TRADE = 200;
    const BOT_IDENTIFIER = "returns";
    protected $casts = ['status' => 'int'];

    public function user()
    {
        return $this->hasOne(User::class, "id", 'user_id');
    }
}
