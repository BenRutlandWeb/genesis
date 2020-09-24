<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class('flex flex-col h-screen'); ?>>

    <?php wp_body_open(); ?>

    <header class="header">
        <div class="container">
            <p><?php _e('Genesis', 'genesis'); ?></p>
        </div>
    </header>
    <main class='flex-1'>