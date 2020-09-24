<?php echo view('partials.header'); ?>

<?php if (have_posts()) : ?>

    <div class="container">

        <?php while (have_posts()) : the_post(); ?>

            <div class="prose mx-auto">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

    </div>

<?php endif; ?>

<?php echo view('partials.footer'); ?>