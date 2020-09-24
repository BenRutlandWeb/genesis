<?php

namespace App\Services;

class Assets
{
    /**
     * Add actions to load the theme assets
     *
     * @return void
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [static::class, 'enqueueAppAssets']);
        add_action('admin_enqueue_scripts', [static::class, 'enqueueAdminAssets']);
        add_action('admin_init', [static::class, 'enqueueEditorAssets']);
        add_action('login_enqueue_scripts', [static::class, 'enqueueLoginAssets']);
        add_filter('script_loader_tag', [static::class, 'addScriptModuleAttribute'], 10, 3);
    }

    /**
     * Enqueue app assets
     *
     * @return void
     */
    public function enqueueAppAssets(): void
    {
        // css
        wp_enqueue_style('genesis-app', asset('css/app.css'), [], null);

        // js
        wp_enqueue_script('genesis-app', asset('js/app.js'), [], null, true);
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
        wp_enqueue_style('genesis-admin', asset('css/admin.css'), [], null);

        // js
        wp_enqueue_script('genesis-admin', asset('js/admin.js'), [], null, true);
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
     * Enqueue editor assets
     *
     * @return void
     */
    public function enqueueLoginAssets(): void
    {
        // css
        wp_enqueue_style('genesis-login', asset('css/login.css'), [], null);

        // js
        wp_enqueue_script('genesis-login', asset('js/login.js'), [], null, true);
    }

    /**
     * Filter the theme script tag to include the type="module" attribute.
     *
     * @param string $tag    The &lt;script&gt; tag for the enqueued script
     * @param string $handle The script's registered handle
     * @param string $src    The script's source URL
     *
     * @return string
     */
    public function addScriptModuleAttribute(string $tag, string $handle, string $src): string
    {
        if ($handle !== 'app') {
            return $tag;
        }
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
}
