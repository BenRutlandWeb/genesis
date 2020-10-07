<header class="header container">
    <div class="flex justify-between alignwide">
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