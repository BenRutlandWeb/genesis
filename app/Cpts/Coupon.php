<?php

namespace App\Cpts;

use Genesis\WordPress\Cpt;

class Coupon extends Cpt
{
    /**
     * The post type name (singular)
     *
     * @var string
     */
    protected $name = 'coupon';

    /**
     * Options for post type registration
     *
     * @var array
     */
    protected $options = [
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-tickets-alt',
        'supports'     => ['title', 'editor', 'author', 'thumbnail'],
    ];
}
