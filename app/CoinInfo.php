<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoinInfo extends Model
{
    public const ACTIVE =1;
    public const DEACTIVATED = 0;
    protected $casts = [];

    public function coin()
    {
        return $this->hasOne(Coins::class, 'id', 'coin_id');
    }

}
