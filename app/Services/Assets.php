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
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueAppAssets']);
        add_action('login_enqueue_scripts', [$this, 'enqueueAppAssets']);
        add_action('admin_init', [$this, 'enqueueEditorAssets']);
        add_filter('script_loader_tag', [$this, 'addScriptModuleAttribute'], 10, 3);
    }

    /**
     * Enqueue app assets
     *
     * @return void
     */
    public function enqueueAppAssets(): void
    {
        // css
        //wp_dequeue_style('wp-block-library');

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
