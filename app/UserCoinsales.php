<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCoinsales extends Model
{
    public const ACTIVE = 1;
    public const DEACTIVATION = -1;
    public const PENDING = 0;
    protected $casts = ['status' => 'integer'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function coinsaledata()
    {
        return $this->hasOne(Coinsale::class, 'id', 'coinsale_id');
    }

}
