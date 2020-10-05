<?php echo view('partials.header'); ?>

<div class="container">
    <div class="prose mx-auto my-16">
        <h1><?php _e('404: Page not found', 'genesis'); ?></h1>
        <p><?php _e('Awwww shucks', 'genesis'); ?></p>
        <p>
            <a href="<?php echo url()->home(); ?>">
                <?php _e('Go back home', 'genesis'); ?>
            </a>
        </p>
    </div>
</div>

<?php echo view('partials.footer'); ?>