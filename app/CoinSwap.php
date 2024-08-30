<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoinSwap extends Model
{
    public const APPROVED = 1;
    public const PENDING = 0;
    public const CANCELLED = -1;

}
