

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="prose mx-auto my-16">

        <h1><?php echo e(__('404: Page not found', '@textdomain')); ?></h1>

        <p><?php echo e(__('Awwww shucks', '@textdomain')); ?></p>

        <p>
            <a href="<?php echo e(url()->home()); ?>">
                <?php echo e(__('Go back home', '@textdomain')); ?>

            </a>
        </p>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/public/wp-content/themes/genesis/resources/views/404.blade.php ENDPATH**/ ?>