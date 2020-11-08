<?php

use App\Models\Coupon;

$post = Coupon::find(get_the_ID());

?>

<?php echo view('partials.head'); ?>

<?php if ($post) : ?>

    <div class="container">
        <h1><?php echo $post->title; ?></h1>
        <p class="alignwide"><?php printf(__('Posted: %s', '@textdomain'), $post->created_at->diffForHumans()); ?></p>
        <?php echo $post->content; ?>

    </div>

<?php endif; ?>

<?php echo view('partials.foot'); ?>