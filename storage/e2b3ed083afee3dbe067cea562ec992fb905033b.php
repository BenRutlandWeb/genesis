<!DOCTYPE html>
<html <?php echo e(language_attributes()); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php echo e(wp_head()); ?>

</head>

<body <?php echo e(body_class('flex flex-col min-h-screen')); ?>>

    <?php echo e(wp_body_open()); ?>


    <?php echo e(view('partials.header')); ?>


    <main class='flex-1'>

        <?php echo $__env->yieldContent('content'); ?>

    </main>

    <?php echo e(view('partials.footer')); ?>

    <?php echo e(wp_footer()); ?>


</body>

</html><?php /**PATH /app/public/wp-content/themes/genesis/resources/views/app.blade.php ENDPATH**/ ?>