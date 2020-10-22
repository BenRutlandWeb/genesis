<?php

namespace App\Listeners;

class AddMenuPages
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        add_menu_page(
            __('Blocks', 'genesis'),
            __('Reusable Blocks', 'genesis'),
            'edit_posts',
            'edit.php?post_type=wp_block',
            '',
            'dashicons-controls-repeat',
            22
        );
    }
}
