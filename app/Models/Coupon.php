<?php

namespace App\Models;

use Genesis\Database\Models\PostType;

class Coupon extends PostType
{
    /**
     * The post type for the model.
     *
     * @var array|string
     */
    public $postType = 'coupon';

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [
        'ID',
        'post_name',
        'post_title',
        'post_content',
        'post_status',
        'post_date',
        'post_modified',
        'post_type',
    ];
}
