<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class('flex flex-col h-screen'); ?>>

    <?php wp_body_open(); ?>

    <?php echo view('partials.header'); ?>

    <main class='flex-1'>