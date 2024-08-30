<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    const COMPLETED = 1;
    const CANCELLED = -1;
    const PENDING_CONFIRMATION = 2;
    const PRECISION = 4;
    const PENDING = 0;

    public function payer(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
