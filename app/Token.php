<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
        public const ACTIVE = 1;
    public const DEACTIVATED = 0;
//    protected $casts = ['price' => 'int'];

}
