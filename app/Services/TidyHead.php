<?php

namespace App\Services;

/**
 * WordPress adds lots of extraneous markup to the head of every document. In
 * addition to this increasing the resource size, it clutters the source code
 * and aggrevates my compulsion to keep code clean, lean and mean. This class
 * removes what it can.
 */
class TidyHead
{
    /**
     * Adds/removes actions and filters.
     *
     * @return void
     */
    public function __construct()
    {
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_head', 'rel_canonical');
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('template_redirect', 'rest_output_link_header', 11);
        add_filter('emoji_svg_url', '__return_false');
        add_action('wp_enqueue_scripts', [$this, 'removeScripts']);
    }

    /**
     * remove scripts and stylesheets.
     *
     * @return void
     */
    public function removeScripts(): void
    {
        wp_deregister_script('wp-embed');
    }
}
