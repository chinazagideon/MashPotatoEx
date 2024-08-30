<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    public const ACTIVE = 1;
    public const DEACTIVATED = -1;
}
