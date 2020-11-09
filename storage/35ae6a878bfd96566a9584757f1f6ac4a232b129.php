<!DOCTYPE html>
<html <?php echo e(language_attributes()); ?>>

<head>
    <meta charset="<?php echo e(get_bloginfo('charset')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>

<body <?php echo e(body_class('flex flex-col min-h-screen')); ?>>

    <?php wp_body_open(); ?>

    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class='flex-1'>

        <?php echo $__env->yieldContent('content'); ?>

    </main>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php wp_footer(); ?>

</body>

</html><?php /**PATH /app/public/wp-content/themes/genesis/resources/views/layout/app.blade.php ENDPATH**/ ?>