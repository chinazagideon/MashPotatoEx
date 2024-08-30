<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallets extends Model
{
    public const ACTIVE = 1;
    public const DEACTIVATED = -1;
    protected $casts = ['status' => 'integer', "is_manual_payment" => 'integer'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function token_wallet()
    {
        return $this->hasOne(TokenWallet::class, 'token_id', 'coin_slug');
    }
    public function coin(){
        return $this->hasOne(Coins::class, 'id', 'coin_id');
    }
}
