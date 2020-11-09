<footer class="footer container">
    <div class="grid sm:grid-cols-3 md:grid-cols-4 alignwide mb-8">
        <div>
            <h2>col 1</h2>
        </div>
        <div>
            <h2>col 1</h2>
        </div>
        <div>
            <h2>col 1</h2>
        </div>
    </div>
    <p class="text-center">
        <?php (printf(
                __(
                    'Copyright © %s <a href="https://github.com/BenRutlandWeb/genesis" rel="external noopener nofollow noreferrer" target="_blank" class="link">%s</a>',
                    '@textdomain'
                ),
                date('Y'),
                get_bloginfo('name')
            )); ?>
    </p>
</footer><?php /**PATH /app/public/wp-content/themes/genesis/resources/views/partials/footer.blade.php ENDPATH**/ ?>