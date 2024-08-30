<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoinsBalance extends Model
{
    public const ACTIVE = 1;
    public const DEACTIVATED = 0;

    public function user(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function coin()
    {
        return $this->hasOne(Coins::class, "id", 'coin_id');
    }

    public function coin_info()
    {
        return $this->hasOne(CoinInfo::class, "coin_id", "coin_id");
    }

}
