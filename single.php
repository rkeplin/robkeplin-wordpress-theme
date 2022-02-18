<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php $categories = get_the_category(); ?>
        <div class="text-center p-5 bg-yellow" style="margin-top: -20px;">
            <h1 class="display-4 mb20"><span class="hash">#</span> <?php the_title(); ?></h1>
            <div class="mt-0 mb-3">
                <a class="donate-with-crypto" href="https://commerce.coinbase.com/checkout/4fe7dc66-e2c6-48d2-b00e-9e550e646d1c">Donate with Crypto</a>
                <script src="https://commerce.coinbase.com/v1/checkout.js?version=201807"> </script>
            </div>
            <div>
                Category:
                <?php foreach ($categories as $category) : ?>
                    <a class="category" title="<?php echo $category->name; ?>" href="<?php echo get_category_link($category) ?>"><?php echo $category->name; ?></a>
                <?php endforeach; ?>
            </div>
            <?php the_post_thumbnail('large-thumbnail', array('class' => '')); ?>
        </div>
        <div class="container">
            <div class="post-content mt-4">
                <?php the_content() ?>
            </div>

            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
            ?>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <div class="text-center p-5 bg-yellow" style="margin-top: -15px;">
        <h1 class="display-4 mb25"><span class="hash">#</span> Not Found</h1>
    </div>
    <div class="container">
        <div class="post-content mt-4 text-center">
            <p>Whoops! The page that you were looking for, could not be found.</p>
            <p>Perhaps it got moved to another location, or no longer exists.</p>
            <a title="Back to the blog" class="btn btn-primary" href="<?php echo get_permalink(get_page_by_path('blog')); ?>">Back to the blog</a>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
