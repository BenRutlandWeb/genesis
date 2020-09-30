<?php

use Genesis\Database\Models\Page;

$post = Page::find(get_the_ID());

?>

<?php echo view('partials.header'); ?>

<?php if ($post) : ?>

    <div class="container">
        <div class="prose mx-auto my-16">
            <h1><?php echo $post->title; ?></h1>
            <?php echo $post->content; ?>
            <?php printf(__('Posted: %s', 'genesis'), $post->created_at->diffForHumans()); ?>
        </div>
    </div>

<?php endif; ?>

<?php echo view('partials.footer'); ?>