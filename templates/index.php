<?php

use Genesis\Database\Models\Page;

$post = Page::find(get_the_ID());

?>

<?php echo view('partials.head'); ?>

<script id="recipes">
    fetch('<?php echo ajax('get_recipes'); ?>')
        .then(r => r.text())
        .then(r => {
            const div = document.createElement('DIV')
            div.innerHTML = r
            recipes.parentNode.insertBefore(div, recipes.nextSibling);
            recipes.remove()
        })
</script>

<?php if ($post) : ?>

    <div class="container">
        <h1><?php echo $post->title; ?></h1>
        <p class="alignwide"><?php printf(__('Posted: %s', '@textdomain'), $post->created_at->diffForHumans()); ?></p>
        <?php echo $post->content; ?>

    </div>

<?php endif; ?>

<?php echo view('partials.foot'); ?>