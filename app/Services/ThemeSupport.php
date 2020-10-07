<?php

namespace App\Services;

class ThemeSupport
{
    /**
     * Add actions and filters.
     */
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'addThemeSupport']);
    }

    /**
     * Add the theme support.
     *
     * @return void
     */
    public function addThemeSupport(): void
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
                    'name' => __('Small', 'genesis'),
                    'slug' => 'small',
                    'size' => 16
                ],
                [
                    'name' => __('Medium', 'genesis'),
                    'slug' => 'medium',
                    'size' => 20
                ],
                [
                    'name' => __('Large', 'genesis'),
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
                    'name'  => __('Primary', 'genesis'),
                    'slug'  => 'primary',
                    'color' => 'var(--primary)',
                ],
                [
                    'name'  => __('Secondary', 'genesis'),
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
