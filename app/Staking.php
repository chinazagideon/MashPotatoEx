<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staking extends Model
{
    public $casts =['status' => 'integer'];

    public const ACTIVE = 1;
    public const DEACTIVATED = -1;
    public const PENDING = 0;
    public const MONTHLY = 7 * 4;
    public const YEARLY = 7 * 4 * 12;
    public const DURATION = 90;
    const UNSTAKE_FEE = 5;


}
