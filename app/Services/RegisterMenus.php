<?php

namespace App\Services;

class RegisterMenus
{
    /**
     * Add actions and filters.
     */
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'register']);
    }

    /**
     * An array of menus to register.
     *
     * @return array
     */
    public function menus(): array
    {
        return [
            'primary_menu'   => __('Primary Menu', 'genesis'),
            'secondary_menu' => __('Secondary Menu', 'genesis'),
        ];
    }

    /**
     * Register the menus.
     *
     * @return void
     */
    public function register(): void
    {
        register_nav_menus($this->menus());
    }
}
