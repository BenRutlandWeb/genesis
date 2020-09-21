<?php

namespace Genesis\View;

class TemplateRedirect
{
    /**
     * The templates that WordPress looks for in the root of the theme.
     *
     * @var array
     */
    protected $templateHierarchy = [
        'index',
        '404',
        'archive',
        'author',
        'category',
        'tag',
        'taxonomy',
        'date',
        'embed',
        'home',
        'frontpage',
        'privacypolicy',
        'page',
        'paged',
        'search',
        'single',
        'singular',
        'attachment'
    ];

    /**
     * Filter the template heirarchy.
     *
     * @return void
     */
    public function __construct()
    {
        foreach ($this->templateHierarchy as $type) {
            add_filter("{$type}_template_hierarchy", [$this, 'filterWithBladeTemplates']);
        };
    }

    /**
     * Filter the WordPress hierarchy to look for templates in resources before
     * looking in the root of the theme.
     *
     * @param array $templates
     *
     * @return array
     */
    public function filterWithBladeTemplates(array $templates): array
    {
        return collect($templates)
            ->map(function ($template) {
                $filename = basename($template, '.php');
                return ["resources/views/templates/$filename.php", $template];
            })
            ->flatten()
            ->toArray();
    }
}
