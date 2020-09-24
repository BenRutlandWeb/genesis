<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>


    <div class="prose">
        <h1 class="bg-black">Genesis</h1>
        <p>WordPress base theme built with the Genesis Framework</p>
    </div>

    <footer class="footer py-5">
        <div class="wrapper">
            <nav class="d-flex">
                <ul class="d-contents list-unstyled">
                    <li><a href="#" class="pr-4">Link</a></li>
                    <li><a href="#" class="px-4">Link</a></li>
                    <li><a href="#" class="pl-4">Link</a></li>
                </ul>
            </nav>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>