<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenWallet extends Model
{
    public const ACTIVE = 1;
    public const DEACTIVATED = 0;
    public function token()
    {
        return $this->hasOne(Token::class, 'token_id', 'token_id');
    }

}
