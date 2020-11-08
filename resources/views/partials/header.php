<header class="header container">
    <div class="flex justify-between alignwide">
        <a href="<?php echo url()->home(); ?>" class="font-bold">
            <?php _e('SuperCoupon', '@textdomain'); ?>
        </a>

        <nav>
            <ul>

                <?php if (auth()->check()) : ?>

                    <?php if (auth()->user()->isAdmin()) : ?>

                        <li>
                            <a href="<?php echo url()->admin(); ?>" class="button">
                                <?php _e('Dashboard', '@textdomain'); ?>
                            </a>
                        </li>

                    <?php else : ?>
                        <li>
                            <a href="<?php echo url('account'); ?>" class="button">
                                <?php _e('Account', '@textdomain'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo url()->logout(); ?>" class="button">
                            <?php _e('Log out', '@textdomain'); ?>
                        </a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?php echo url()->login('account'); ?>" class="button">
                            <?php _e('Login', '@textdomain'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url()->register('account'); ?>" class="button">
                            <?php _e('Register', '@textdomain'); ?>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
            <button type="button" id="prefers-color-scheme">Light/Dark</button>

        </nav>
    </div>
</header>