<header class="header container">
    <div class="flex justify-between alignwide">
        <a href="<?php echo e(url()->home()); ?>" class="font-bold">
            <?php echo e(get_bloginfo('name')); ?>

        </a>

        <nav>
            <ul>

                <?php if (\Illuminate\Support\Facades\Blade::check('auth')): ?>
                    <?php if(auth()->user()->isAdmin()): ?>
                        <li>
                            <a href="<?php echo e(url()->admin()); ?>" class="button">
                                <?php echo e(__('Dashboard')); ?>

                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo e(url('account')); ?>" class="button">
                                <?php echo e(__('Account')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo url()->logout(); ?>" class="button">
                            <?php echo e(__('Log out')); ?>

                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e(url()->login('account')); ?>" class="button">
                            <?php echo e(__('Login')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url()->register('account')); ?>" class="button">
                            <?php echo e(__('Register')); ?>

                        </a>
                    </li>
                <?php endif; ?>

            </ul>
            <button type="button" id="prefers-color-scheme">Light/Dark</button>

        </nav>
    </div>
</header><?php /**PATH /app/public/wp-content/themes/genesis/resources/views/partials/header.blade.php ENDPATH**/ ?>