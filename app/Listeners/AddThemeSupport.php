<?php

namespace App\Listeners;

class AddThemeSupport
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        add_theme_support('html5', [
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'style',
            'script',
        ]);

        add_theme_support('disable-custom-font-sizes');

        add_theme_support(
            'editor-font-sizes',
            [
                [
                    'name' => __('Small', '@textdomain'),
                    'slug' => 'small',
                    'size' => 16
                ],
                [
                    'name' => __('Medium', '@textdomain'),
                    'slug' => 'medium',
                    'size' => 20
                ],
                [
                    'name' => __('Large', '@textdomain'),
                    'slug' => 'large',
                    'size' => 24
                ]
            ]
        );

        add_theme_support('disable-custom-colors');

        add_theme_support(
            'editor-color-palette',
            [
                [
                    'name'  => __('Primary', '@textdomain'),
                    'slug'  => 'primary',
                    'color' => 'var(--primary)',
                ],
                [
                    'name'  => __('Secondary', '@textdomain'),
                    'slug'  => 'secondary',
                    'color' => 'var(--secondary)',
                ],
            ]
        );

        add_theme_support('disable-custom-gradients');

        add_theme_support('editor-styles');

        add_theme_support('dark-editor-style');

        add_theme_support('align-wide');
    }
}
