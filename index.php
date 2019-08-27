<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php $i = 0; ;?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php $i++; ?>
        <?php $categories = get_the_category(); ?>
        <div class="<?php echo ($i % 2 == 1) ? 'bg-light' : 'bg-white'; ?>">
            <div class="container">
                <div class="p-4 wide">
                    <h1 class="display-4 mb25"><span class="hash">#</span> <a class="text-dark" title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                    <div>
                        Category:
                        <?php foreach ($categories as $category) : ?>
                            <a class="category" title="<?php echo $category->name; ?>" href="<?php echo get_category_link($category) ?>"><?php echo $category->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                    <div class="post-content">
                        <p><?php the_excerpt() ?></p>
                        <a title="Continue Reading" class="btn btn-primary" href="<?php the_permalink() ?>">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php
    the_posts_pagination(array(
        'prev_text'          => __( '&laquo;' ),
        'next_text'          => __( '&raquo;' ),
        'before_page_number' => '<span class="btn btn-primary">',
        'after_page_number' => '</span>'
    ));
    ?>
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
