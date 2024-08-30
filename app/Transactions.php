<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    public const ACTIVE = 1;
    public const PENDING = 0;
    public const CANCELLED = -1;
    public $casts = ['status' => 'integer'];


    public function coin()
    {
        return $this->hasOne(Coins::class, 'id', 'coin_id');
    }
    public function reference_coin()
    {
        return $this->hasOne(Coins::class, 'id', 'reference_id');

    }
    public function returns()
    {
        return $this->hasMany(Returns::class, 'transaction_id', 'trans_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function payment(){
        return $this->hasOne(Payments::class, 'order_number', 'trans_id');
    }

}
