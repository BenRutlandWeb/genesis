<?php echo view('partials.head'); ?>

<div class="container">
    <div class="prose mx-auto my-16">
        <h1><?php _e('404: Page not found', '@textdomain'); ?></h1>
        <p><?php _e('Awwww shucks', '@textdomain'); ?></p>
        <p>
            <a href="<?php echo url()->home(); ?>">
                <?php _e('Go back home', '@textdomain'); ?>
            </a>
        </p>
    </div>
</div>

<?php echo view('partials.foot'); ?>