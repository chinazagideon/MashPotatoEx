<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{

    public const APPROVED = 1;
    public const CANCEELED = -1;
    public const PENDING = 0;
    protected $casts = ['status' => 'integer'];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function token()
    {
        return $this->hasOne(Token::class, 'slug', 'coin_slug');
    }
}
