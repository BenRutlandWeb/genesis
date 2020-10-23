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
            __('Blocks', '@textdomain'),
            __('Reusable Blocks', '@textdomain'),
            'edit_posts',
            'edit.php?post_type=wp_block',
            '',
            'dashicons-controls-repeat',
            22
        );
    }
}
