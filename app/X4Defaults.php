<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class X4Defaults extends Model
{
    const X4_OK = 1;
    const X4_BAD = 0;

    const GENERAL_SYSTEM_CONFIG_SLUG = 'general_control';
    const SEND_MSG= 'send_msg';
    const ACTIVE_STATUS = "ACTIVE";
    const NOT_ACTIVE_STATUS = "NOT-ACTIVE";
}
