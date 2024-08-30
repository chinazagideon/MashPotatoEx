<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    public const PUBLISHED = 1;
    public const UNPUBLISH = -1;
    public const PENDING = 0;

    protected $fillable = [
        'caption',
        'slug',
        'post_id',
        'image_1_url',
        'image_2_url',
        'image_3_url',
        'image_4_url',
        'pubDate',
        'has_video',
        'tickers',
        'category',
        'post_type',
        'tags',
        'description',
        'status',
        'uploaded_by',
        'video_url',
        'summary',
        'post_url',
        'provider',
    ];
}
