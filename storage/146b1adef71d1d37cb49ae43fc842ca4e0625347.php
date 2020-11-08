

<?php $__env->startSection('content'); ?>

    <?php

    use Genesis\Database\Models\Page;

    $post = Page::find(get_the_ID());

    ?>

    <div class="container">
        <h1><?php echo e($post->title); ?></h1>
        <p class="alignwide">
            <?php printf(__('Posted: %s', '@textdomain'), $post->created_at->diffForHumans()); ?>
        </p>
        <?php echo $post->content; ?>


    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/public/wp-content/themes/genesis/templates/index.blade.php ENDPATH**/ ?>