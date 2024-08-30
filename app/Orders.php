<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public const FULFILLED = 1;
    public const PENDING = 0;

    public function products(){
        return $this->hasOne(Mining::class, 'product_id', 'product_id');
    }

    public function user()
    {
        return $this->hasOne(OrderProducts::class, 'order_id', 'order_id');
    }

}
