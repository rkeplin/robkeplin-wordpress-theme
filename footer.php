    <div class="container">
        <footer class="pt-4 my-md-5 pt-md-5">
            <div class="row">
                <div class="col-12 col-md text-center">
                    <small class="text-muted">&copy; 2019 Rob Keplin</small>
                </div>
            </div>
        </footer>
    </div>
    </main>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/jquery-3.3.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap-4.2.1-dist/js/bootstrap.bundle.min.js"></script>

    <?php if (is_front_page()) : ?>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/homepage.js"></script>
    <?php endif; ?>

    <?php wp_footer(); ?>

    </body>
</html>
