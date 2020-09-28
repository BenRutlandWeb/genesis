<?php

namespace App\Services;

class ReusableBlockMenu
{
    /**
     * The user capability.
     *
     * @var string
     */
    public $capability = 'edit_posts';

    /**
     * The dashicon used in the menu.
     *
     * @var string
     */
    public $icon = 'dashicons-controls-repeat';

    /**
     * Add the admin menu action.
     *
     * @return void
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addMenuPage']);
    }

    /**
     * Return the translatable page title.
     *
     * @return string
     */
    public function pageTitle(): string
    {
        return __('Blocks', 'genesis');
    }

    /**
     * Return the translatable menu title.
     *
     * @return string
     */
    public function menuTitle(): string
    {
        return __('Reusable Blocks', 'genesis');
    }

    /**
     * Add the reuseable blocks page to the menu.
     *
     * @return void
     */
    public function addMenuPage(): void
    {
        add_menu_page(
            $this->pageTitle(),
            $this->menuTitle(),
            $this->capability,
            'edit.php?post_type=wp_block',
            '',
            $this->icon,
            22
        );
    }
}
