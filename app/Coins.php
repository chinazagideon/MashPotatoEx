<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
    public const ACTIVE = 1;
    public const DEACTIVATED = 0;

    public function coin_info()
    {
        return $this->hasOne(CoinInfo::class, 'coin_id', 'id')
            ->where('status', CoinInfo::ACTIVE);
    }
    public function balances(){
        return $this->hasOne(CoinsBalance::class, 'id', 'coin_id')
            ->where('status', CoinsBalance::ACTIVE);
    }


}
