<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public const PENDING = 0;
    public const ACTIVE = 1;
    public const CANCELLED = 2;
    public const PAYBACK_COMPLETED = -1;

    public const RATE = 0.5;

    protected $casts = ['status' => 'integer'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
