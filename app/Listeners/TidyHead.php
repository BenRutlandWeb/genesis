<?php

namespace App\Listeners;

use Genesis\Events\Dispatcher;

class TidyHead
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
        $events->forget('wp_head', 'adjacent_posts_rel_link', 10, 0);
        $events->forget('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        $events->forget('wp_head', 'feed_links', 2);
        $events->forget('wp_head', 'feed_links_extra', 3);
        $events->forget('wp_head', 'index_rel_link');
        $events->forget('wp_head', 'parent_post_rel_link', 10, 0);
        $events->forget('wp_head', 'print_emoji_detection_script', 7);
        $events->forget('wp_head', 'rel_canonical');
        $events->forget('wp_head', 'rest_output_link_wp_head', 10);
        $events->forget('wp_head', 'rsd_link');
        $events->forget('wp_head', 'start_post_rel_link', 10, 0);
        $events->forget('wp_head', 'wlwmanifest_link');
        $events->forget('wp_head', 'wp_generator');
        $events->forget('wp_head', 'wp_shortlink_wp_head', 10, 0);
        $events->forget('wp_head', 'wp_oembed_add_discovery_links');
        $events->forget('wp_print_styles', 'print_emoji_styles');
        $events->forget('template_redirect', 'rest_output_link_header', 11);

        $events->listen('emoji_svg_url', '__return_false');
        $events->listen('wp_enqueue_scripts', [$this, 'removeScripts']);
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
