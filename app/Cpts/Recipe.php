<?php

namespace App\Cpts;

use Genesis\WordPress\Cpt;

class Recipe extends Cpt
{
    /**
     * The post type name (singular)
     *
     * @var string
     */
    protected $name = 'recipe';

    /**
     * Options for post type registration
     *
     * @var array
     */
    protected $options = [
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-food',
        'supports'     => ['title', 'editor', 'author', 'thumbnail'],
    ];
}
