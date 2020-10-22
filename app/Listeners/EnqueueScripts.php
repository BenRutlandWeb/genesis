<?php

namespace App\Listeners;

use Genesis\Events\Dispatcher;

class EnqueueScripts
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param \Genesis\Events\Dispatcher $events
     *
     * @return void
     */
    public function subscribe(Dispatcher $events): void
    {
        $events->listen('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
        $events->listen('wp_enqueue_scripts', [$this, 'enqueueAppAssets']);
        $events->listen('login_enqueue_scripts', [$this, 'enqueueAppAssets']);
        $events->listen('admin_init', [$this, 'enqueueEditorAssets']);
    }

    /**
     * Enqueue app assets
     *
     * @return void
     */
    public function enqueueAppAssets(): void
    {
        // css
        wp_enqueue_style('genesis-app', mix('css/app.css'), [], null);

        // js
        wp_enqueue_script('genesis-app', mix('js/app.js'), [], null, true);

        // ajax object
        $this->inlineAjaxObject('genesis-app');
    }

    /**
     * Enqueue admin assets
     *
     * @param string $hookSuffix The current admin page
     *
     * @return void
     */
    public function enqueueAdminAssets(string $hookSuffix): void
    {
        // css
        wp_enqueue_style('genesis-admin', mix('css/admin.css'), [], null);

        // js
        wp_enqueue_script('genesis-admin', mix('js/admin.js'), [], null, true);

        // ajax object
        $this->inlineAjaxObject('genesis-admin');
    }

    /**
     * Enqueue editor assets
     *
     * @return void
     */
    public function enqueueEditorAssets(): void
    {
        add_theme_support('editor-styles');

        add_editor_style(asset('css/editor.css', false));
    }

    /**
     * Inline the ajax object to guarantee availablity anwhere in the JS.
     *
     * @return void
     */
    public function inlineAjaxObject(string $dependency): void
    {
        $object = [
            'url'       => ajax(),
            'csrfToken' => csrf_token(),
        ];
        wp_add_inline_script($dependency, 'const AJAX = ' . json_encode($object), null);
    }
}
