


<?php $__env->startSection('body'); ?>

A <?php echo e($coupon->title); ?> coupon has been redeemed.

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

© <?php echo e(date('Y')); ?> <?php echo e(get_bloginfo('name')); ?>. <?php echo e(__('All rights reserved.')); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('emails.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/public/wp-content/themes/genesis/templates/emails/coupon/redeemed.blade.php ENDPATH**/ ?>