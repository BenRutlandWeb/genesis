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
        <?php
        printf(
            __(
                'Copyright © %s <a href="https://github.com/BenRutlandWeb/genesis" rel="external noopener nofollow noreferrer" target="_blank" class="link">%s</a>',
                '@textdomain'
            ),
            date('Y'),
            __('Genesis', '@textdomain')
        );
        ?>
    </p>
</footer>