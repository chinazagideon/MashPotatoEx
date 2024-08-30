<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mining extends Model
{
    public const ACTIVE = 1;
    public const DEACTIVATED = -1;
    
    protected $casts = ['status' => 'integer'];
}
