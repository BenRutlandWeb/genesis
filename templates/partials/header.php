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
        <div class="container flex justify-between">
            <a href="<?php echo url()->home(); ?>">
                <p class="font-bold"><?php _e('Genesis', 'genesis'); ?></p>
            </a>

            <?php if (auth()->check()) : ?>

                <a href="<?php echo url()->logout(); ?>" class="underline text-blue-500">
                    <?php _e('Log out', 'genesis'); ?>
                </a>

            <?php else : ?>

                <a href="<?php echo url()->login(); ?>" class="underline text-blue-500">
                    <?php _e('Login', 'genesis'); ?>
                </a>

            <?php endif; ?>


        </div>
    </header>
    <main class='flex-1'>
        <ul>
            <li>Login: <?php echo url()->login(); ?></li>
            <li>Logout: <?php echo url()->logout(); ?></li>
            <li>Home: <?php echo url()->home(); ?></li>
            <li>Previous: <?php echo url()->previous(); ?></li>
            <li>Current: // use request object</li>
            <li>full: // use request object</li>
        </ul>