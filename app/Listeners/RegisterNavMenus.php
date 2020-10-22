<?php

namespace App\Listeners;

class RegisterNavMenus
{
    /**
     * Register the menus.
     *
     * @return void
     */
    public function handle(): void
    {
        register_nav_menus(
            [
                'primary_menu'   => __('Primary Menu', 'genesis'),
                'secondary_menu' => __('Secondary Menu', 'genesis'),
            ]
        );
    }
}
