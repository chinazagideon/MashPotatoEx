<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    public const FIRST_STAGE = 0;
    public const SECOND_STAGE = 1;

    public const UPLOADED_FILE_PENDING = 0;
    public const VERIFIED_DOC_APPROVED = 1;


    protected $casts = ['status' => 'integer'];
}
